<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perfis = $request->perfis ?? [];

        $validator = Validator::make($request->all(), [
            'nome_usuario' => 'required|unique:clientes|regex:/^[a-zA-Z0-9_]*$/',
            'nome_completo' => 'required',
            'cpf' => 'required|unique:clientes',
            'rg' => 'nullable',
            'data_nascimento' => 'required|date',
            'email' => 'required|unique:clientes|email',
            'cep' => 'required',
            'estado' => 'required',
            'cidade' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'telefone_celular' => 'nullable',
            'perfis.*.tipo' => 'required|in:Instagram,Facebook,Twitter,TikTok,Outros',
            'perfis.*.nome_usuario' => 'required',
            'perfis.*.url' => 'nullable|url',
            'perfis.*.ultimo_acesso' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()->route('clientes.create')
                ->withErrors($validator)
                ->withInput();
        }

        $cliente = new Cliente();
        $cliente->nome_usuario = $request->nome_usuario;
        $cliente->nome_completo = $request->nome_completo;
        $cliente->cpf = $request->cpf;
        $cliente->rg = $request->rg;
        $cliente->data_nascimento = $request->data_nascimento;
        $cliente->email = $request->email;
        $cliente->cep = $request->cep;
        $cliente->estado = $request->estado;
        $cliente->cidade = $request->cidade;
        $cliente->rua = $request->rua;
        $cliente->numero = $request->numero;
        $cliente->complemento = $request->complemento;
        $cliente->telefone_celular = $request->telefone_celular;
        $cliente->save();

        $perfis = $request->perfis;
        if (!empty($perfis)) {
            foreach ($perfis as $perfil) {
                $cliente->perfis()->create($perfil);
            }
        }
        Log::info('Novo item adicionado: ' . $cliente->nome);
        Log::channel('item_creation')->info('Novo item adicionado: ' . $cliente->nome);

        return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nome_usuario' => 'required|unique:clientes,nome_usuario,' . $id . '|regex:/^[a-zA-Z0-9_]*$/',
            'nome_completo' => 'required',
            'cpf' => 'required|unique:clientes,cpf,' . $id,
            'rg' => 'nullable',
            'data_nascimento' => 'required|date',
            'email' => 'required|unique:clientes,email,' . $id . '|email',
            'cep' => 'required',
            'estado' => 'required',
            'cidade' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'telefone_celular' => 'nullable',
            'perfis.*.tipo' => 'required|in:Instagram,Facebook,Twitter,TikTok,Outros',
            'perfis.*.nome_usuario' => 'required',
            'perfis.*.url' => 'nullable|url',
            'perfis.*.ultimo_acesso' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()->route('clientes.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $cliente->nome_usuario = $request->nome_usuario;
        $cliente->nome_completo = $request->nome_completo;
        $cliente->cpf = $request->cpf;
        $cliente->rg = $request->rg;
        $cliente->data_nascimento = $request->data_nascimento;
        $cliente->email = $request->email;
        $cliente->cep = $request->cep;
        $cliente->estado = $request->estado;
        $cliente->cidade = $request->cidade;
        $cliente->rua = $request->rua;
        $cliente->numero = $request->numero;
        $cliente->complemento = $request->complemento;
        $cliente->telefone_celular = $request->telefone_celular;
        $cliente->save();

        $perfis = $request->perfis;
        $cliente->perfis()->delete();
        if (!empty($perfis)) {
            foreach ($perfis as $perfil) {
                $cliente->perfis()->create($perfil);
            }
        }

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->perfis()->delete();
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso!');
    }

    public function albumsReport()
    {
        $albumsByClient = DB::table('clientes')
            ->leftJoin('albums', 'clientes.id', '=', 'albums.cliente_id')
            ->select('clientes.nome_completo', DB::raw('count(albums.id) as total_albums'))
            ->groupBy('clientes.id')
            ->get();

        return view('clientes.albums_report', ['albumsByClient' => $albumsByClient]);
    }
}
