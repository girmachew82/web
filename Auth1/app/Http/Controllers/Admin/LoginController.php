<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function dashboard()
    {
      
       return view('admin.layouts.app');
    }
}
