<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LivrosController extends Controller {
    
    public function novo() {
        return view('livros.cadastro');
    }

    public function salvar(Request $request) {
        $request->validate([
            'isbn'  => 'required|integer',
            'titulo'=> 'required',
            'autor' => 'required',
            'resumo'=> 'required'
        ]);

        Livro::create($request->all());

        return redirect()->route('livros.listar')->with('acao', 'Cadastrado com sucesso');
    }

    public function listar() {
        $dados['livros'] = Livro::all();
        return view('livros.listar', $dados);
    }

    public function editar($id) {
        $dados = ['livro' => Livro::find($id)];
        return view('livros.edicao', $dados);
    }
    
    public function atualizar(Request $request, $id) {
        $request->validate([
            'isbn'  => 'required|integer',
            'titulo'=> 'required',
            'autor' => 'required',
            'resumo'=> 'required'
        ]);

        Livro::where('id', $id)->update($request->except('_token'));

        return redirect()->route('livros.listar')->with('acao', 'Atualizado com sucesso');
    }

    public function visualizar($id) {
        $dados = ['livro' => Livro::find($id)];
        return view('livros.visualizar', $dados);
    }

    public function excluir($id) {
        Livro::destroy($id);
        return redirect()->route('livros.listar')->with('acao', 'Excluído com sucesso');
    }
}
