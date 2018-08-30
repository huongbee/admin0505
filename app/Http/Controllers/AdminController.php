<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Hash;
use Auth;
use App\Products;

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
        $user = new User;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->fullname = $req->fullname;
        $user->birthdate = date('Y-m-d',strtotime($req->birthdate)) ;
        $user->gender = $req->gender;
        $user->address = $req->address;
        $user->phone = $req->phone;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect()
                ->route('getLogin')
                ->with('success','Bạn có thể đăng nhập');
    }

    function getLogin(){
        return view('account.login');
    }

    function postLogin(Request $req){
        $arr = [
            'username'=>$req->username,
            'password'=>$req->inputPassword
        ];
        if(Auth::attempt($arr)){
            return redirect()
                ->route('home');
        }
        else{
            return redirect()
                ->route('getLogin')
                ->with('error','Sai thông tin đăng nhập');
        }
    }

    function index(){
        return view('pages.home');
    }

    function getListProduct($idtype){
        $products = Products::where('id_type',$idtype)->get();
        // dd($products);
        return view('pages.listproduct',compact('products'));
    }

    function logout(){
        Auth::logout();
        return redirect()
                ->route('getLogin')
                ->with('success','Bạn đã đăng xuất');
    }
}
