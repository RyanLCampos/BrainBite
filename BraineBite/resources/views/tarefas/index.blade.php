<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainBite - Tarefas</title>
    <link rel="stylesheet" href="{{ asset('css/tarefas/index.css') }}">
</head>
<body>
    <div class="menu">
        <a href="{{ route('home.index') }}" class="logo">BRAINBITE</a>

        <nav>
            <ul>
                <li>
                    <a href="{{ route('home.index') }}">Início</a>
                    <a href="{{ route('tarefas.index') }}" class="active">Tarefas</a>
                    <a href="{{ route('provas.index') }}">Provas</a>
                    <a href="{{ route('calendario.index') }}">Calendário</a>
                    <a href="{{ route('anotacoes.index') }}">Anotações</a>
                    <a href="{{ route('tarefas.index') }}">Eventos</a>
                    <a href="{{ route('logout') }}">Sair</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <h1>Tarefas</h1>

        @if (session('success'))
            <div class="alerta-sucesso">
                {{ session('success') }}
            </div>
        @endif

        
        <table class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Disciplina</th>
                    <th>Status</th>
                    <th>Data de Entrega</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tarefas as $tarefa)
                <tr>
                    <td>{{ $tarefa->titulo }}</td>
                    <td>{{ $tarefa->disciplina_id ? App\Models\Disciplina::find($tarefa->disciplina_id)->nome : 'N/A' }}</td>
                    <td>{{ ucwords(str_replace('_', ' ', $tarefa->status)) }}</td>
                    <td>{{ $tarefa->data_entrega }}</td>
                    <td>
                        <form action="{{ route('tarefas.show', $tarefa->id) }}" method="GET" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn-ver">Ver</button>
                        </form>
                        <form action="{{ route('tarefas.edit', $tarefa->id) }}" method="GET" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn-editar">Editar</button>
                        </form>
                        <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-deletar" onclick="return confirm('Tem certeza que deseja excluir essa tarefa?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('tarefas.create') }}" class="btn-criar">Criar Tarefa</a>
    </div>
</body>
</html>
