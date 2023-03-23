@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Criar Acesso</h1>
        <form action="{{ route('acessos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" class="form-control" id="titulo" required>
            </div>
            <div class="form-group">
                <label for="modulos_de_acesso">Módulos de Acesso</label>
                <select name="modulos_de_acesso[]" class="form-control" id="modulos_de_acesso" multiple required>
                    <option value="adicionar">Adicionar</option>
                    <option value="editar">Editar</option>
                    <option value="excluir">Excluir</option>
                    <option value="visualizar">Visualizar</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
