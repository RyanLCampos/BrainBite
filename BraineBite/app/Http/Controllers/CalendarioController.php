<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
use App\Models\Prova;

class CalendarioController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::all();
        $provas = Prova::all();

        // Obter todos os dias do mês atual
        $days = [];
        $currentMonth = date('m');
        $currentYear = date('Y');
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $days[] = $day;
        }

        return view('calendario.index', compact('tarefas', 'provas', 'days'));
    }
}
