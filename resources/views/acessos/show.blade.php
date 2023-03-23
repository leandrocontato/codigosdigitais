@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $acesso->titulo }}</h1>
        <p><strong>Módulos de Acesso:</strong></p>
        <ul>
            @foreach($acesso->modulos_de_acesso as $modulo)
                <li>{{ ucfirst($modulo) }}</li>
            @endforeach
        </ul>
    </div>
@endsection
