<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class University extends Controller
{
    public function __construct()
    {

    }
    public function index()
    {
        return view('search.index');
    }
}
