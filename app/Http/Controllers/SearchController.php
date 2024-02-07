<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {

        $flash_messages = "";
        return view('search', compact('flash_messages'));
    }
}
