<?php namespace App\Models;

use CodeIgniter\Model;

class BeliModel extends model{

	protected $table = "membeli";
	protected $useTimestamps = true;
	protected $allowedFields =['id_pembeli','id_barang','banyak_beli','total', 'status', "tgl_beli"];

	public function getBeliByIdPeminjam($id){
		return $this->where(['id_pembeli' => $id])->orderBy("id", "DESC")->findAll();
	}

	public function getBeliById($id){
		return $this->where(['id' => $id])->first();
	}

}