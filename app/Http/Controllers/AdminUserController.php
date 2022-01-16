<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function admin()
    {
        return view('admin.user.admin' , ['users' => User::all()]);
    }

    public function customers()
    {
        return view('admin.user.customers');
    }
}
