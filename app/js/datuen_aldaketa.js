const expresiones = {
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
const telefonoa=document.getElementById('Telefonoa');
const email=document.getElementById('email');
const p1=document.getElementById('pasahitza');
const p2=document.getElementById('pasahitza2');
const data=document.getElementById('Jaiotze_data');
const errore_mezu=document.getElementById('erroreak');

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

	evento.preventDefault();

	if(!expresiones.izena.test(izena.value)){
		errore_mezu.innerHTML="Izena Abizenak txarto. Bakarrik testua idatz daiteke";
		izena.style.border = "2px solid red";
		return;
	}
	console.log("Control 1")
	if(!expresiones.telefonoa.test(telefonoa.value)){
		errore_mezu.innerHTML="Telefonoa txarto. 9 zenbaki bakarrik adieraz ditzakezu";
		telefonoa.style.border = "2px solid red";
		return;
	}
	console.log("Control 2")
	if(!expresiones.data.test(data.value)){
		errore_mezu.innerHTML="Data txarto. Hurrengo formatua izan behar du: dd-mm-aaaa";
		data.style.border = "2px solid red";
		return;
	}	
	console.log("Control 3")
	if(!expresiones.email.test(email.value)){
		errore_mezu.innerHTML="email txarto";
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
    }
	console.log("Control 5")
	this.submit();

}