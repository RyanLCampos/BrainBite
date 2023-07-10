<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Anotacao;

class AnotacaoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $anotacoes = Anotacao::where('user_id', $user->id)->get();
        return view('anotacoes.index', compact('anotacoes'));
    }

    public function create()
    {
        return view('anotacoes.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $anotacao = new Anotacao;
        $anotacao->titulo = $request->input('titulo');
        $anotacao->conteudo = $request->input('conteudo');
        $anotacao->user_id = $user->id;

        $anotacao->save();

        return redirect()->route('anotacoes.index')->with('success', 'Anotação criada com sucesso!');
    }

    public function show($id)
    {
        $user = Auth::user();
        $anotacao = Anotacao::where('user_id', $user->id)->findOrFail($id);
        return view('anotacoes.show', compact('anotacao'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $anotacao = Anotacao::where('user_id', $user->id)->findOrFail($id);
        return view('anotacoes.edit', compact('anotacao'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $anotacao = Anotacao::where('user_id', $user->id)->findOrFail($id);
        $anotacao->titulo = $request->input('titulo');
        $anotacao->conteudo = $request->input('conteudo');

        $anotacao->save();

        return redirect()->route('anotacoes.index')->with('success', 'Anotação atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $anotacao = Anotacao::where('user_id', $user->id)->findOrFail($id);
        $anotacao->delete();

        return redirect()->route('anotacoes.index')->with('success', 'Anotação excluída com sucesso!');
    }
}
