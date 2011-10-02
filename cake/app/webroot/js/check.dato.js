function checkDato() {
	var data = ($("#OperacionCargar2Form").serialize())?$("#OperacionCargar2Form").serialize():$("#OperacionEditarForm").serialize();
	var accion;
	if ($('#Accion').val() != null) {
		accion = $('#Accion').val();
	} else {
		accion = ($('#Canje').val()).substring(5);
	}
	$.ajax({
		type: "post",		
		url: '/cake/operacions/check'+accion,
		data: data,	
		dataType: "json",
		success: function(respuesta) {
			if (respuesta.dato == "ok") {
				$('#Guardar').removeAttr('disabled');
			} else {
				alert("El dato ya ha sido cargado");
				$('#Guardar').attr('disabled',true);
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert('no hubo exito');
			alert(xhr.status);
			alert(thrownError);
		}
	});
	return false;
}


