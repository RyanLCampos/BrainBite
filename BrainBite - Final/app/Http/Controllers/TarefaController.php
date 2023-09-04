<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tarefa;
use App\Models\Disciplina;

class TarefaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tarefas = Tarefa::where('user_id', $user->id)->get();
        return view('tarefas.index', compact('tarefas'));
    }

    public function create()
    {
        $user = Auth::user();
        $disciplinas = Disciplina::where('user_id', $user->id)->get();
        return view('tarefas.create', compact('disciplinas'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $tarefa = new Tarefa;
        $tarefa->titulo = $request->input('titulo');
        $tarefa->descricao = $request->input('descricao');
        $tarefa->status = $request->input('status');
        $tarefa->data_entrega = $request->input('data_entrega');
        $tarefa->user_id = $user->id;

        $disciplinaId = $request->input('disciplina');
        $novaDisciplina = $request->input('nova_disciplina');

        if ($novaDisciplina) {
            $disciplina = new Disciplina;
            $disciplina->nome = $novaDisciplina;
            $disciplina->user_id = $user->id;
            $disciplina->save();
            $tarefa->disciplina_id = $disciplina->id;
        } elseif ($disciplinaId) {
            $tarefa->disciplina_id = $disciplinaId;
        }

        $tarefa->save();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso!');
    }

    public function show($id)
    {
        $user = Auth::user();
        $tarefa = Tarefa::where('user_id', $user->id)->findOrFail($id);
        $disciplina = Disciplina::find($tarefa->disciplina_id);
        return view('tarefas.show', compact('tarefa', 'disciplina'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $tarefa = Tarefa::where('user_id', $user->id)->findOrFail($id);
        $disciplinas = Disciplina::where('user_id', $user->id)->get();
        return view('tarefas.edit', compact('tarefa', 'disciplinas'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $tarefa = Tarefa::where('user_id', $user->id)->findOrFail($id);
        $tarefa->titulo = $request->input('titulo');
        $tarefa->descricao = $request->input('descricao');
        $tarefa->status = $request->input('status');
        $tarefa->data_entrega = $request->input('data_entrega');

        $disciplinaId = $request->input('disciplina');
        $novaDisciplina = $request->input('nova_disciplina');

        if ($novaDisciplina) {
            $disciplina = new Disciplina;
            $disciplina->nome = $novaDisciplina;
            $disciplina->user_id = $user->id;
            $disciplina->save();
            $tarefa->disciplina_id = $disciplina->id;
        } elseif ($disciplinaId) {
            $tarefa->disciplina_id = $disciplinaId;
        } else {
            $tarefa->disciplina_id = null;
        }

        $tarefa->save();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $tarefa = Tarefa::where('user_id', $user->id)->findOrFail($id);
        $tarefa->delete();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa excluída com sucesso!');
    }
}
