<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{

	protected $UserModel;
	public function __construct()
	{
		$this->UserModel = new UserModel();
	}

	public function index()
	{
		helper("cookie");
		if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
			$id = $_COOKIE['id'];
			$key = $_COOKIE['key'];

			//get user by id
			$user = $this->UserModel->getUserById($id);

			//cek cookie dan username
			if ($key == md5($user['username'])) {
				session()->set($user);
				return redirect()->to(base_URL());
			}
		}

		if (session()->get('id')) {
			return redirect()->to(base_URL());
		}

		$data = [
			'validation' => \Config\Services::validation()
		];
		return view('login/index', $data);
	}

	public function regist()
	{
		if (!$this->validate([
			strtolower('username') => [
				'rules' => 'required|is_unique[user.username]',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
					'is_unique' => 'Username sudah terdaftar'
				]
			],
			'nis' => [
				'rules' => 'required|is_unique[user.nis]',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
					'is_unique' => 'Nis sudah terdaftar'
				]
			]
		])) {
			$validation = \Config\Services::validation();
			return redirect()->to(base_URL('/login'))->withInput();
		} else {
			$name = $this->request->getVar('namaDepan');
			$name .= " ";
			$name .= $this->request->getVar('namaBelakang');
			$data = [
				'username' => strtolower($this->request->getVar('username')),
				'password' => md5($this->request->getVar('password')),
				'name' => $name,
				'birth' => $this->request->getVar('tglLahir'),
				'nis' => $this->request->getVar('nis'),
				'nisn' => $this->request->getVar('nisn'),
				'kelas' => $this->request->getVar('kelas'),
				'level' => 'user'
			];

			$this->UserModel->save($data);

			session()->setFlashData('regist', 'Register sukses silahkan login lagi');

			return redirect()->to(base_URL('/login'));
		}
	}

	public function loginProses()
	{
		if ($this->request->getVar('logCookie')) {
			// do something
			$login = $this->UserModel->loginAuth($this->request->getVar());
			if ($login == false) {
				session()->setFlashData('wrong', 'Username atau password salah');
				return redirect()->to(base_URL('/login'));
			} else {
				// set session
				session()->set($login);
				$id = $login['id'];
				//set cookie
				helper("cookie");
				setcookie('id', $id, time() + (86400 * 365));
				setcookie('key', md5($login['username']), time() + (86400 * 365));

				if ($login['level'] == "admin") {
					return redirect()->to(base_URL('/admin'));
				} else {
					return redirect()->to(base_URL());
				}
			}
		} else {
			// do something
			$login = $this->UserModel->loginAuth($this->request->getVar());
			if ($login == false) {
				session()->setFlashData('wrong', 'Username atau password salah');
				return redirect()->to(base_URL('/login'));
			} else {
				session()->set($login);
				if ($login['level'] == "admin") {
					return redirect()->to(base_URL('/admin'));
				} else {
					return redirect()->to(base_URL());
				}
			}
		}
	}

	public function logout()
	{
		helper("cookie");
		setcookie('id', '', time() - 1);
		setcookie('key', '', time() - 1);

		$data = [
			'id',
			'username',
			'password',
			'name',
			'birth',
			'nis',
			'nisn',
			'kelas',
			'user',
			'created_at',
			'updated_at'
		];

		session()->remove($data);

		return redirect()->to(base_URL('/login'));
	}
}
