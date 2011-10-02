$(function() {
	var datos = $('#OperacionId').val();
	alert(datos);
	$('#totalDeOperacion').load(
		'/cake/operacions/totalOperacion #content',
		{dato:datos}
	);
});
