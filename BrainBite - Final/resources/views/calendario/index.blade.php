<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainBite - Calendário</title>
    <link rel="stylesheet" href="{{ asset('css/calendario/index.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
</head>
<body>
    <div class="menu">
        <a href="{{ route('home.index') }}" class="logo">BRAINBITE</a>

        <nav>
            <ul>
                <li>
                    <a href="{{ route('home.index') }}">Início</a>
                    <a href="{{ route('tarefas.index') }}">Tarefas</a>
                    <a href="{{ route('provas.index') }}">Provas</a>
                    <a href="{{ route('calendario.index') }}" class="active">Calendário</a>
                    <a href="{{ route('anotacoes.index') }}">Anotações</a>
                    <a href="{{ route('eventos.index') }}">Eventos</a>
                    <a href="{{ route('logout') }}">Sair</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <h1 class="data-atual-fora"></h1>
        <div class="wrapper">
            <header>
                <p class="data-atual">Junho 2023</p>
                <div class="icons">
                    <span id="anterior" class="material-symbols-rounded">chevron_left</span>
                    <span id="posterior" class="material-symbols-rounded">chevron_right</span>
                </div>
            </header>
            <div class="calendario">
                <ul class="semanas">
                    <li>Dom</li>
                    <li>Seg</li>
                    <li>Ter</li>
                    <li>Qua</li>
                    <li>Qui</li>
                    <li>Sex</li>
                    <li>Sab</li>
                </ul>
                <ul class="dias"></ul>
    
            </div>
        </div>
    </div>
    <script>
        const dataAtual = document.querySelector(".data-atual"),
        dataAtualFora = document.querySelector(".data-atual-fora"),
        dias = document.querySelector(".dias"),
        proxIcon = document.querySelectorAll(".icons span");

        let date = new Date(),
        anoAtual = date.getFullYear(),
        mesAtual = date.getMonth();

        let date2 = new Date(),
        anoAtualH = date.getFullYear(),
        mesAtualH = date.getMonth();

        const mes = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto",
                    "Setembro", "Outubro", "Novembro", "Dezembro"];

        const rendCalendario = () => {
            let primeiroDiaMes = new Date(anoAtual, mesAtual , 1).getDay(), // Primeiro dia do mês
            ultimaDataMes = new Date(anoAtual, mesAtual + 1, 0).getDate(), // Ultima data do mês
            ultimoDiaMes = new Date(anoAtual, mesAtual , ultimaDataMes).getDay(), // Ultimo dia do mês
            ultimaDataMesAnterior = new Date(anoAtual, mesAtual , 0).getDate(); // Ultima data do mês anterior
            let li = "";

            for(let i = primeiroDiaMes; i > 0; i--){ //criando o li dos ultimos dias do mes anterior
                li += `<li class="inativo">${ultimaDataMesAnterior - i + 1}</li>`;
            }

            for(let i = 1; i <= ultimaDataMes; i++){ //criando li dos dias do mês atual
                // Adicionando marcação do dia atual
                let hoje = i === date.getDate() && mesAtual === new Date().getMonth()
                           && anoAtual === new Date().getFullYear() ? "ativo" : "";
                li += `<li class="${hoje}">${i}</li>`;
            }

            for(let i = ultimoDiaMes; i < 6; i++){ //criando li do primeiros dias do mês posterior
                li += `<li class="inativo">${i - ultimoDiaMes + 1}</li>`;
            }


            dataAtual.innerText = `${mes[mesAtual]} ${anoAtual}`;
            dataAtualFora.innerText = `${mes[mesAtualH]} ${anoAtualH }`;
            dias.innerHTML = li;
        }

        document.addEventListener("DOMContentLoaded", () => {
                    rendCalendario();
        });

        

        proxIcon.forEach(icon => {
            icon.addEventListener("click", () => {
                mesAtual = icon.id === "anterior" ? mesAtual - 1 : mesAtual + 1;

                if(mesAtual < 0 || mesAtual > 11) {
                    date = new Date(anoAtual, mesAtual);
                    anoAtual = date.getFullYear(); //Atualizando o ano atual
                    mesAtual = date.getMonth(); //Atualizando o mês atual
                } else { //senão passa a nova data como valor de data
                    date = new Date();
                }
                rendCalendario();
            });
        });


    </script>
</body>
</html>
