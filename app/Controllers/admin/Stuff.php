<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\BarangModel;

class Stuff extends BaseController
{
    protected $BarangModel;
    public function __construct()
    {
        $this->BarangModel = new BarangModel();
    }

    public function index()
    {
        $barang = $this->BarangModel->getAll();
        // * get available stuff
        $avail = $this->BarangModel->availableStuff();
        $availData = [];
        $other = [];
        $availAll = [];
        if ($avail) {
            for ($i = 0; $i < count($avail); $i++) {
                if ($i < 5) {
                    $availData[] = $avail[$i];
                } else {
                    $other[] = $avail[$i];
                }
            }
            $availAll = [
                "showOff" => $availData,
                "other" => $other
            ];
        }
        $data = [
            'title' => "Labkom | Admin Stuff List",
            "active" => "stuff",
            "avail" => $availAll,
            "allBarang" => $barang
        ];
        return view('admin/stuff', $data);
    }

    public function deleteStuff($id)
    {
        // * cari gambar berdasarkan id
        $barang = $this->BarangModel->getBarangById($id);
        //* cek jika gambar default.png
        if ($barang['gambar'] != 'default.png') {
            // * hapus gambar
            unlink('barang/' . $barang['gambar']);
        }
        $this->BarangModel->delete($id);
        session()->setFlashData('hapusSukses', 'Data Berhasil di hapus');
        return redirect()->to(base_URL('/admin/Stuff'));
    }

    //--------------------------------------------------------------------

}
