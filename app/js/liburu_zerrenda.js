function editatu(ISBN){
    window.location.href = "liburua_editatzeko.php?isbn=" + ISBN;
}

function ezabatu(ISBN){
    //var res = window.confirm('Seguru zaude ' + izenburu + ' liburua ' + idazle + ' idazlearena ezabatu nahi duzula datu basetik?');
    var res = window.confirm('Seguru zaude liburua ezabatu nahi duzula datu basetik?');
    if(res) window.location.href = "../../config_php/liburua_ezabatu.php?isbn=" + ISBN;
    else console.log("Ez");
}