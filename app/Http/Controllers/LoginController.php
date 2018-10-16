<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller {
    
    public function login() {
        return view('login');
    }

    public function logar(Request $request) {
        if ($request->email == 'teste@teste.com' && $request->senha == '123456') {
            $request->session()->put('usuario', 'Carlos');
            return redirect()->route('livros.listar');
        } else
            return redirect('login')->with('erro', 'Login ou senha inválida');
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect('login');
    }
}
