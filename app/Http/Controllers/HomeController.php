<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function getIndex()
    {
        //$name = Auth::user()->name;

        return view('layouts.master');
    }

    public function gioithieu()
    {
        return 'man hinh ';
    }
    public function getLogout() {
        Auth::logout();
        return redirect()->route('home');
    }
}
