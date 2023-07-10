<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainBite - Editar Prova</title>
    <link rel="stylesheet" href="{{ asset('css/tarefas/create.css') }}">
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Editar Prova</h1>

            @if (session('success'))
                <div class="alerta-sucesso">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('provas.update', $prova->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="label-float">
                    <label for="titulo">Título:</label>
                    <input type="text" name="titulo" id="titulo" value="{{ $prova->titulo }}" required>
                </div>

                <div class="texto">
                    <label for="descricao">Descrição:</label>
                    <textarea name="descricao" id="descricao" required>{{ $prova->descricao }}</textarea>
                </div>

                <div class="select-estiloso">
                    <label for="status">Status:</label>
                    <select name="status" id="status" required>
                        <option value="realizada" {{ $prova->status == 'realizada' ? 'selected' : '' }}>Realizada</option>
                        <option value="estudando" {{ $prova->status == 'estudando' ? 'selected' : '' }}>Estudando</option>
                        <option value="estudar" {{ $prova->status == 'estudar' ? 'selected' : '' }}>Estudar</option>
                    </select>
                </div>

                <div class="label-float">
                    <label for="data_prova">Data:</label>
                    <input type="date" name="data_prova" id="data_prova" value="{{ $prova->data_prova }}" min="{{ date('Y-m-d') }}" required>
                </div>

                <div class="disciplina-select">
                    <label for="disciplina">Disciplina:</label>
                    <select name="disciplina" id="disciplina">
                        <option value="">Selecione uma disciplina existente</option>
                        @foreach ($disciplinas as $disciplina)
                            <option value="{{ $disciplina->id }}" {{ $prova->disciplina_id == $disciplina->id ? 'selected' : '' }}>{{ $disciplina->nome }}</option>
                        @endforeach
                    </select>
                    <label for="nova_disciplina">Ou, crie uma nova disciplina:</label>
                    <input type="text" name="nova_disciplina">
                </div>

                <button type="submit">Atualizar</button>
            </form>
        </div>
    </div>
</body>
</html>
