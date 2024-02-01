<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index(Request $request)
    {
        $msg = '結果';
        dump($request);
        return view('result', compact('msg','request'));
    }
}
