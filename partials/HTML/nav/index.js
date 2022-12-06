/*const ResultAnt = document.getElementById('.ResultAnt');
const ResultAct = document.getElementById('.ResultAct');
const btnnumero = document.querySelectorAll('.numero');
const operador = document.querySelectorAll('.Operador');

const display = new Display(ResultAnt, ResultAct);

btnnumero.forEach(bot => {
	bot.addEventListener('click', () => display.AgNum(bot.innerHTML))
});

operador.forEach(bot =>{
	bot.addEventListener('click', () => display.Computar(bot.value))
});*/

const displayValorAnterior = document.getElementById('valor-anterior');
const displayValorActual = document.getElementById('valor-actual');
const botonesNumeros = document.querySelectorAll('.numero');
const botonesOperadores = document.querySelectorAll('.operador');

const display = new Display(displayValorAnterior, displayValorActual);

botonesNumeros.forEach(boton => {
    boton.addEventListener('click', () => display.agregarNumero(boton.innerHTML));
});

botonesOperadores.forEach(boton => {
    boton.addEventListener('click', () => display.computar(boton.value))
});