@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tipos de Acesso</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Módulos de Acesso</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($acessos as $acesso)
                <tr>
                    <td>{{ $acesso->id }}</td>
                    <td>{{ $acesso->titulo }}</td>
                    <td>{{ implode(', ', $acesso->modulos_de_acesso) }}</td>
                    <td>
                        <a href="{{ route('acessos.show', $acesso->id) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('acessos.edit', $acesso->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('acessos.destroy', $acesso->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('acessos.create') }}" class="btn btn-primary">Novo Tipo de Acesso</a>
    </div>
@endsection
