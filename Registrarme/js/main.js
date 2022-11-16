const form = document.getElementById('form');
const inputs = document.querySelectorAll('.slot');

const inputpsw = document.getElementById('psw');
const confirmpsw = document.getElementById('cfmpsw');

const RegularExpressions = {
	nameuser: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	name: /^[a-zA-ZÀ-ÿ\s]/, // Letras y espacios, pueden llevar acentos.
	surname: /^[a-zA-ZÀ-ÿ\s]/, // Letras y espacios, pueden llevar acentos.
	password: /^.{8,12}$/, // 8 a 12 digitos.
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telephone: /^\d{7,14}$/, // 7 a 14 numeros.
	birthdate: /[0-12]+[0-31]+[1900-2010]$/, // Validando fecha completa 
	cuil: /^[0-9\_\-]/
}

const Slots = {
	nameuser: false,
	name: false,
	surname: false,
	password: false,
	email: false,
	telephone: false,
	birthdate: false,
	cuil: false
}

const validateForm = (e) => {
	switch (e.target.name) {
		case "nameuser":
			validateSlot(RegularExpressions.nameuser, e.target, 'nameuser');
		break;
		case "name":
			validateSlot(RegularExpressions.name, e.target, 'name');
		break;
		case "surname":
			validateSlot(RegularExpressions.surname, e.target, 'surname');
		break;
		case "password":
			validateSlot(RegularExpressions.password, e.target, 'password');
			confirmPassword();
		break;
		case "confirm_password":
			confirmPassword();
		break;
		case "email":
			validateSlot(RegularExpressions.email, e.target, 'email');
		break;
		case "telephone":
			validateSlot(RegularExpressions.telephone, e.target, 'telephone');
		break;
		case "birthdate":
			validateSlot(RegularExpressions.birthdate, e.target, 'birthdate');
		break;
		case "cuil":
			validateSlot(RegularExpressions.cuil, e.target, 'cuil');
		break;
	}
}

const validateSlot = (expression, input, slot) => {
	if(expression.test(input.value)){
		document.getElementById(`${slot}_slot_alert`).style.display = "block";
		document.getElementById(`${slot}_slot_alert`).style.display = "none";
		Slots[slot] = true;
	} else {
		document.getElementById(`${slot}_slot_alert`).style.display = "none";
		document.getElementById(`${slot}_slot_alert`).style.display = "block";
		Slots[slot] = false;
	}
}

confirmPassword = () => {
	if(inputpsw.value == confirmpsw.value){
		document.getElementById(`confirm_password_slot_alert`).style.display = "block";
		document.getElementById(`confirm_password_slot_alert`).style.display = "none";
		Slots['password'] = false;
	} else {
		document.getElementById(`confirm_password_slot_alert`).style.display = "none";
		document.getElementById(`confirm_password_slot_alert`).style.display = "block";
		Slots['password'] = true;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validateForm);
	input.addEventListener('blur', validateForm);
});

form.addEventListener('submit', (e) => {
	e.preventDefault();

	//Servirá más adelante
	//const conditions = document.getElementById('conditions');
	//if(Slots.nameuser && Slots.name && Slots.password && Slots.email && Slots.telephone && terminos.checked ){
	//	form.reset();
//
	//	document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
	//	setTimeout(() => {
	//		document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
	//	}, 5000);
//
	//	document.querySelectorAll('.alerts').forEach((icono) => {
	//		icono.classList.remove('alerts');
	//	});
	//  }
	//  else {
	//	document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	//}
});

var check = document.getElementById("password_view");
var aux = true;
function HideShow(){
	if(aux == true){
		inputpsw.type = "text";
		confirmpsw.type= "text";
		aux = false;
	}
	else{
		inputpsw.type = "password";
		confirmpsw.type= "password";
		aux = true;
	}
}