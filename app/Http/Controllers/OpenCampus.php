<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OpenCampus extends Controller
{
    public function index()
    {
        return view('general.opencampus');
    }
}
