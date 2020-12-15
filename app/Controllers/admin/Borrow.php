<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\PinjamModel;
use App\Models\UserModel;
use App\Models\BarangModel;

class Borrow extends BaseController
{
    protected $PinjamModel;
    protected $UserModel;
    protected $BarangModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->PinjamModel = new PinjamModel();
        $this->BarangModel = new BarangModel();
    }

    public function index()
    {
        $pinjam = $this->PinjamModel->getConfirm();
        $pinjamAll = $this->PinjamModel->orderBy("confirm")->findAll();
        $namaPeminjam = [];
        $namaBarang = [];
        if ($pinjamAll) {
            foreach ($pinjamAll as $key) {
                $getUser = $this->UserModel->getUserById($key['id_peminjam']);
                $getBarang = $this->BarangModel->getBarangById($key['id_barang']);
                $namaPeminjam[] = $getUser['name'];
                $namaBarang[] = $getBarang['nama_barang'];
            }
        }
        $data = [
            'title' => "Labkom | Admin Borrow List",
            "active" => "borrow",
            "pinjam" => $pinjam,
            "pinjamAll" => $pinjamAll,
            "nama_peminjam" => $namaPeminjam,
            "nama_barang" => $namaBarang
        ];
        return view('admin/borrow', $data);
    }

    public function confirmOrder()
    {
        $check = $this->PinjamModel->getPinjamById($this->request->getVar("idPesan"));
        if ($check['confirm'] == "0") {
            $data = [
                "id" => $this->request->getVar("idPesan"),
                "confirm" => 1
            ];
            $this->PinjamModel->save($data);
            session()->setFlashData("sukses_confirm", "confirmed");
        } else {
            session()->setFlashData("fail_confirm", "failed");
        }
        return redirect()->to(base_url('/admin/Borrow'));
    }

    public function kembali()
    {
        $today = date("Y-m-d");
        $getPinjam = $this->PinjamModel->getPinjamById($this->request->getVar("idPesan"));
        if ($getPinjam['confirm'] == "1") {
            $getBarang = $this->BarangModel->getBarangById($getPinjam['id_barang']);
            $updateStok = intval($getBarang['stok']) + intval($getPinjam['banyak_pinjam']);
            $data = [
                "id" => $this->request->getVar("idPesan"),
                "tgl_kembali" => $today
            ];
            $dataBarang = [
                "id" => $getPinjam['id_barang'],
                "stok" => $updateStok
            ];

            $this->PinjamModel->save($data);
            $this->BarangModel->save($dataBarang);
            session()->setFlashData("sukses_kembali", "confirmed");
        } else {
            session()->setFlashData("fail_kembali", "confirmed");
        }

        return redirect()->to(base_url('/admin/Borrow'));
    }

    //--------------------------------------------------------------------

}
