@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Acesso</h1>
        <form action="{{ route('acessos.update', $acesso->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" class="form-control" id="titulo" value="{{ $acesso->titulo }}" required>
            </div>
            <div class="form-group">
                <label for="modulos_de_acesso">Módulos de Acesso</label>
                <select name="modulos_de_acesso[]" class="form-control" id="modulos_de_acesso" multiple required>
                    <option value="adicionar" {{ in_array('adicionar', $acesso->modulos_de_acesso) ? 'selected' : '' }}>Adicionar</option>
                    <option value="editar" {{ in_array('editar', $acesso->modulos_de_acesso) ? 'selected' : '' }}>Editar</option>
                    <option value="excluir" {{ in_array('excluir', $acesso->modulos_de_acesso) ? 'selected' : '' }}>Excluir</option>
                    <option value="visualizar" {{ in_array('visualizar', $acesso->modulos_de_acesso) ? 'selected' : '' }}>Visualizar</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
