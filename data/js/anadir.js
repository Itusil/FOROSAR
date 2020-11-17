xmlhttp = new XMLHttpRequest();
var nombre;
xmlhttp.onreadystatechange = function(){
if (xmlhttp.readyState==4 && xmlhttp.status==200)
	//No funciona esto arreglar pa que se cambie
{
	document.getElementById(nombre).innerHTML=xmlhttp.responseText; }
}

function subirval(id, id_com){
	nombre="com"+id+id_com;
	xmlhttp.open("GET","../php/UpdateValorationUP.php?id="+id+"&idcom="+id_com,true);
	xmlhttp.send();
}