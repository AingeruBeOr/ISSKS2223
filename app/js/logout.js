//Aktibitaterik ez egotekotan 2 minutuz log-out egingo du (arratoia ez bada mugitzen):
alert("sartu");
n=5
var id = window.setInterval(() => {
    document.onmousemove= function(){
        n=5
        alert("mugi");
    };
    n--;
    if(n <= -1){
        alert("out");
        location.href = "../config_php/logout.php";
    }
}, 1200);
