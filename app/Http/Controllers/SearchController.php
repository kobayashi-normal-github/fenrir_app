<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $msg = '入力';
            return view('search', ['msg' => $msg]);
    }
}
