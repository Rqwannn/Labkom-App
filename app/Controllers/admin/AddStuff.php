<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\BarangModel;

class AddStuff extends BaseController
{
    protected $BarangModel;
    public function __construct()
    {
        $this->BarangModel = new BarangModel();
    }

    public function index()
    {
        $data = [
            'title' => "Labkom | Admin Stuff List",
            "active" => "add_stuff",
            'validation' => \Config\Services::validation()
        ];
        return view('admin/addStuff', $data);
    }

    public function addStuffProgress()
    {
        if (!$this->validate([
            'gambarBarang' => [
                'rules' => 'max_size[gambarBarang,3072]|is_image[gambarBarang]|mime_in[gambarBarang,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'yang anda upload bukan gambar',
                    'mime_in' => 'yang anda upload bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to(base_URL('/admin/AddStuff'))->withInput();
        } else {
            // * ambil gambar
            $fileImg = $this->request->getFile('gambarBarang');
            // * apakah tidak ada gambar yang diupload
            if ($fileImg->getError() == 4) {
                $namaImg = 'default.png';
            } else {
                // * generate nama
                $namaImg = $fileImg->getRandomName();
                // * pindahkan
                $fileImg->move('barang', $namaImg);
            }

            // * save stuff
            if ($this->request->getVar('kategoriBarang') == "jualan") {
                $data = [
                    "nama_barang" => $this->request->getVar('namaBarang'),
                    "stok" => $this->request->getVar('jmlBarang'),
                    "jenis" => $this->request->getVar('kategoriBarang'),
                    "harga" => $this->request->getVar('hargaBarang'),
                    "gambar" => $namaImg
                ];
            } else {
                $data = [
                    "nama_barang" => $this->request->getVar('namaBarang'),
                    "stok" => $this->request->getVar('jmlBarang'),
                    "jenis" => $this->request->getVar('kategoriBarang'),
                    "harga" => null,
                    "gambar" => $namaImg
                ];
            }

            $this->BarangModel->save($data);
            session()->setFlashData("sukses_tambah", "sukses");
            return redirect()->to(base_url('/admin/Stuff'));
        }
    }

    //--------------------------------------------------------------------

}
