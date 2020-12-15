<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\BeliModel;
use App\Models\UserModel;
use App\Models\BarangModel;

class Buy extends BaseController
{
    protected $BeliModel;
    protected $UserModel;
    protected $BarangModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->BeliModel = new BeliModel();
        $this->BarangModel = new BarangModel();
    }

    public function index()
    {
        $beli = $this->BeliModel->orderBy("status")->findAll();
        $namaPembeli = [];
        $barangPembeli = [];
        foreach ($beli as $key) {
            $getNama = $this->UserModel->getUserById($key['id_pembeli']);
            $getBarang = $this->BarangModel->getBarangById($key['id_barang']);
            $namaPembeli[] = $getNama['name'];
            $barangPembeli[] = $getBarang['nama_barang'];
        }

        $data = [
            'title' => "Labkom | Admin Buy List",
            "active" => "buy",
            "beli" => $beli,
            "namaPembeli" => $namaPembeli,
            "barangPembeli" => $barangPembeli
        ];
        return view('admin/buy', $data);
    }

    public function lunas()
    {
        $getBeli = $this->BeliModel->getBeliById($this->request->getVar("idBeli"));
        if ($getBeli['status'] == "0") {
            $data = [
                "id" => $this->request->getVar("idBeli"),
                "status" => "1"
            ];
            $this->BeliModel->save($data);
            session()->setFlashData("suksesLunas", "lunas");
        } else {
            session()->setFlashData("failLunas", "gLunas");
        }
        return redirect()->to(base_url('/admin/Buy'));
    }

    //--------------------------------------------------------------------

}
