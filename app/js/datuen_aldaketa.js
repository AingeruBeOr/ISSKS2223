
const expresiones = {
	nan: /^[0-9]{8}\-[A-Z]$/,
	data: /^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/,
	izena: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/,
	telefonoa: /^[0-9]{9}$/,
	pasahitza: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/
}

document.addEventListener("DOMContentLoaded", function(){
	document.getElementById("formulario").addEventListener('submit', formularioaBalioztatu);
});

// HTML orriaren elementuak:
const izena=document.getElementById('Izena');
const nan=document.getElementById('NAN');
const telefonoa=document.getElementById('Telefonoa');
const email=document.getElementById('email');
const p1=document.getElementById('pasahitza');
const p2=document.getElementById('pasahitza2');
const data=document.getElementById('Jaiotze_data');
const errore_mezu=document.getElementById('erroreak');
const zure_pasahitza = document.getElementById('zurepasahitza');

/**
 * 
 * @param {*} evento 
 * @returns 
 */
function formularioaBalioztatu(evento){	
	izena.style.border = "none";
	telefonoa.style.border = "none";
	email.style.border = "none";
	p1.style.border = "none";
	p2.style.border = "none";
	data.style.border = "none";
	nan.style.border = "none";
	zure_pasahitza.style.border = "none";

	evento.preventDefault();
	if(nanBalioztatu(nan.value)==1){
		errore_mezu.innerHTML="NAN-aren formatua txarto dago. Hurrengo formatua izan behar du: 11111111-Z eta hizkia zuzena izan behar da.";
		nan.style.border = "2px solid red";
		return;
	}
	console.log("Control 0")
	if(!expresiones.izena.test(izena.value)){
		errore_mezu.innerHTML="Izena Abizenak txarto dago. Bakarrik testua idatz daiteke.";
		izena.style.border = "2px solid red";
		return;
	}
	console.log("Control 1")
	if(!expresiones.telefonoa.test(telefonoa.value)){
		errore_mezu.innerHTML="Telefonoa txarto dago. 9 zenbaki bakarrik adieraz ditzakezu.";
		telefonoa.style.border = "2px solid red";
		return;
	}
	console.log("Control 2")
	if(!expresiones.data.test(data.value)){
		errore_mezu.innerHTML="Data txarto dago. Hurrengo formatua izan behar du: dd-mm-aaaa.";
		data.style.border = "2px solid red";
		return;
	}	
	console.log("Control 3")
	if(!expresiones.email.test(email.value)){
		errore_mezu.innerHTML="Email txarto dago.";
		email.style.border = "2px solid red";
		return;
	}
	console.log("Control 4")
	
    if(p1.value!=null || p2.value!=null){
        if(p1.value!=p2.value){
            errore_mezu.innerHTML="Pasahitzek ez dute bat egiten.";
            p1.style.border = "2px solid red";
            p2.style.border = "2px solid red";
            return;
        }
		if(!expresiones.pasahitza.test(p1.value)){
			errore_mezu.innerHTML="Pasahitza 8-15 karaktere izan behar ditu, letra larri, zenbaki eta karaktere berezi (@, $, !, &...) bana izan behar ditu (hutsunik gabe).";
			p1.style.border = "2px solid red";
			p2.style.border = "2px solid red";
			return;
		}
    }
	console.log("Control 5")
	console.log(zure_pasahitza.value);
	if(zure_pasahitza.value == ""){
		zure_pasahitza.style.border = "2px solid red";
		errore_mezu.innerHTML = "Zure pasahitza sartu datuak aldatzeko.";
		return;
	}
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