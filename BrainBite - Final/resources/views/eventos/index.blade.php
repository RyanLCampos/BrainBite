<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainBite - Eventos</title>
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
                    <a href="{{ route('anotacoes.index') }}">Anotações</a>
                    <a href="{{ route('eventos.index') }}" class="active">Eventos</a>
                    <a href="{{ route('logout') }}">Sair</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <h1>Eventos</h1>

        @if (session('success'))
            <div class="alerta-sucesso">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-container">

            <table class="table">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                    <tr>
                        <td>{{ $evento->titulo }}</td>
                        <td>{{ date('d/m/Y', strtotime($evento->data_evento)) }}</td>
                        <td>{{ date('H:i', strtotime($evento->hora_evento)) }}</td>
                        <td>
                            <form action="{{ route('eventos.show', $evento->id) }}" method="GET" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn-ver">Ver</button>
                            </form>
                            <form action="{{ route('eventos.edit', $evento->id) }}" method="GET" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn-editar">Editar</button>
                            </form>
                            <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-deletar" onclick="return confirm('Tem certeza que deseja excluir esse evento?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('eventos.create') }}" class="btn-criar">Criar Evento</a>
    </div>
</body>
</html>