<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\BarangModel;

class UpdateBarang extends BaseController
{
    protected $BarangModel;
    public function __construct()
    {
        $this->BarangModel = new BarangModel();
    }

    public function index($id)
    {
        $getBarang = $this->BarangModel->getBarangById($id);
        if ($getBarang) {
            $data = [
                'title' => "Labkom | Admin Update Stuff",
                "active" => "edit_stuff",
                "stuff" => $getBarang,
                'validation' => \Config\Services::validation()
            ];
            return view('admin/updateBarang', $data);
        } else {
            return redirect()->to(base_url('/admin/stuff'));
        }
    }

    public function editStuffProgress()
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
            session()->setFlashData("error_edit", "gagal");
            return redirect()->to(base_URL('/admin/updateBarang/' . $this->request->getVar('id')))->withInput();
        } else {
            $getBarang = $this->BarangModel->getBarangById($this->request->getVar('id'));
            // * ambil gambar
            $fileImg = $this->request->getFile('gambarBarang');
            // * apakah tidak ada gambar yang diupload
            if ($fileImg->getError() == 4) {
                $namaImg = $this->request->getVar('oldImg');
            } else {
                // * generate nama
                $namaImg = $fileImg->getRandomName();
                // * pindahkan
                $fileImg->move('barang', $namaImg);
                // * cek apakah gambar lama default.png / not
                if ($getBarang['gambar'] != "default.png") {
                    // * hapus gambar jika gambar lama bukan default.png
                    unlink('barang/' . $getBarang['gambar']);
                }
            }

            // * save stuff
            if ($this->request->getVar('kategoriBarang') == "jualan") {
                if ($this->request->getVar('hargaBarang')) {
                    $data = [
                        "id" => $this->request->getVar('id'),
                        "nama_barang" => $this->request->getVar('namaBarang'),
                        "stok" => $this->request->getVar('jmlBarang'),
                        "jenis" => $this->request->getVar('kategoriBarang'),
                        "harga" => $this->request->getVar('hargaBarang'),
                        "gambar" => $namaImg
                    ];
                    $this->BarangModel->save($data);
                    session()->setFlashData("sukses_update", "sukses");
                    return redirect()->to(base_url('/admin/Stuff'));
                } else {
                    session()->setFlashData("error_edit", "gagal");
                    return redirect()->to(base_url('/admin/UpdateBarang' . $this->request->getVar('id')));
                }
            } else {
                $data = [
                    "id" => $this->request->getVar('id'),
                    "nama_barang" => $this->request->getVar('namaBarang'),
                    "stok" => $this->request->getVar('jmlBarang'),
                    "jenis" => $this->request->getVar('kategoriBarang'),
                    "harga" => null,
                    "gambar" => $namaImg
                ];
                $this->BarangModel->save($data);
                session()->setFlashData("sukses_update", "sukses");
                return redirect()->to(base_url('/admin/Stuff'));
            }
        }
    }

    //--------------------------------------------------------------------

}
