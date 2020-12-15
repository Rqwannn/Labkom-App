<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends model
{

    protected $table = "siswa";

    public function getSiswa()
    {
        return $this->findAll();
    }
}
