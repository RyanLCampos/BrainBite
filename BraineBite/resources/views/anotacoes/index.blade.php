<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainBite - Anotações</title>
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
                    <a href="{{ route('provas.index') }}">Provas</a>
                    <a href="{{ route('calendario.index') }}">Calendário</a>
                    <a href="{{ route('anotacoes.index') }}" class="active">Anotações</a>
                    <a href="{{ route('home.index') }}">Eventos</a>
                    <a href="{{ route('logout') }}">Sair</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <h1>Anotações</h1>

        @if (session('success'))
            <div class="alerta-sucesso">
                {{ session('success') }}
            </div>
        @endif

        
        <table class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anotacoes as $anotacao)
                <tr>
                    <td>{{ $anotacao->titulo }}</td>
                    <td>
                        <form action="{{ route('anotacoes.show', $anotacao->id) }}" method="GET" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn-ver">Ver</button>
                        </form>
                        <form action="{{ route('anotacoes.edit', $anotacao->id) }}" method="GET" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn-editar">Editar</button>
                        </form>
                        <form action="{{ route('anotacoes.destroy', $anotacao->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-deletar" onclick="return confirm('Tem certeza que deseja excluir essa anotação?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('anotacoes.create') }}" class="btn-criar">Criar Anotação</a>
    </div>
</body>
</html>
