//Aktibitaterik ez egotekotan 2 minutuz log-out egingo du (arratoia ez bada mugitzen):
n=5
var id = window.setInterval(() => {
    document.onmousemove= function(){
        n=5
    };
    console.log("pasa");
    n--;
    if(n <= -1){
        location.href = "../config_php/logout.php";
    }
}, 1200);