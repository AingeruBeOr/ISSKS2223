
//https://desarrolloweb.com/articulos/1767.php

document.addEventListener("DOMContentLoaded", function(){
	document.getElementById("formulario").addEventListener('submit', formularioaBalioztatu);
});

const expresiones = {
	izena: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefonoa: /^[0-9]{1,9}$/
}

function formularioaBalioztatu(evento){
	evento.preventDefault();
	var nan = document.getElementById('NAN').value;
	if(nanBalioztatu(nan)==1){
		document.getElementById("erroreak").innerHTML="NAN txarto";
		return;
	}
	var iz = document.getElementById('Izena').value;
	if(!expresiones.izena.test(iz.value)){
		document.getElementById("erroreak").innerHTML="Izena txarto";
		return;
	}
	var tel = document.getElementById('Telefonoa').value;
	if(!expresiones.telefonoa.test(tel.value)){
		document.getElementById("erroreak").innerHTML="Telefonoa txarto";
		return;
	}
	var ema = document.getElementById('email').value;
	if(!expresiones.email.test(ema.value)){
		document.getElementById("erroreak").innerHTML="email txarto";
		return;
	}
	var p1=document.getElementById('Pasahitza').value;
	var p2=document.getElementById('Konfirmazioa').value;
	if(p1!=p2){
		document.getElementById("erroreak").innerHTML="Pasahitza txarto";
		return;
	}

}

function nanBalioztatu(dni) {
	var zenb
	var h
	var hizki
	var marra
  
	zenb = dni.substr(0,dni.length-2);
	h = dni.substr(dni.length-1,1);
	marra= dni.substr(dni.length-2, dni.length-1);
	zenb = zenb % 23;

	hizki='TRWAGMYFPDXBNJZSQVHLCKET';
	hizki=hizki.substring(zenb,zenb+1);
	if (hizki!=h.toUpperCase()) {
		return 1;
	}else{
		return 0;
	}
  }