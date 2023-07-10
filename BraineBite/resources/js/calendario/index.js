const dataAtual = document.querySelector(".data-atual");

let date = new Date(),
anoAtual = date.getFullYear(),
mesAtual = date.getMonth();

const mes = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto",
             "Setembro", "Outubro", "Novembro", "Dezembro"];

const rendCalendario = () => {
    dataAtual.innerText = `${mes[mesAtual]} ${anoAtual}`;
}

rendCalendario();