<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index(){
       return view("sesi/login");
    }

    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email Wajib Diisi',
            'password.required'=>'Password Wajib Diisi',
        ]);

        $email = $request->input('email'); // Definisikan variabel $email dengan nilai dari inputan formulir
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Otentikasi berhasil, lakukan sesuatu di sini
            return redirect()->intended('/');
        } else {
            // Otentikasi gagal, tampilkan pesan kesalahan
            return redirect('sesi')->withErrors('Email atau Password yang diinputkan salah');
        }
    }
}
