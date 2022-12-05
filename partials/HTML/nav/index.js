const ResultAnt = document.getElementById('.ResultAnt');
const ResultAct = document.getElementById('.ResultAct');
const btnnumero = document.querySelectorAll('.numero');
const operador = document.querySelectorAll('.Operador');

const display = new Display(ResultAnt, ResultAct);

btnnumero.forEach(boton => {
	boton.addEventListener('click', () => display.AgNum(boton.innerHTML))
});

operador.forEach(boton =>{
	boton.addEventListener('click', () => display.Computar(boton.value))
});