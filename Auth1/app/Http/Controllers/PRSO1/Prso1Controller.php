<?php

namespace App\Http\Controllers\PRSO1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Prso1Controller extends Controller
{
    public function index()
    {
        return view('prso1.dashboard');
    }
}
