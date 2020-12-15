<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends model{

	protected $table = "user";
	protected $useTimestamps = true;
	protected $allowedFields =['username','password','name', 'birth','nis', 'nisn', 'kelas', 'level'];

	public function loginAuth($data){
		$username = strtolower($data['logUsername']);
		$password = md5($data['logPass']);

		// cek username
		$check = $this->where(['username' => $username])->first();
		$check2 = $this->where(['nis' => $username])->first();
		if ($check || $check2) {
			// cek password
			if ($check) {
				if ($check['password'] == $password) {
					return $check;
				}else{
					return false;
				}
			}elseif ($check2) {
				if ($check2['password'] == $password) {
					return $check2;
				}else{
					return false;
				}
			}			
		}else{
			return false;
		}
	}

	public function getUserById($id){
		return $this->where(['id' => $id])->first();
	}

	public function getUserByUsername($username){
		return $this->where(['username' => $username])->first();
	}

	public function getUser() {
		return $this->where(['level' => "user"])->findAll();
	}

}