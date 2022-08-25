const ResultAnt = document.getElementById('.ResultAnt');
const ResultAct = document.getElementById('.ResultAct');
const numero = document.getElementByAll('.numero');
const operador = document.getElementByAll('.Operador');

const display = new Display(ResultAnt, ResultAct);

numero.forEach(boton => {
	boton.addEventListener('click', () => display.AgNum(boton.innerHTML))
});

operador.forEach(boton =>{
	boton.addEventListener('click', () => display.Computar(boton.value))
});


class Display{

	constructor(ResultAnt,ResultAct){
		this.ResultAnt = ResultAnt;
		this.ResultAct = ResultAct;
		this.calculador = new Calculos();
		this.operacion = undefined;
		this.valorAnt = '';
		this.valorAct = '';
		this.signos = {
			sumar: '+',
			restar: '─',
			multiplicar: 'X',
			ddividir: '÷',
		}
	}

	DEL(){
		this.valAct = this.valAct.toString().slice(0,-1);
		this.Imprimir();
	}

	AC(){
		this.valAct = '';
		this.valAnt = '';
		this.operacion = undefined;
		this.Imprimir();
	}

	Computar(tipo){
		this.operacion !== 'igual' && this.Calcular();
		this.tipo = tipo;
		this.valAnt = this.valAct || valAnt;
		this.valAct = '';
		this.Imprimir();
	}

	AgNum(){
		if(numero =='.' && this.valAct.includes('.'))
			return this.valAct = this.valAct() + numero.toString();
		this.Imprimir();
	}

	Imprimir(){
		this.ResultAct = this.valAct;
		this.ResultAnt = `${this.valAnt;} ${this.signos[this.tiempo]}`;
	}

	Calcular(){
		const valAnt = parseFloat(this.valAnt);
		const valAct = parseFloat(this.valAct);

		if(isNaN(valAct) || isNaN(valAnt))
			return this.valAct = this.calculador[this.operacion](valAnt,valAct);
	}
}