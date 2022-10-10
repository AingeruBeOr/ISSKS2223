
//https://desarrolloweb.com/articulos/1767.php

document.addEventListener("DOMContentLoaded", function(){
	document.getElementById("formulario").addEventListener('submit', formularioaBalioztatu);
});

function formularioaBalioztatu(evento){
	evento.preventDefault();
	var nan = document.getElementById('NAN').value;
	if(nanBalioztatu(nan)==1){
		alert('nan');
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
	zenb = numero % 23;

	hizki='TRWAGMYFPDXBNJZSQVHLCKET';
	hizki=hizki.substring(zenb,zenb+1);
	if (hizki!=h.toUpperCase()) {
		return 1;
	}else{
		return 0;
	}
  }