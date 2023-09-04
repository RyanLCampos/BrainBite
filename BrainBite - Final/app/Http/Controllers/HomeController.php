<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
use App\Models\Prova;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $tarefas = Tarefa::where('user_id', $user->id)
                        ->orderBy('data_entrega')
                        ->take(3)
                        ->get();
                        
        $provas = Prova::where('user_id', $user->id)
                    ->orderBy('data_prova')
                    ->take(3)
                    ->get();
            
        return view('home.index', compact('tarefas', 'provas'));
    }
}
