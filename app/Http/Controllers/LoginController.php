<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller {
    
    public function logar() {
        return view('login');
    }

    public function logout() {
        return view('login');
    }
}
