$(function() {
	$('#importe_moneda').live('blur',function() {
		var cotizacion = parseFloat($('#valorCotizacion').attr('value'));
		var ajuste = $('#EfectivoAjusteCotizacion').val();  
		ajuste == ""?valorAjuste = 0:valorAjuste = parseFloat(ajuste);
		var importe = $('#importe_moneda').val();
		/*  $('#importe').val((cotizacion + ajuste) * importe);*/
		var suma = cotizacion + valorAjuste;
		$('#importe').val(suma.toFixed(2) * importe);
	});

});
