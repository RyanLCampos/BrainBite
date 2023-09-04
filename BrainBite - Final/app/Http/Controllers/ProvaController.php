<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prova;
use App\Models\Disciplina;
use Illuminate\Support\Facades\Auth;

class ProvaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $provas = Prova::where('user_id', $user->id)->get();
        return view('provas.index', compact('provas'));
    }

    public function create()
    {
        $user = Auth::user();
        $disciplinas = Disciplina::where('user_id', $user->id)->get();
        return view('provas.create', compact('disciplinas'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $prova = new Prova;
        $prova->titulo = $request->input('titulo');
        $prova->descricao = $request->input('descricao');
        $prova->data_prova = $request->input('data_prova');
        $prova->status = $request->input('status');
        $prova->user_id = $user->id;

        $disciplinaId = $request->input('disciplina');
        $novaDisciplina = $request->input('nova_disciplina');

        if ($novaDisciplina) {
            $disciplina = new Disciplina;
            $disciplina->nome = $novaDisciplina;
            $disciplina->user_id = $user->id;
            $disciplina->save();
            $prova->disciplina_id = $disciplina->id;
        } elseif ($disciplinaId) {
            $prova->disciplina_id = $disciplinaId;
        }

        $prova->save();

        return redirect()->route('provas.index')->with('success', 'Prova criada com sucesso!');
    }

    public function show($id)
    {
        $user = Auth::user();
        $prova = Prova::where('user_id', $user->id)->findOrFail($id);
        $disciplina = Disciplina::find($prova->disciplina_id);
        return view('provas.show', compact('prova', 'disciplina'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $prova = Prova::where('user_id', $user->id)->findOrFail($id);
        $disciplinas = Disciplina::where('user_id', $user->id)->get();
        return view('provas.edit', compact('prova', 'disciplinas'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $prova = Prova::where('user_id', $user->id)->findOrFail($id);
        $prova->titulo = $request->input('titulo');
        $prova->descricao = $request->input('descricao');
        $prova->data_prova = $request->input('data_prova');
        $prova->status = $request->input('status');

        $disciplinaId = $request->input('disciplina');
        $novaDisciplina = $request->input('nova_disciplina');

        if ($novaDisciplina) {
            $disciplina = new Disciplina;
            $disciplina->nome = $novaDisciplina;
            $disciplina->user_id = $user->id;
            $disciplina->save();
            $prova->disciplina_id = $disciplina->id;
        } elseif ($disciplinaId) {
            $prova->disciplina_id = $disciplinaId;
        } else {
            $prova->disciplina_id = null;
        }

        $prova->save();

        return redirect()->route('provas.index')->with('success', 'Prova atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $prova = Prova::where('user_id', $user->id)->findOrFail($id);
        $prova->delete();

        return redirect()->route('provas.index')->with('success', 'Prova excluída com sucesso!');
    }
}
