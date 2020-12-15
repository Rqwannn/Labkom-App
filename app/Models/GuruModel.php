<?php namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends model{

	protected $table = "guru";

	public function getGuru(){
		return $this->findAll();
	}

}