<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainBite - Criar Tarefa</title>
    <link rel="stylesheet" href="{{ asset('css/tarefas/create.css') }}">
</head>
<body>
    <div class="container">
        <div class = "card">

            <h1>Criar Tarefa</h1>
    
            <form action="{{ route('tarefas.store') }}" method="POST">
                @csrf

                <div class="label-float">
                    <label for="titulo">Título:</label>
                    <input type="text" name="titulo" required><br>
                </div>

                <div class="texto">
                    <label for="descricao">Descrição:</label>
                    <textarea name="descricao" type="text" required></textarea><br>
                </div>
                <div class="select-estiloso">
                    <label for="status">Status:</label>
                    <select name="status" required>
                        <option value="concluido">Concluído</option>
                        <option value="nao_concluido">Não Concluído</option>
                        <option value="em_andamento">Em Andamento</option>
                        <option value="para_fazer">Para Fazer</option>
                    </select><br>
                </div>

                <div class="label-float">
                    <label for="data_entrega">Data de Entrega:</label>
                    <input type="date" name="data_entrega" id="data_entrega" min="{{ date('Y-m-d') }}"><br>
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