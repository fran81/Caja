function guardarMovimiento() {
	var data;
	if ($("#OperacionCargar2Form").serialize()) {
		data = ($("#OperacionCargar2Form").serialize());
	} else if ($("#OperacionEditarForm").serialize()) {
		data = $("#OperacionEditarForm").serialize();
	}  
	$.ajax({
		type: "post",		
		url: '/cake/operacions/guardarMovimiento',
		data: data,	
		success: function(respuesta) {
			totalizarOperacion();
//			$('#panelAccion').html("");
			$('#barra').val("");
			$('#MovimientoNroBoleta').val("");
			$('#MovimientoImporte').val("");
			$('#MovimientoConcepto').val("");
//			$('#Accion').val("");
		}
	});
	return false;
}

function guardarEfectivo() {
	var data;
	var operacion;
	if ($("#OperacionCargar2Form").serialize()){
		data = ($("#OperacionCargar2Form").serialize());
		operacion = "ingreso";
	} else if ($("#OperacionEditarForm").serialize()){
		data = $("#OperacionEditarForm").serialize();
		operacion = "ingreso";
	} else if ($("#OperacionCargarCanjeForm").serialize()) {
		data = $("#OperacionCargarCanjeForm").serialize();
		operacion = "canje";
	}
	$.ajax({
		type: "post",
		url: '/cake/operacions/guardarEfectivo',
		data: data,
		success : function(respuesta) {
			if (operacion == "ingreso") {
				totalizarOperacion();
				$('#panelAccion').html("");
				$('#Accion').val("");
			} else if (operacion == "canje") {
				totalizarCanje();
				$('#panelCanje').html("");
				$('#Canje').val("");
			}
		}
	});
}

function guardarCheque() {
	$("#ChequeFechaLimite").removeAttr('disabled');
	var data;
	if ($("#OperacionCargar2Form").serialize()){
		data = ($("#OperacionCargar2Form").serialize());
		operacion = "ingreso";
	} else if ($("#OperacionEditarForm").serialize()){
		data = $("#OperacionEditarForm").serialize();
		operacion = "ingreso";
	} else if ($("#OperacionCargarCanjeForm").serialize()) {
		data = $("#OperacionCargarCanjeForm").serialize();
		operacion = "canje";
	}
	$.ajax({
		type: "post",
		url: '/cake/operacions/guardarCheque',
		data: data,
		success : function(respuesta) {
			if (operacion == "ingreso") {
				totalizarOperacion();
				$('#panelAccion').html("");
				$('#Accion').val("");
			} else if (operacion == "canje") {
				totalizarCanje();
				$('#panelCanje').html("");
				$('#Canje').val("");
			}
		}
	});
}

function guardarPuente() {
	var data;
	if ($("#OperacionCargar2Form").serialize()){
		data = ($("#OperacionCargar2Form").serialize());
		operacion = "ingreso";
	} else if ($("#OperacionEditarForm").serialize()){
		data = $("#OperacionEditarForm").serialize();
		operacion = "ingreso";
	} else if ($("#OperacionCargarCanjeForm").serialize()) {
		data = $("#OperacionCargarCanjeForm").serialize();
		operacion = "canje";
	}
	$.ajax({
		type: "post",
		url: '/cake/operacions/guardarPuente',
		data: data,
		success : function(respuesta) {
			if (operacion == "ingreso") {
				totalizarOperacion();
				$('#panelAccion').html("");
				$('#Accion').val("");
			} else if (operacion == "canje") {
				totalizarCanje();
				$('#panelCanje').html("");
				$('#Canje').val("");
			}
		}
	});
}

function guardarSellado() {
	var data;
	if ($("#OperacionCargar2Form").serialize()){
		data = ($("#OperacionCargar2Form").serialize());
	} else if ($("#OperacionEditarForm").serialize()){
		data = $("#OperacionEditarForm").serialize();
	} 
	guardarMovimiento();
	$.ajax({
		type: "post",		
		url: '/cake/operacions/guardarSellado',
		data: data,	
		success: function(respuesta) {
			totalizarOperacion();
			$('#panelAccion').html("");
			$('#Accion').val("");
		}
	});
	return false;
}

function canjearCheque(id_cheque) {
	var data = $("#id").serialize();
	$.ajax({
		type: "post",
		url: '/cake/cheques/canjear',
		data: data+"&data%5BCheque%5D%5Bid%5D="+id_cheque,
		success: function() {
			totalizarCanje();
			$('#panelCanje').html("");
			$('#Canje').val("");
		}
	});
	return false;
}

function finalizarOperacion() {
	var data = $("#id").serialize();
	$.ajax({
		type: "post",
		url: '/cake/operacions/terminarOperacion',
		data: data,
		success: function() {
			window.location.href='/cake/operacions/cargar2';
		}
	});
}
