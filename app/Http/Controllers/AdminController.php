<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class AdminController extends Controller
{
    function getRegister(){
        return view('account.register');
    }

    function postRegister(Request $req){
        $validator = Validator::make($req->all(), [
            'fullname' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'username'=> 'required|min:10|unique:users',
            'password' => 'required|min:6',
            're_password' => 'required|same:password'
        ],[
           'email.unique'=>'Email đã có người sử dụng',
            
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        dd($req->all());
    }






    function getLogin(){
        return view('account.login');
    }

    function postLogin(){
        
    }
}
