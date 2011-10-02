function totalizarOperacion() {
	var datos = $('#id').val();
	$('#totalOperacion').load(
		'/cake/operacions/totalOperacion #content',
		{dato:datos}
	);
}

function crearVuelto() {
	var responsable = $('#OperacionResponsableId').val();
	var usuario = $('#OperacionUserId').val();
	var caja = $('#OperacionCajaId').val();
	var operacion = $('#id').val();
	var importe = $('#Saldo').val();
	var cotizacion = $('#Cotizacion').val();
	data = '_method=POST&data%5BFlujo%5D%5Boperacion_id%5D='+operacion+'&data%5BOperacion%5D%5BAccion%5D=Efectivo&data%5BEfectivo%5D%5Bcotizacion_id%5D='+cotizacion+'&data%5BEfectivo%5D%5Bimporte%5D='+importe+'&data%5BFlujo%5D%5Btipo%5D=S';
	$.ajax({
		type: "post",
		url: '/cake/operacions/guardarEfectivo',
		data: data,
		success : function(respuesta) {
			totalizarOperacion();
			$('#panelAccion').html("");
			$('#OperacionAccion').val("");
		}
	});
}

function totalizarCanje() {
	var datos = $('#id').val();
	$('#totalFlujos').load(
		'/cake/operacions/totalFlujos #content',
		{dato:datos}
	);
}

