$(function() {
	$('.selectAccion').change(function(event){
		var panel = $(event.target).val();
		var opcion = $(event.target).attr('id');
		$('#panel'+opcion).load(
			'/cake/operacions/elegirAccion #content',
			{style: panel},
			function() { 
				$('.boton').button();
				$('#guardar-movimiento').click(function (){guardarMovimiento()});
				$('#guardar-sellado').click(function (){guardarSellado()});
				$('#guardar-efectivo').click(function (){guardarEfectivo()});
				$('#guardar-cheque').click(function (){guardarCheque()});
				$('#guardar-puente').click(function (){guardarPuente()});
				$('.Fecha').datepicker({
						navigationAsDateFormat:true,
						showOtherMonths:true,
						buttonImage:'calendar.png',
						showAnim:'fadeIn',
						buttonText:'calendario',
						dateFormat:'dd-mm-yy',
						duration:'normal'
					});
				if (panel == "Cheque" || panel == "CanjeCheque")
				{
					$('#ChequeTipoCanje').click(function(){
						$('#ChequeFechaLimite').removeAttr('disabled');
						var fecha = $('#ChequeFechaCobro').val();
						$('#ChequeFechaLimite').val(sumaFecha(fecha,29));  
					});
					$('#ChequeTipoDiferido').click(function(){
						$('#ChequeFechaLimite').attr('disabled',true);
						var fecha = $('#ChequeFechaCobro').val();
						$('#ChequeFechaLimite').val(sumaFecha(fecha,29));
					});
					$('#ChequeTipoCorriente').click(function(){
						$('#ChequeFechaLimite').attr('disabled',true);
						$('#ChequeFechaLimite').val("");
					});
					$('#FlujoTipoS').click(function(event){
						var panel = $(event.target).val();
						$('#panelCanje').load(
							'/cake/operacions/elegirAccion #content',
							{style: $(event.target).val()}
						);
					});
						
					$(function() {
						$('#NumeroCheque').change(function() {
							texto = ('#NumeroCheque').text;
							valor = ('#NumeroCheque').value;
							if (valor == null || valor.length < 9) {
								alert('Se deben ingresar 9 dígitos para le número de cheque');
							} else {
								if (checkCheque()) {
									alert('El cheque ya ha sido ingresado');
									$('#Guardar').attr('disabled', true);
								} else {
									$('#Guardar').removeAttr('disable');
								}
							}
						});
					});
				}
				if (panel == "Sellado") {
					$('#SelladoImportePrestamo').blur(function(){
						var prestamo = $('#SelladoImportePrestamo').val();
						var importe = prestamo * 0.0075;
						$('#MovimientoImporte').val(importe);
					});
				}			
			}, 
			function() { $('[value=""]',event.target).remove(); }
		).after(function(){
			if (opcion == "Salida") {
				$('#FlujoTipo').val('S');
			}
		});
	});
});
