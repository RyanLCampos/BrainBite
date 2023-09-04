<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainBite - Editar Anotação</title>
    <link rel="stylesheet" href="{{ asset('css/tarefas/create.css') }}">
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Editar Evento</h1>

            @if (session('success'))
                <div class="alerta-sucesso">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('eventos.update', $evento->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="label-float">
                    <label for="titulo">Título:</label>
                    <input type="text" name="titulo" id="titulo" value="{{ $evento->titulo }}" required>
                </div>

                <div class="texto">
                    <label for="descricao">Descrição:</label>
                    <textarea name="descricao" id="descricao" required>{{ $evento->descricao }}</textarea>
                </div>
                
                <div class="label-float">
                    <label for="local">Local:</label>
                    <input type="text" name="local" id="local" value="{{ $evento->local }}" required>
                </div>
                
                <div class="data-hora">
                    <div class="label-float">
                        <label for="data">Data:</label>
                        <input type="date" name="data" id="data" value="{{ $evento->data }}" required>
                    </div>
                    
                    <div class="label-float">
                        <label for="hora">Hora:</label>
                        <input type="time" name="hora" id="hora" value="{{ $evento->hora }}" required>
                    </div>
                </div>

                <button type="submit">Salvar</button>
            </form>
        </div>
    </div>
</body>
</html>