<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Invent extends BaseController
{
	protected $BarangModel;
	public function __construct()
	{
		$this->BarangModel = new BarangModel();
	}
	public function index()
	{
		$komputer = $this->BarangModel->getKomputer();
		$barang = $this->BarangModel->getAlatOrder();
		$jual = $this->BarangModel->getJualOrder();
		// * get 6 computer
		$availDataKomputer = [];
		$otherKomputer = [];
		$availAllKomputer = [];
		if ($komputer) {
			for ($i = 0; $i < count($komputer); $i++) {
				if ($i < 5) {
					$availDataKomputer[] = $komputer[$i];
				} else {
					$otherKomputer[] = $komputer[$i];
				}
			}
			$availAllKomputer = [
				"showOff" => $availDataKomputer,
				"other" => $otherKomputer
			];
		}
		// * get 6 stuff
		$availDataBarang = [];
		$otherBarang = [];
		$availAllBarang = [];
		if ($barang) {
			for ($i = 0; $i < count($barang); $i++) {
				if ($i < 5) {
					$availDataBarang[] = $barang[$i];
				} else {
					$otherBarang[] = $barang[$i];
				}
			}
			$availAllBarang = [
				"showOff" => $availDataBarang,
				"other" => $otherBarang
			];
		}
		// * get 6 sell
		$availDataJual = [];
		$otherJual = [];
		$availAllJual = [];
		if ($jual) {
			for ($i = 0; $i < count($jual); $i++) {
				if ($i < 5) {
					$availDataJual[] = $jual[$i];
				} else {
					$otherJual[] = $jual[$i];
				}
			}
			$availAllJual = [
				"showOff" => $availDataJual,
				"other" => $otherJual
			];
		}
		$data = [
			'title' => "Labkom | Inventory",
			'txt' => "inventory labkom smkn 1 depok",
			'active' => 'invent',
			"komputer" => $availAllKomputer,
			"barang" => $availAllBarang,
			"jual" => $availAllJual
		];
		return view('home/invent', $data);
	}

	//--------------------------------------------------------------------

}
