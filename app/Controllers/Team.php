<?php namespace App\Controllers;

use App\Models\GuruModel;

class Team extends BaseController {

	protected $GuruModel;

	public function __construct(){
		$this->GuruModel = new GuruModel();
	}


	public function index() 
	{
		$data = [
			'title' => 'Our Team | Labkom',
			'txt' => "Our Team",
			'active' => 'team'
		];

		return view('home/team', $data);
	}
}
