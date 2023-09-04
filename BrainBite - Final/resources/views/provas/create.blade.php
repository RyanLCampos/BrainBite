<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainBite - Criar Prova</title>
    <link rel="stylesheet" href="{{ asset('css/tarefas/create.css') }}">
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Criar Prova</h1>

            @if (session('success'))
                <div class="alerta-sucesso">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('provas.store') }}" method="POST">
                @csrf

                <div class="label-float">
                    <label for="titulo">Título:</label>
                    <input type="text" name="titulo" required><br>
                </div>

                <div class="texto">
                    <label for="descricao">Descrição:</label>
                    <textarea name="descricao" required></textarea><br>
                </div>

                <div class="label-float">
                    <label for="data_prova">Data da Prova:</label>
                    <input type="date" name="data_prova" min="{{ date('Y-m-d') }}" required><br>
                </div>

                <div class="select-estiloso">
                    <label for="status">Status:</label>
                    <select name="status" required>
                        <option value="realizada">Realizada</option>
                        <option value="em_andamento">Estudando</option>
                        <option value="para_estudar">Estudar</option>
                    </select><br>
                </div>

                <div class="disciplina-select">
                    <label for="disciplina">Disciplina:</label>
                    <select name="disciplina">
                        <option value="">Selecione uma disciplina existente</option>
                        @foreach ($disciplinas as $disciplina)
                            <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                        @endforeach
                    </select>
                    <label for="nova_disciplina">Ou, crie uma nova disciplina:</label>
                    <input type="text" name="nova_disciplina">
                </div>

                <button type="submit">Salvar</button>
            </form>
        </div>
    </div>

</body>
</html>
