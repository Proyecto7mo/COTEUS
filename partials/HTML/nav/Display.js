

class Display{

	constructor(ResultAnt,ResultAct){
		this.ResultAnt = ResultAnt;
		this.ResultAct = ResultAct;
		this.calculador = new Calculos();
		this.operacion = undefined;
		this.valAnt = '';
		this.valAct = '';
		this.signos = {
			sumar: '+',
			restar: '─',
			multiplicar: 'X',
			dividir: '÷',
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
		this.operacion = tipo;
		this.valAnt = this.valAct || this.valAnt;
		this.valAct = '';
		this.Imprimir();
	}

	AgNum(numero){
		if(numero ==='.' && this.valAct.includes('.')) return
		this.valAct = this.valAct.toString() + numero.toString();
		this.Imprimir();
	}

	Imprimir(){
		this.ResultAct.textContent = this.valAct;
		this.ResultAnt.textContent = `${this.valAnt} ${this.signos[this.operacion] || ''}`;
	}

	Calcular(){
		const valAnt = parseFloat(this.valAnt);
		const valAct = parseFloat(this.valAct);

		if(isNaN(valAct) || isNaN(valAnt))
			return this.valAct = this.calculador[this.operacion](valAnt,valAct);
	}
}

