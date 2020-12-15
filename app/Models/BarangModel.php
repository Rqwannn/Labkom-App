<?php namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends model{

	protected $table = "barang";
	protected $useTimestamps = true;
	protected $allowedFields =['nama_barang','stok','jenis', 'gambar'];

	public function getAll(){
		return $this->findAll();
	}

	public function availableStuff() {
		return $this->where("stok >", 0)->orderBy("stok", "DESC")->findAll();
	}

	public function getAlat(){
		return $this->where(['jenis' => 'alat'])->where('stok >', 0)->findAll();
	}

	public function getAlatOrder(){
		return $this->where(['jenis' => 'alat'])->where('stok >', 0)->orderBy("stok", "DESC")->findAll();
	}

	public function getPC(){
		return $this->where(['jenis' => 'komputer'])->where('stok >', 0)->findAll();
	}

	public function getJual() {
		return $this->where(['jenis' => "jual"])->where('stok >',0)->findAll();
	}

	public function getJualOrder() {
		return $this->where(['jenis' => "jual"])->where('stok >',0)->orderBy("stok", "DESC")->findAll();
	}

	public function getBarangById($id){
		return $this->where(['id' => $id])->first();
	}

	public function getBarangName($id){
		$data = $this->where(['id' => $id])->first();
		return $data['nama_barang'];
	}

	public function getKomputer() {
		return $this->where(["jenis" => "komputer"])->where("stok >",0)->orderBy("stok", "DESC")->findAll();
	}
}