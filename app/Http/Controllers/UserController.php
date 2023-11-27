<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showLogin()
    {
        return view('Authorization.login');
    }

    public function showRegistration()
    {
        return view('Authorization.regist');
    }

    public function showSupplierRegistration()
    {
        return view('Authorization.regist-supplier');
    }

    public function showBuyerRegistration()
    {
        return view('Authorization.regist-buyer');
    }

}
