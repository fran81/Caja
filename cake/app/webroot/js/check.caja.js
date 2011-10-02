function checkCaja() {
	var data = $('#CajaFecha').serialize();
	$.ajax({
		type: "post",		
		url: '/cake/cajas/checkCaja',
		data: data,	
		dataType: "json",
		success: function(respuesta) {
			if(respuesta.dato == 'ok') {
				$('#error').html("");
			} else {
				$('#error').html('<label>Ya hay una caja con esa fecha</label>');
				$('#endForm').html("");
			}
		}
	});
}

/*function buscaCaja() {
	var data = $('#ChequeCaja').serialize();
	$.ajax({
		type: "post",		
		url: '/cake/cajas/buscaCaja',
		data: data,	
		dataType: "json",
}*/
