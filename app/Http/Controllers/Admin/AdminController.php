<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        echo 123;
    }
    public function aa(){
        $res=session('id');
        dd($res);
    }
}
