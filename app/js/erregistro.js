
const expresiones = {
	nan: /^[0-9]{8}\-[A-Z]$/,
	data: /^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/,
	izena: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/,
	telefonoa: /^[0-9]{9}$/
}

	document.addEventListener("DOMContentLoaded", function(){
	document.getElementById("formulario").addEventListener('submit', formularioaBalioztatu);
});

// HTML orriaren elementuak:
const izena=document.getElementById('Izena');
const nan=document.getElementById('NAN');
const telefonoa=document.getElementById('Telefonoa');
const email=document.getElementById('email');
const p1=document.getElementById('Pasahitza');
const p2=document.getElementById('Konfirmazioa');
const data=document.getElementById('Jaiotze_data');
const errore_mezu=document.getElementById('erroreak');

/**
 * 
 * @param {*} evento 
 * @returns 
 */
function formularioaBalioztatu(evento){
	nan.style.border = "none";
	izena.style.border = "none";
	telefonoa.style.border = "none";
	email.style.border = "none";
	p1.style.border = "none";
	p2.style.border = "none";
	data.style.border = "none";

	evento.preventDefault();

	if(!expresiones.izena.test(izena.value)){
		errore_mezu.innerHTML="Izena Abizenak txarto daude. Bakarrik testua idatz daiteke";
		izena.style.border = "2px solid red";
		return;
	}
	console.log("Control 0")
	if(nanBalioztatu(nan.value)==1){
		errore_mezu.innerHTML="NAN-aren formatua txarto dago. Hurrengo formatua izan behar du: 11111111-Z eta hizkia ondo egon behar du";
		nan.style.border = "2px solid red";
		return;
	}
	console.log("Control 1")
	if(!expresiones.telefonoa.test(telefonoa.value)){
		errore_mezu.innerHTML="Telefonoa txarto dago. 9 zenbaki bakarrik adieraz ditzakezu";
		telefonoa.style.border = "2px solid red";
		return;
	}
	console.log("Control 2")
	if(!expresiones.data.test(data.value)){
		errore_mezu.innerHTML="Data txarto dago. Hurrengo formatua izan behar du: dd-mm-aaaa";
		data.style.border = "2px solid red";
		return;
	}	
	console.log("Control 3")
	if(!expresiones.email.test(email.value)){
		errore_mezu.innerHTML="Emaila txarto dago, hurrengo formatua izan behar du: adibidea@zerbitzari.extensioa";
		email.style.border = "2px solid red";
		return;
	}
	console.log("Control 4")
	if(p1.value!=p2.value){
		errore_mezu.innerHTML="Pasahitzek ez dute bat egiten.";
		p1.style.border = "2px solid red";
		p2.style.border = "2px solid red";
		return;
	}
	console.log("Control 5")
	this.submit();

}

function nanBalioztatu(dni) {
	var zenb
	var h
	var hizki
  
	if(expresiones.nan.test(dni)){
		zenb = dni.substr(0,dni.length-2);
		h = dni.substr(dni.length-1,1);
		zenb = zenb % 23;
	
		hizki='TRWAGMYFPDXBNJZSQVHLCKET';
		hizki=hizki.substring(zenb,zenb+1);
		if (hizki!=h.toUpperCase()) {
			return 1;
		}else{
			return 0;
		}
	}else{
		return 1;
	}
  }