

/*class Display{

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
		if(numero ==='.' && this.valAct.includes('.')) 
			return this.valAct = this.valAct.toString() + numero.toString();
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
}*/

class Display {
    constructor(displayValorAnterior, displayValorActual) {
        this.displayValorActual = displayValorActual;
        this.displayValorAnterior = displayValorAnterior;
        this.calculador = new Calculadora();
        this.tipoOperacion = undefined;
        this.valorActual = '';
        this.valorAnterior = '';
        this.signos = {
            sumar: '+',
            dividir: '%',
            multiplicar: 'x',
            restar: '-', 
        }
    }

    borrar() {
        this.valorActual = this.valorActual.toString().slice(0,-1);
        this.imprimirValores();
    }

    borrarTodo() {
        this.valorActual = '';
        this.valorAnterior = '';
        this.tipoOperacion = undefined;
        this.imprimirValores();
    }

    computar(tipo) {
        this.tipoOperacion !== 'igual' && this.calcular();
        this.tipoOperacion = tipo;
        this.valorAnterior = this.valorActual || this.valorAnterior;
        this.valorActual = '';
        this.imprimirValores();
    }

    agregarNumero(numero) {
		numero=numero.replace("<span>","");
		numero=numero.replace("</span>","");
        if(numero === '.' && this.valorActual.includes('.')) return
        this.valorActual = this.valorActual.toString() + numero.toString();
        this.imprimirValores();
    }

    imprimirValores() {
        this.displayValorActual.textContent = this.valorActual;
        this.displayValorAnterior.textContent = `${this.valorAnterior} ${this.signos[this.tipoOperacion] || ''}`;
    }

    calcular() {
        const valorAnterior = parseFloat(this.valorAnterior);
        const valorActual = parseFloat(this.valorActual);

        if( isNaN(valorActual)  || isNaN(valorAnterior) ) return
        this.valorActual = this.calculador[this.tipoOperacion](valorAnterior, valorActual);
    }
}