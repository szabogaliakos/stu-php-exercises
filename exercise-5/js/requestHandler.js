window.onload = function (){
    getMooncake(document.getElementById("mooncakes").value);
}

function getMooncake(flavor) {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            document.getElementById("info").innerHTML=this.responseText;
        }
    }
    xmlhttp.open("GET","php/Controller.php?flavor="+flavor,true);
    xmlhttp.send();
}