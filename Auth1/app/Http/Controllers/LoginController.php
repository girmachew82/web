<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' =>'required',
            ]);
        //])->validate();
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
      if(Sentinel::authenticate($request->all())){
             // return Sentinel::check();
            //    $slug = Sentinel::getUser()->roles()->first()->slug;
            //    if( $slug == 'admin')
            //        return redirect()->route('admindash');
            //    elseif($slug =='prso1')
            //         return redirect()->route('prso1dash');
            return redirect('user/home');
      }
      else
        return redirect('/login');
      // return $request;
    }
    public function logout()
    {
       Sentinel::logout();
       return redirect('/login');
    }
}
