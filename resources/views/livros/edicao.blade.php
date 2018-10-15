@extends('template')
		
@section('conteudo_principal')
		<h1>Edição de Livros</h1>

		@if ($errors->any())
		<!-- ERRO NO CADASTRO -->
		<div class="alert alert-danger">
			<strong>Erro!</strong>
			@foreach($errors->all() as $erro)
			<p> {{$erro}}</p>
			@endforeach
		</div>
		<!-- [FIM] ERRO -->
		@endif


		<form action="{{route('livros.atualizar', ['id' => $livro['id']])}}" method="post">
			@csrf
			<!-- ISBN -->
			<div class="form-group">
				<label for="campo-isbn">ISBN:</label>
			<input type="number" class="form-control" name="isbn" id="campo-isbn" value="{{old('isbn', $livro['isbn'])}}">
			</div>
			
			<!-- TITULO -->
			<div class="form-group">
				<label for="campo-titulo">Título:</label>
				<input type="text" class="form-control" name="titulo" id="campo-titulo" value="{{old('titulo', $livro['titulo'])}}">
			</div>
				
			<!-- AUTOR -->
			<div class="form-group">
				<label for="campo-email">Autor:</label>
				<input type="text" class="form-control" name="autor" id="campo-email" value="{{old('autor', $livro['autor'])}}">
			</div>

			<!-- CATEGORIA -->
			<div class="form-group">
				<label for="campo-categoria">Categoria:</label>
				<select class="form-control" name="categoria" id="campo-categoria">
					<option value="1" @if(old('categoria', $livro['categoria']) == 1) selected="selected" @endif>Terror</option>
					<option value="2" @if(old('categoria', $livro['categoria']) == 2) selected="selected" @endif>Drama</option>
					<option value="3" @if(old('categoria', $livro['categoria']) == 3) selected="selected" @endif>Romance</option>
					<option value="4" @if(old('categoria', $livro['categoria']) == 4) selected="selected" @endif>Ficção Científica</option>
					<option value="5" @if(old('categoria', $livro['categoria']) == 5) selected="selected" @endif>Pintura</option>
				</select>
			</div>
				
			<!-- RESUMO -->
			<div class="form-group">
				<label for="campo-resumo">RESUMO:</label>
				<textarea class="form-control" id="campo-resumo" name="resumo">{{old('resumo', $livro['resumo'])}}</textarea>
			</div>
				
			<button type="submit" class="btn btn-default">Editar</button>				
		</form>
@endsection