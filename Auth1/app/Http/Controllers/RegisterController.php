<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|unique:users',
            'first_name' =>'required|min:1|max:50|string',
            'last_name' =>'required|min:1|max:50|string',
            'photo' =>'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
            ]);
        //])->validate();
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $email  = $request->email;
        $first_name  = $request->first_name;
        $last_name  = $request->last_name;
        $password  = $request->password;
        $photo  = $request->file('photo')->getClientOriginalName();
        $photo_ext = pathinfo($photo,PATHINFO_EXTENSION);
        $photo_to_save = rand(1,10).'.'.$photo_ext;
        $request->file('photo')->storeAs('User/Photo/',$photo_to_save);
        $user = Sentinel::registerAndActivate(array(
            'email'    => $email,
            'first_name' => $first_name,
            'last_name'=>$last_name,
            'photo'=>$photo_to_save,
            'password'=>$password
        ));

        //$activation = Activation::create($user);
        //$reg = Sentinel::registerAndActivate($validator);
        $role = Sentinel::findRoleBySlug('prso1');
        $role->users()->attach($user);
       // return $user;
       return redirect()->route('register')->with('success',"User has been created");
    }
}
