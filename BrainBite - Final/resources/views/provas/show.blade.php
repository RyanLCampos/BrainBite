<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainBite - Detalhes da Prova</title>
    <link rel="stylesheet" href="{{ asset('css/tarefas/show.css') }}">
</head>
<body>
    <div class="container">
        <div class="titulo">
            <a href="{{ route('provas.index') }}">Voltar</a>
            <h1>Detalhes da Prova</h1>
        </div>
        <div class="card">
            <h3>{{ $prova->titulo }}</h3>
            <p class="disciplina">{{ $prova->disciplina_id ? App\Models\Disciplina::find($prova->disciplina_id)->nome : 'N/A' }}</p>
            <strong>Descrição:</strong><p class="descricao-scrollable"><br> {{ $prova->descricao }}</p>
            <p><strong>Status:</strong> {{ ucwords(str_replace('_', ' ', $prova->status)) }}</p>
            <p><strong>Data:</strong> {{ date('d/m/Y', strtotime($prova->data_prova)) }}</p>
            <div class="botoes">
                <form action="{{ route('provas.edit', $prova->id) }}" method="GET" style="display: inline-block;">
                    @csrf
                    <button type="submit" class="btn-editar">Editar</button>
                </form>
                <form action="{{ route('provas.destroy', $prova->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-deletar" onclick="return confirm('Tem certeza que deseja excluir essa prova?')">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
