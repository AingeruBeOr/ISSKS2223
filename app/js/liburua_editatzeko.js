const expresiones = {
	data: /^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/,
	izena: /^[a-zA-ZÀ-ÿ\s\\_-]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    izenburu: /^[a-zA-ZÀ-ÿ0-9\s\\._\-\\(\\)]{1,40}$/,
	orrialde: /^[0-9]{1,4}$/,
}

document.addEventListener("DOMContentLoaded", function(){
	document.getElementById("formulario").addEventListener('submit', formularioaBalioztatu);
});

// HTML orriaren elementuak:
const izenburua=document.getElementById('izenburua');
const idazlea=document.getElementById('idazlea');
const data=document.getElementById('ArgitalpenData');
const orri=document.getElementById('OrrialdeKop');
const argitaletxe=document.getElementById('argitaletxea');
const errore_mezu=document.getElementById('erroreak');

/**
 * 
 * @param {*} evento 
 * @returns 
 */
function formularioaBalioztatu(evento){
	izenburua.style.border = "none";
	idazlea.style.border = "none";
	orri.style.border = "none";
	argitaletxe.style.border = "none";
	data.style.border = "none";

	evento.preventDefault();

	if(!expresiones.izenburu.test(izenburua.value)){
		errore_mezu.innerHTML="Liburuaren izenburua txarto dago. Bakarrik testua edo zenbakiak idatz daiteke, '-', '_', '.', '(' eta ')' siboloak ere jar daiteke.";
		izenburua.style.border = "2px solid red";
		return;
	}
	console.log("Control 1")
	if(!expresiones.izena.test(idazlea.value)){
		errore_mezu.innerHTML="Idazlea txarto dago. Bakarrik testua idatz daiteke.";
		idazlea.style.border = "2px solid red";
		return;
	}
	console.log("Control 2")
	if(!expresiones.data.test(data.value)){
		errore_mezu.innerHTML="Data txarto dago. Hurrengo formatua izan behar du: dd-mm-aaaa.";
		data.style.border = "2px solid red";
		return;
	}	
	console.log("Control 3")
	if(!expresiones.orrialde.test(orri.value)){
		errore_mezu.innerHTML="Orrialde kopurua txarto adierazita dago. 0-9999 tarteko zenbakiak bakarrik izan daitezke.";
		orri.style.border = "2px solid red";
		return;
	}
	console.log("Control 4")
    if(!expresiones.izena.test(argitaletxe.value)){
		errore_mezu.innerHTML="Argitaletxea txarto dago. Bakarrik testua idatz daiteke.";
		argitaletxe.style.border = "2px solid red";
		return;
	}
    console.log("Control 5")
	
	this.submit();

}
