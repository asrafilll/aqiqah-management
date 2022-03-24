<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $viewPath;

    public function __construct()
    {
        $this->viewPath = 'users_management.users';
    }

    public function index() {
        $user = User::with(['roles', 'branches.branch'])->get();
        $data = [
            'users' => $user
        ];

        // return json_encode($data);
        return view($this->viewPath . '.index')
            ->with($data);
    }
}
