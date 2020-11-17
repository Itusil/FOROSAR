$(document).ready(function(){
  $("#botonEnvio").click(function(){
	let myForm = document.getElementById('fquestion');
	let formData = new FormData(myForm);
	$.ajax({
			url: 'AddTemas.php',
			type: 'POST',
			dataType: "html",
			data: formData,
			contentType: false,
			processData: false,
			success:function(datos){
				$('#respuestaAnadir').fadeIn().html(datos);},
			cache : false,
			error:function(){
				$('#respuestaAnadir').fadeIn().html('<p class="error"><strong>El servidor parece que no responde</p>');
	}});
  });
});