<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserList extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $user = $this->UserModel->getUser();
        $data = [
            'title' => "Labkom | Admin User List",
            "active" => "userList",
            "user" => $user
        ];
        return view('admin/user', $data);
    }

    //--------------------------------------------------------------------

}
