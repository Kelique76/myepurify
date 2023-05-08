<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserCTRL extends Controller
{
    public function listUser()
    {
        $users = User::all();
        return view('admin.userdata', compact('users'));
    }
}
