$(function () {
	$(".Fecha").each(function (idx,elem) {
		var fecha = $(elem).val();
		if (fecha.substring(2,3) != '-'){
				var anio = fecha.substring(0,4);
				alert(dia);
				var mes = fecha.substring(5,7);
				alert(mes);
				var dia = fecha.substring(8,10);
				alert(anio);
				resultado = dia+'-'+mes+'-'+anio;
				$(elem).val(resultado);
		}
	}); 
});
