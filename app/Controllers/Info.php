<?php namespace App\Controllers;

use App\Models\GuruModel;
use App\Models\SiswaModel;

class Info extends BaseController {

	protected $GuruModel;
	protected $SiswaModel;

	public function __construct(){
		$this->SiswaModel = new SiswaModel();
		$this->GuruModel = new GuruModel();
	}


	public function index() 
	{
		$guru = $this->GuruModel->getGuru();
		$siswa = $this->SiswaModel->getSiswa();
		// dd($guru);
		$data = [
			'title' => 'Info | Labkom',
			'txt' => "Info rpl smkn 1 depok",
			'active' => 'info',
			'guru' => $guru,
			"siswa" => $siswa
		];

		return view('home/info', $data);
	}
}

 ?>