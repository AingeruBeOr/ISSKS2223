function editatu(ISBN){
    window.location.href = "liburua_editatzeko.php?isbn=" + ISBN;
}

function ezabatu(ISBN,izenburu,idazle){
    window.alert('Seguru zaude ' + izenburu + ' liburua ' + idazle + ' idazlearena ezabatu nahi duzula datu basetik');
}