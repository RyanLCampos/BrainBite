<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainBite - Detalhes da Tarefa</title>
    <link rel="stylesheet" href="{{ asset('css/tarefas/show.css') }}">
</head>
<body>
    <div class="container">
        <div class="titulo">
            <a href="{{ route('tarefas.index') }}">Voltar</a>
            <h1>Detalhes da Tarefa</h1>
        </div>
        <div class="card">
            <h3>{{ $tarefa->titulo }}</h3>
            <p class="disciplina">{{ $tarefa->disciplina_id ? App\Models\Disciplina::find($tarefa->disciplina_id)->nome : 'N/A' }}</p>
            <p><strong>Descrição:</strong><br> {{ $tarefa->descricao }}</p>
            <p><strong>Status:</strong> {{ ucwords(str_replace('_', ' ', $tarefa->status)) }}</p>
            <p><strong>Data de Entrega:</strong> {{ $tarefa->data_entrega }}</p>
            <form action="{{ route('tarefas.edit', $tarefa->id) }}" method="GET" style="display: inline-block;">
                @csrf
                <button type="submit" class="btn-editar">Editar</button>
            </form>
            
        
            <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-deletar"onclick="return confirm('Tem certeza que deseja excluir essa tarefa?')">Excluir</button>
            </form>
        
        </div>

    </div>
</body>
</html>