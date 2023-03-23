<?php

namespace App\Http\Controllers;

use App\Models\Acesso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AcessoController extends Controller
{
    public function index()
    {
        $acessos = Acesso::all();

        return view('acessos.index', compact('acessos'));
    }

    public function create()
    {
        return view('acessos.create');
    }

    public function store(Request $request)
    {
        $perfis = $request->perfis ?? [];

        $validatedData = $request->validate([
            'titulo' => 'required|max:255',
            'modulos_de_acesso' => 'required|array',
        ]);

        $acesso = Acesso::create($validatedData);

        Log::info('Novo item adicionado: ' . $acesso->nome);
        Log::channel('item_creation')->info('Novo item adicionado: ' . $acesso->nome);
        return redirect()->route('acessos.index')
            ->with('success', 'Acesso criado com sucesso.');
    }


    public function edit(Acesso $acesso)
    {
        return view('acessos.edit', compact('acesso'));
    }

    public function update(Request $request, Acesso $acesso)
    {
        $validatedData = $request->validate([
            'titulo' =>
            'required|max:255',
            'modulos_de_acesso' => 'required|array',
        ]);

        $acesso->update($validatedData);

        return redirect()->route('acessos.index')
            ->with('success', 'Acesso atualizado com sucesso.');
    }

    public function destroy(Acesso $acesso)
    {
        $acesso->delete();

        return redirect()->route('acessos.index')
            ->with('success', 'Acesso excluído com sucesso.');
    }
}
