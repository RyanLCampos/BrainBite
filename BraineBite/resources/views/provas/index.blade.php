<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainBite - Provas</title>
    <link rel="stylesheet" href="{{ asset('css/tarefas/index.css') }}">
</head>
<body>
    <div class="menu">
        <a href="{{ route('home.index') }}" class="logo">BRAINBITE</a>

        <nav>
            <ul>
                <li>
                    <a href="{{ route('home.index') }}">Início</a>
                    <a href="{{ route('tarefas.index') }}">Tarefas</a>
                    <a href="{{ route('provas.index') }}" class="active">Provas</a>
                    <a href="{{ route('calendario.index') }}">Calendário</a>
                    <a href="{{ route('anotacoes.index') }}">Anotações</a>
                    <a href="{{ route('tarefas.index') }}">Eventos</a>
                    <a href="{{ route('logout') }}">Sair</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container">

        <h1>Provas</h1>
    
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
                    <th>Data</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($provas as $prova)
                <tr>
                    <td>{{ $prova->titulo }}</td>
                    <td>{{ $prova->disciplina_id ? App\Models\Disciplina::find($prova->disciplina_id)->nome : 'N/A' }}</td>
                    <td>{{ $prova->data_prova }}</td>
                    <td>{{ ucwords(str_replace('_', ' ', $prova->status)) }}</td>
                    <td>
                        <form action="{{ route('provas.show', $prova->id) }}" method="GET" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn-ver">Ver</button>
                        </form>
                        <form action="{{ route('provas.edit', $prova->id) }}" method="GET" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn-editar">Editar</button>
                        </form>
                        <form action="{{ route('provas.destroy', $prova->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-deletar" onclick="return confirm('Tem certeza que deseja excluir essa prova?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('provas.create') }}" class="btn-criar">Criar Prova</a>
    </div>
</body>
</html>
