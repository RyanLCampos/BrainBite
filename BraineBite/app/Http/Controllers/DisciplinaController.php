<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;

class DisciplinaController extends Controller
{
    public function store(Request $request)
    {
        $disciplina = new Disciplina;
        $disciplina->nome = $request->input('nome');
        $disciplina->descricao = $request->input('descricao');
        $disciplina->save();

        return redirect()->back()->with('success', 'Disciplina criada com sucesso!');
    }
}
