<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function getRegister(){
        return view('account.register');
    }

    function postRegister(){

    }

    function getLogin(){
        return view('account.login');
    }

    function postLogin(){
        
    }
}
