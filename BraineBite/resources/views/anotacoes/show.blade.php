<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainBite - Detalhes da Anotação</title>
    <link rel="stylesheet" href="{{ asset('css/tarefas/show.css') }}">
</head>
<body>
    <div class="container">
        <div class="titulo">
            <a href="{{ route('provas.index') }}">Voltar</a>
            <h1>Detalhes da Anotação</h1>
        </div>
        <div class="card">
            <h3>{{ $anotacao->titulo }}</h3>
            <p><strong>Conteudo:</strong><br> {{ $anotacao->conteudo }}</p>
            <div class="botoes">
                <form action="{{ route('anotacoes.edit', $anotacao->id) }}" method="GET" style="display: inline-block;">
                    @csrf
                    <button type="submit" class="btn-editar">Editar</button>
                </form>
                <form action="{{ route('anotacoes.destroy', $anotacao->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-deletar" onclick="return confirm('Tem certeza que deseja excluir essa anotação?')">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
