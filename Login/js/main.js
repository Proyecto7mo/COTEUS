const form = document.getElementById('form');
const inputs = document.querySelectorAll('#formulario input');
const sbmbtn = document.getElementById("submit");
var alerts = document.querySelector('.alert');

inputs.forEach((input) => {
	input.addEventListener('keyup', validate);
	input.addEventListener('blur', validate);
});

form.addEventListener('submit', (e) => {
	e.preventDefault();
    
	if(campos.nameuser && campos.password){
		form.reset();
	}
});

var inputpsw = document.getElementById('Ipsw');
var check = document.getElementById("password_view");
var aux = true;
function HideShow(){
	if(aux == true){
		Ipsw.type = "text";
		aux = false;
	}
	else{
		Ipsw.type = "password";
		aux = true;
	}
}