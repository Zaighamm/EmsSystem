function tryLogin() {

var user = document.getElementById("auser").value;
var pword = document.getElementById("apass").value;

var xmlhttp = null;
if (window.XMLHttpRequest)
xmlhttp = new XMLHttpRequest(); 
else 
xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');

xmlhttp.onreadystatechange=function(){

if(xmlhttp.readyState== 4){
if(xmlhttp.status==200)
{
var res= xmlhttp.responseText;

if(res != "True") {


document.getElementById('flag').innerHTML=xmlhttp.responseText;

setTimeout(function(){document.getElementById('flag').innerHTML=" ";},2000);}
else{


window.location.href= "index.php?page=cpanel&name="+user;   
}
}
}
}

xmlhttp.open('get','./views/login.php?auser='+user+'&apass='+pword,true);
xmlhttp.send();


}