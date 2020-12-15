<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PinjamModel;
use App\Models\BeliModel;

class History extends BaseController
{
	protected $BarangModel;
	protected $PinjamModel;
	protected $BeliModel;
	public function __construct()
	{
		$this->BarangModel = new BarangModel();
		$this->BeliModel = new BeliModel();
		$this->PinjamModel = new PinjamModel();
	}

	public function index()
	{
		$id = session()->get('id');
		$getPinjam = $this->PinjamModel->getPinjamByIdPeminjam($id);
		$getBeli = $this->BeliModel->getBeliByIdPeminjam($id);
		if ($getPinjam && $getBeli) {
			$dataNamaBarang = [];
			$dataNamaBarang2 = [];
			foreach ($getPinjam as $key) {
				$dataNamaBarang[] = $this->BarangModel->getBarangName($key['id_barang']);
			}
			foreach ($getBeli as $key) {
				$dataNamaBarang2[] = $this->BarangModel->getBarangName($key['id_barang']);
			}
			$data = [
				'title' => "Labkom | My Hstory",
				'txt' => "My History",
				'active' => 'history',
				'data_pinjam' => $getPinjam,
				'data_beli' => $getBeli,
				'nama_barang' => $dataNamaBarang,
				'nama_barang_beli' => $dataNamaBarang2
			];
		} elseif ($getPinjam) {
			$dataNamaBarang = [];
			foreach ($getPinjam as $key) {
				$dataNamaBarang[] = $this->BarangModel->getBarangName($key['id_barang']);
			}
			$data = [
				'title' => "Labkom | My Hstory",
				'txt' => "My History",
				'active' => 'history',
				'data_pinjam' => $getPinjam,
				'data_beli' => $getBeli,
				'nama_barang' => $dataNamaBarang,
			];
		} elseif ($getBeli) {
			$dataNamaBarang2 = [];
			foreach ($getBeli as $key) {
				$dataNamaBarang2[] = $this->BarangModel->getBarangName($key['id_barang']);
			}
			$data = [
				'title' => "Labkom | My Hstory",
				'txt' => "My History",
				'active' => 'history',
				'data_pinjam' => $getPinjam,
				'data_beli' => $getBeli,
				'nama_barang_beli' => $dataNamaBarang2
			];
		} else {
			$data = [
				'title' => "Labkom | My Hstory",
				'txt' => "My History",
				'active' => 'history',
				'data_pinjam' => $getPinjam,
				'data_beli' => $getBeli
			];
		}

		return view('home/history', $data);
	}

	public function kembali()
	{
		$id = $this->request->getVar();
		$getData = $this->PinjamModel->getPinjamById($id);
		$data = [
			"id" => $id,
			"kembali" => "1"
		];
		$getBarang = $this->BarangModel->getBarangByid($getData['id_barang']);
		$stok = $getBarang['stok'];
		$stokUpdate = intval($stok) + intval($getData['banyak_pesanan']);

		$dataBarangUpdate = [
			"id" => $getData['id_barang'],
			"stok" => $stokUpdate
		];
		$this->PinjamModel->save($data);
		$this->BarangModel->save($dataBarangUpdate);

		return redirect()->to(base_URL('/history'));
	}
}
