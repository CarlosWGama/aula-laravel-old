<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return redirect()->route('livros.listar')->with('acao', 'Cadastrado com sucesso');
    }

    public function listar() {
        $dados['livros'] = [
            ['id' => 1, 'isbn' => '999999999', 'autor' => 'Autor 1', 'titulo' => 'Livro 1'],
            ['id' => 2, 'isbn' => '888888888', 'autor' => 'Autor 2', 'titulo' => 'Livro 2']
        ];
        return view('livros.listar', $dados);
    }

    public function editar($id) {
        $dados = ['livro' => [
                'id'        => 1,
                'isbn'      => 23123123123,
                'categoria' => 3,
                'titulo'    => 'Titulo 1',
                'autor'     => 'Autor 1',
                'resumo'    => 'Bla bla bla bla bla bla'
            ]
        ];
        
        return view('livros.edicao', $dados);
    }
    
    public function atualizar(Request $request) {
        $request->validate([
            'isbn'  => 'required|integer',
            'titulo'=> 'required',
            'autor' => 'required',
            'resumo'=> 'required'
        ]);

        return redirect()->route('livros.listar')->with('acao', 'Atualizado com sucesso');
    }

    public function visualizar($id) {
        $dados = ['livro' => [
                    'id'        => 1,
                    'titulo'    => 'Titulo 1',
                    'autor'     => 'Autor 1',
                    'resumo'    => 'Bla bla bla bla bla bla'
                ]
        ];
        return view('livros.visualizar', $dados);
    }

    public function excluir($id) {
     
        return redirect()->route('livros.listar')->with('acao', 'Excluído com sucesso');
    }
}
