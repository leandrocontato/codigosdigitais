@extends('layouts.app')

@section('content')
    <h1>Relatório de Álbuns por Cliente</h1>
    <table>
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Total de Álbuns</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($albumsByClient as $item)
                <tr>
                    <td>{{ $item->nome_completo }}</td>
                    <td>{{ $item->total_albums }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
