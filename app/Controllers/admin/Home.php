<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\PinjamModel;
use App\Models\BeliModel;
use App\Models\GuruModel;
use App\Models\UserModel;
use App\Models\SiswaModel;

class Home extends BaseController
{
    protected $BarangModel;
    protected $PinjamModel;
    protected $BeliModel;
    protected $UserModel;
    protected $GuruModel;
    protected $SiswaModel;
    public function __construct()
    {
        $this->BarangModel = new BarangModel();
        $this->PinjamModel = new PinjamModel();
        $this->SiswaModel = new SiswaModel();
        $this->GuruModel = new GuruModel();
        $this->UserModel = new UserModel();
        $this->BeliModel = new BeliModel();
    }

    public function index()
    {
        $guru = $this->GuruModel->getGuru();
        $barang = $this->BarangModel->getAll();
        $pinjam = $this->PinjamModel->getConfirm();
        $beli = $this->BeliModel->findAll();
        $user = $this->UserModel->getUser();
        $siswa = $this->SiswaModel->getSiswa();
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
            'title' => "Labkom | Admin Home",
            "active" => "home",
            "guru" => $guru,
            "barang" => $barang,
            "pinjam" => $pinjam,
            "beli" => $beli,
            "user" => $user,
            "avail" => $availAll,
            "siswa" => $siswa
        ];
        return view('admin/index', $data);
    }

    //--------------------------------------------------------------------

}
