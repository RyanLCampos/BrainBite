<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainBite - Criar Eventos</title>
    <link rel="stylesheet" href="{{ asset('css/tarefas/create.css') }}">
    <script>
        function openDatePicker() {
            document.getElementById('data').type = 'date';
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Criar Evento</h1>

            @if (session('success'))
                <div class="alerta-sucesso">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('eventos.store') }}" method="POST">
                @csrf

                <div class="label-float">
                    <label for="titulo">Título:</label>
                    <input type="text" name="titulo" id="titulo" required>
                </div>

                <div class="texto">
                    <label for="descricao">Descrição:</label>
                    <textarea name="descricao" id="descricao" required></textarea>
                </div>
                
                <div class="label-float">
                    <label for="local">Local:</label>
                    <input type="text" name="local" id="local" required>
                </div>
                
                <div class="data-hora">
                    <div class="label-float">
                        <label for="data">Data:</label>
                        <input type="date" name="data" id="data" min="{{ date('Y-m-d') }}" required>
                    </div>
                    
                    <div class="label-float">
                        <label for="hora">Hora:</label>
                        <input type="time" name="hora" id="hora" value="{{ old('hora') }}" required>
                    </div>
                </div>

                <button type="submit">Salvar</button>
            </form>
        </div>
    </div>
</body>
</html>