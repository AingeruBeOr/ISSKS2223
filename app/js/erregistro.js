const formulario = document.getElementById('formulario');
const inputs= document.querySelectorAll('#formulario input')
const expresiones = {
	nan: /^[a-zA-Z0-9\_\-]{10}$/, // Letras, numeros, guion y guion_bajo
	izena: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	pasahitza: /^[a-zA-Z0-9]{4,40}$/, // 4 a 12 digitos.
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefonoa: /^\d{7,14}$/ // 7 a 14 numeros.
}
const validarFormulario = (e) => {
	switch (e.target.name){
		case "izena":
			if(expresiones.izena.test(e.target.value)){
				
			}else{
				document.getElementById('grupo__usuario').classLis
			}
		break;
		case "nan":
			
		break;
		case "telefonoa":
			
		break;
		case "jaiotzedata":
			
		break;
		case "email":
			
		break;
		case "pasahitza":
			
		break;
		case "pasahitza2":
			
		break;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
	e.preventDefault();
});
