<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index()
    {
        $msg = '詳細';
            return view('detail', ['msg' => $msg]);
    }
}
