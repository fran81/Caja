$(function() {
	$('#MonedaId').live('change',function(event){
		var data = $('#MonedaId').serialize();
		alert(data);
		$.ajax({
			type: "post",		
			url: '/cake/operacions/buscaCotizacion',
			data: data,	
			dataType: "json",
			success: function(respuesta) {
				if (respuesta.importe != "1.000") {
					$('#panelCotizacion').load(
						'/cake/operacions/elegirAccion #content',
						{style: "no_pesos"})
					.after($('#labelCotizacion').html('<input id="valorCotizacion" type="hidden" value='+ respuesta.importe +'>' + '<input id="cotizacion_id" name=data[Efectivo][cotizacion_id] type="hidden" value='+ respuesta.id + '>'));
				} else {
					$('#panelCotizacion').load(
						'/cake/operacions/elegirAccion #content',
						{style: "pesos"})
					.after($('#labelCotizacion').html('<input id="cotizacion_id" name=data[Efectivo][cotizacion_id] type="hidden" value='+ respuesta.id +'>'));
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert('no hubo exito');
				alert(xhr.status);
				alert(thrownError);
			}
		});
	});  
	return false;
});

  
