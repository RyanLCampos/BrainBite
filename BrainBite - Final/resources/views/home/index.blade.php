<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainBite - Home</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div class="menu">
        <a href="{{ route('home.index') }}" class="logo">BRAINBITE</a>

        <nav>
            <ul>
                <li>
                    <a href="{{ route('home.index') }}" class="active">Início</a>
                    <a href="{{ route('tarefas.index') }}">Tarefas</a>
                    <a href="{{ route('provas.index') }}">Provas</a>
                    <a href="{{ route('calendario.index') }}">Calendário</a>
                    <a href="{{ route('anotacoes.index') }}">Anotações</a>
                    <a href="{{ route('eventos.index') }}">Eventos</a>
                    <a href="{{ route('logout') }}">Sair</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <div class="tarefas">
            <h1>Tarefas</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Disciplina</th>
                        <th>Data de Entrega</th>
                        <th>Título</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tarefas as $tarefa)
                        <tr>
                            <td>{{ $tarefa->disciplina_id ? App\Models\Disciplina::find($tarefa->disciplina_id)->nome : 'N/A' }}</td>
                            <td>{{ date('d/m/Y', strtotime($tarefa->data_entrega)) }}</td>
                            <td>{{ $tarefa->titulo }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('tarefas.index') }}" class="btn-ver">Ver todas as Tarefas</a>
        </div>
    
        <div class="provas">
            <h1>Provas</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Disciplina</th>
                        <th>Data da Prova</th>
                        <th>Título</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($provas as $prova)
                        <tr>
                            <td>{{ $prova->disciplina_id ? App\Models\Disciplina::find($prova->disciplina_id)->nome : 'N/A' }}</td>
                            <td>{{ date('d/m/Y', strtotime($prova->data_prova)) }}</td>
                            <td>{{ $prova->titulo }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('provas.index') }}" class="btn-ver">Ver todas as Provas</a>
        </div>
    </div>
</body>
</html>
