<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index(){
        return view('login');
    }

    function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required'=>'Email Wajib Diisi',
            'password.required'=>'Password Wajib Diisi'
        ]);

        $infoLogin =[
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infoLogin)){
            if(Auth::user()->level == 'operator'){
                return redirect('admin/operator');
            }elseif (Auth::user()->level == 'marketing'){
                return redirect('admin/marketing');
            }elseif (Auth::user()->level == 'keuangan'){
                return redirect('admin/keuangan');
            }
        }else{
            return redirect('')->withErrors('Email atau password salah')->withInput();
        }
    }
        function logout()
        {
            Auth::logout();
            return redirect('');
        }

}
