function insertar(){
	//OJO!!! ESTA MAL, LA PRIMERA VEZ NO FUNCIONA!!!!
	var campo = document.getElementById("campo");
	var actual= campo.style.display;
	if (actual == "none"){
		campo.style.display="block";
	}else{
		campo.style.display="none";
	}
}