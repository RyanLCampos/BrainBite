<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainBite - Criar Anotação</title>
    <link rel="stylesheet" href="{{ asset('css/tarefas/create.css') }}">
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Criar Anotação</h1>

            @if (session('success'))
                <div class="alerta-sucesso">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('anotacoes.store') }}" method="POST">
                @csrf

                <div class="label-float">
                    <label for="titulo">Título:</label>
                    <input type="text" name="titulo" id="titulo" required>
                </div>

                <div class="texto">
                    <label for="conteudo">Conteúdo:</label>
                    <textarea name="conteudo" id="conteudo" required></textarea>
                </div>

                <button type="submit">Salvar</button>
            </form>
        </div>
    </div>
</body>
</html>
