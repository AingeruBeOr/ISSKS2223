//https://desarrolloweb.com/articulos/1767.php

const expresiones = {
	nan: /[0-9]{8}\-[A-Z]/,
	izena: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/,
	telefonoa: /^[0-9]{9}$/
}

const texto_error="Erroreren bat dago sartutako datuetan. Hurrengo formatua erabili behar da: · Izen Abizenak: Testua soilik · NAN: 12345678-X · Telefonoa: 9 digitu";

document.addEventListener("DOMContentLoaded", function(){
	document.getElementById("formulario").addEventListener('submit', formularioaBalioztatu);
});

const izena=document.getElementById('Izena');
const nan=document.getElementById('NAN');
const telefonoa=document.getElementById('Telefonoa');
const email=document.getElementById('email');
const p1=document.getElementById('Pasahitza');
const p2=document.getElementById('Konfirmazioa');

function formularioaBalioztatu(evento){
	evento.preventDefault();

	if(nanBalioztatu(nan.value)==1){
		document.getElementById("erroreak").innerHTML="NAN txarto";
		return;
	}
	console.log("Control 1")
	if(!expresiones.izena.test(izena.value)){
		document.getElementById("erroreak").innerHTML="Izena txarto";
		return;
	}
	console.log("Control 2")
	if(!expresiones.telefonoa.test(telefonoa.value)){
		document.getElementById("erroreak").innerHTML="Telefonoa txarto";
		return;
	}
	console.log("Control 3")
	if(!expresiones.email.test(email.value)){
		document.getElementById("erroreak").innerHTML="email txarto";
		return;
	}
	console.log("Control 4")
	if(p1.value!=p2.value){
		document.getElementById("erroreak").innerHTML="Pasahitza txarto";
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