@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Excluir Acesso</h1>
        <p>Você tem certeza que deseja excluir o acesso "{{ $acesso->titulo }}"?</p>
        <form action="{{ route('acessos.destroy', $acesso->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
            <a href="{{ route('acessos.index') }}" class="btn btn-default">Cancelar</a>
        </form>
    </div>
@endsection
