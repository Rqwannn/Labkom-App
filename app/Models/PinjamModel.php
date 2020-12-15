<?php namespace App\Models;

use CodeIgniter\Model;

class PinjamModel extends model{

	protected $table = "meminjam";
	protected $useTimestamps = true;
	protected $allowedFields =['id_barang','id_peminjam','banyak_pinjam','tgl_pinjam', 'tgl_kembali', "confirm"];

	public function getPinjamByIdPeminjam($id){
		return $this->where(['id_peminjam' => $id])->orderBy("id", "DESC")->findAll();
	}

	public function getPinjamById($id){
		return $this->where(['id' => $id])->first();
	}

	public function getConfirm() {
		return $this->where(['confirm' => 1])->findAll();
	}

}