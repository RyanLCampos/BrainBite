<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $eventos = Evento::where('user_id', $user->id)->get();
        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('eventos.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $evento = new Evento;
        $evento->titulo = $request->input('titulo');
        $evento->descricao = $request->input('descricao');
        $evento->local = $request->input('local');
        $evento->data_evento = $request->input('data');
        $evento->hora_evento = $request->input('hora');
        $evento->user_id = $user->id;
        $evento->save();

        return redirect()->route('eventos.index')->with('success', 'Evento criado com sucesso!');
    }

    public function show($id)
    {
        $user = Auth::user();
        $evento = Evento::where('user_id', $user->id)->findOrFail($id);
        return view('eventos.show', compact('evento'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $evento = Evento::where('user_id', $user->id)->findOrFail($id);
        return view('eventos.edit', compact('evento'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $evento = Evento::where('user_id', $user->id)->findOrFail($id);
        $evento->titulo = $request->input('titulo');
        $evento->descricao = $request->input('descricao');
        $evento->local = $request->input('local');
        $evento->data_evento = $request->input('data');
        $evento->hora_evento = $request->input('hora');
        $evento->save();

        return redirect()->route('eventos.index')->with('success', 'Evento atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $evento = Evento::where('user_id', $user->id)->findOrFail($id);
        $evento->delete();

        return redirect()->route('eventos.index')->with('success', 'Evento excluído com sucesso!');
    }

}