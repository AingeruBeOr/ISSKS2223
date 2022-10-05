const formulario = document.getElementById('formulario');
const inputs= document.querySelectorAll('#formulario input')
const expresiones = {
	nan: /^\d{8}[a-zA-Z]$/, // Letras, numeros, guion y guion_bajo
	izena: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	pasahitza: /^[a-zA-Z0-9]{4,40}$/, // 4 a 40 digitos.
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefonoa: /^\d{7,14}$/ // 7 a 14 numeros.
}
const campos = {

	nan: false,
	izena: false,
	pasahitza: false,
	pasahitza2: false,
	email: false,
	telefonoa: false,
	jaiotzedata: false
	
}
const validarFormulario = (e) => {
	switch (e.target.name){
		case "izena":
			validarCampo(expresiones.izena, e.target, 'izena');
		break;
		case "nan":
			nan(e.target);
		break;
		case "telefonoa":
			validarCampo(expresiones.telefonoa, e.target, 'telefonoa');
		break;
		case "jaiotzedata":
			validarCampo(expresiones.jaiotzedata, e.target, 'jaiotzedata');
		break;
		case "email":
			validarCampo(expresiones.email, e.target, 'email');
		break;
		case "pasahitza":
			validarCampo(expresiones.pasahitza, e.target, 'pasahitza');
			aztertuPasahitza2();
		break;
		case "pasahitza2":
			aztertuPasahitza2();
		break;
	}
}
const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}


const = aztertuPasahitza2() = () => {
	const inputPass1= document.getElementById('pasahitza');
	const inputPass2= document.getElementById('pasahitza2');
	

	if(inputPass1.value !== inputPass2.value){
		document.getElementById(`grupo__pasahitza2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__pasahitza2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__pasahitza2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__pasahitza2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__pasahitza2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['password'] = false;
	} else {
		document.getElementById(`grupo__pasahitza2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__pasahitza2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__pasahitza2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__pasahitza2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__pasahitza2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['password'] = true;
	}
}

function nan(dni) {
  var zenb
  var h
  var hizki

  if(campos.nan.test (dni) == true){
     zenb = dni.substr(0,dni.length-1);
     h = dni.substr(dni.length-1,1);
     zenb = numero % 23;
     hizki='TRWAGMYFPDXBNJZSQVHLCKET';
     hizki=hizki.substring(zenb,zenb+1);
    if (hizki!=h.toUpperCase()) {
       alert('NAN ez zuzena, hizkia gaizki');
     }else{
       alert('NAN zuzena');
     }
  }else{
     alert('NAN okerra');
   }
}
/*----------------------------------------OTROS-------------------------------------*/
inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
	e.preventDefault();
	if(campos.izena && campos.nan && campos.telefonoa && campos.jaiotzedata && campos.email && campos.pasahitza && campos.pasahitza2){
		formulario.reset();

		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 5000);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});
	} else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}
});
