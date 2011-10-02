function buscaCotizacionAsignada() {	
	var data = $('#MonedaId').serialize();
	$.ajax({
		type: "post",		
		url: "/cake/operacions/buscaCotizacionAsignada",
		data: data,	
		dataType: "json",
		success: function(respuesta) {
			alert(respuesta.importe);
			if (respuesta.importe != "1.000") {
				$('#panelCotizacion').load(
					'elegirAccion #content',
					{style: "no_pesos"})
				.after('<label id="valorCotizacion" value=' + respuesta.importe + '>'+ respuesta.importe +'</label>' + '<input id="cotizacion_id" name=data[Efectivo][cotizacion_id] type="hidden" value='+ respuesta.id + '>');
			} else {
				alert(respuesta.id);
				alert(respuesta.id);
				$('#panelCotizacion').load(
					'elegirAccion #content',
					{style: "pesos"})
				.after('<input id="cotizacion_id" name=data[Efectivo][cotizacion_id] type="hidden" value='+ respuesta.id + '>');
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
