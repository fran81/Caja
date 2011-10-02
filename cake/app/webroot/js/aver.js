function crear() {
	var data =($("#OperacionCargar2Form").serialize())?$("#OperacionCargar2Form").serialize():$("#OperacionCargarCanjeForm").serialize();
	$.ajax({
		type: "post",		
		url: 'crear2',
		data: data,	
		dataType: "json",
		success: function(respuesta) {
 			$("#id").val(respuesta.id);
			$(".selectAccion").removeAttr('disabled');
			$("#crearOperacion").attr('disabled',true);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert('no hubo exito');
			alert(xhr.status);
			alert(thrownError);
		}
	});
	return false;
}

function sumaFecha(fecha, dias) {
	var dia = fecha.substring(0,2);
	var mes = fecha.substring(3,5);
	var anio = fecha.substring(6,10);
	lafecha = new Date(anio,(mes-1),dia);
	lafecha.setDate(lafecha.getDate()+dias);
	var nuevodia = lafecha.getDate();
	if(nuevodia < 10){
		nuevodia = '0'+nuevodia;
	}
	resultado = nuevodia+'-'+(lafecha.getMonth()+1)+'-'+lafecha.getFullYear();
	return resultado
}

function cambioFecha(fecha) {

	$(".Fecha").each(function (elem) {
	if ($(elem).is(":input")) {
	$(elem).val($.format.date($(elem).val(), "dd/MM/yyyy"));
	} else {
	$(elem).text($.format.date($(elem).text(), "dd/MM/yyyy"));
	}
	}); 
}

function cancelarOperacion(){
	var data =$("#id").serialize();
	$.ajax({
		type: "post",		
		url: 'cancelar',
		data: data,	
//		dataType: "json",
		success: function() {
 			window.location.href='/cake/operacions/cargar2';
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert('no hubo exito');
			alert(xhr.status);
			alert(thrownError);
		}
	});
}
