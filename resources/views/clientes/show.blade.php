@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dados do cliente</h1>
    <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
    <p><strong>E-mail:</strong> {{ $cliente->email }}</p>
    <p><strong>Telefone:</strong> {{ $cliente->telefone }}</p>
    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-primary">Editar</a>
    <form method="POST" action="{{ route('clientes.destroy', $cliente->id) }}" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir o cliente?')">Excluir</button>
    </form>
</div>
@endsection
