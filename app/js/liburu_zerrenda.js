function editatu(ISBN){
    window.location.href = "liburua_editatzeko.php?isbn=" + ISBN;
}

function ezabatu(ISBN,izenburu,idazle){
    var res = window.confirm('Seguru zaude ' + izenburu + ' liburua ' + idazle + ' idazlearena ezabatu nahi duzula datu basetik?');
    if(res) window.location.href = "../../liburua_ezabatu.php?isbn=" + ISBN;
    else console.log("Ez");
}