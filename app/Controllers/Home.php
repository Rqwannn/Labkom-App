<?php namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PinjamModel;
use App\Models\BeliModel;

class Home extends BaseController
{
	protected $BarangModel;
	protected $PinjamModel;
	protected $BeliModel;
	public function __construct(){
		$this->BarangModel = new BarangModel();
		$this->PinjamModel = new PinjamModel();
		$this->BeliModel = new BeliModel();
	}

	public function index()
	{
		$barang = $this->BarangModel->getAlat();
		$komputer = $this->BarangModel->getPC();
		$belanja = $this->BarangModel->getJual();
		$data = [
			'title' => "Labkom | Home",
			'txt' => "labkom rpl smkn 1 depok",
			'active' => 'home',
			'barang' => $barang,
			'komputer' => $komputer,
			'belanja' => $belanja
		];
		return view('home/index', $data);
	}

	public function pinjamAlat(){
		$id = session()->get('id');
		$data = [
			"id_barang" => $this->request->getVar("pilihan"),
			"id_peminjam" => $id,
			"banyak_pinjam" => $this->request->getVar("banyak_pinjam"),
			"tgl_pinjam" => $this->request->getVar("tglPinjam"),
			"tgl_kembali" => null
		];
		$barang = $this->BarangModel->getBarangById($this->request->getVar("pilihan"));
		$barangLeft = intval($barang['stok']) - intval($this->request->getVar("banyak_pinjam"));
		$this->PinjamModel->save($data);
		$this->BarangModel->save([
			"id" => $this->request->getVar("pilihan"),
			"stok" => $barangLeft
		]);

		session()->setFlashData('sukses', 'Sukses Meminjam Barang :)');

		return redirect()->to(base_URL());
	}

	public function pinjamKomputer(){
		$id = session()->get('id');
		$data = [
			"id_barang" => $this->request->getVar("pilihan2"),
			"id_peminjam" => $id,
			"banyak_pinjam" => $this->request->getVar("banyak_pinjam2"),
			"tgl_pinjam" => $this->request->getVar("tglPinjam2"),
			"tgl_kembali" => null
		];
		$barang = $this->BarangModel->getBarangById($this->request->getVar("pilihan2"));
		$barangLeft = intval($barang['stok']) - intval($this->request->getVar("banyak_pinjam2"));
		$this->PinjamModel->save($data);
		$this->BarangModel->save([
			"id" => $this->request->getVar("pilihan2"),
			"stok" => $barangLeft
		]);

		session()->setFlashData('sukses2', 'Sukses Menyewa Komputer :)');

		return redirect()->to(base_URL());
	}

	public function belanja(){
		$id = session()->get('id');
		$barang = $this->BarangModel->getBarangById($this->request->getVar("pilihan3"));
		$total = intval($this->request->getVar("banyak_pinjam3")) * intval($barang['harga']);
		$data = [
			"id_pembeli" => $id,
			"id_barang" => $this->request->getVar("pilihan3"),
			"banyak_beli" => $this->request->getVar("banyak_pinjam3"),
			"total" => $total,
			"status" => "0",
			"tgl_beli" => $this->request->getVar("tglPinjam3")
		];
		$barangLeft = intval($barang['stok']) - intval($this->request->getVar("banyak_pinjam3"));
		$this->BeliModel->save($data);
		$this->BarangModel->save([
			"id" => $this->request->getVar("pilihan3"),
			"stok" => $barangLeft
		]);

		session()->setFlashData('sukses2', 'Sukses Membeli Barang :)');

		return redirect()->to(base_URL());
	}

	//--------------------------------------------------------------------

}
