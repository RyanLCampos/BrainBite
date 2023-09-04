<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainBite - Detalhes do Evento</title>
    <link rel="stylesheet" href="{{ asset('css/tarefas/show.css') }}">
</head>
<body>
    <div class="container">
        <div class="titulo">
            <a href="{{ route('eventos.index') }}">Voltar</a>
            <h1>Detalhes do Evento</h1>
        </div>
        <div class="card">
            <h3>{{ $evento->titulo }}</h3>
            <strong>Descrição:</strong><p class="descricao-scrollable"><br> {{ $evento->descricao }}</p>
            <p><strong>Local:</strong> {{ $evento->local }}</p>
            <p><strong>Data:</strong> {{ date('d/m/Y', strtotime($evento->data_evento)) }}</p>
            <p><strong>Hora:</strong> {{ date('H:i', strtotime($evento->hora_evento)) }}</p>
            <div class="botoes">
                <form action="{{ route('eventos.edit', $evento->id) }}" method="GET" style="display: inline-block;">
                    @csrf
                    <button type="submit" class="btn-editar">Editar</button>
                </form>
                <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-deletar" onclick="return confirm('Tem certeza que deseja excluir esse evento?')">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>