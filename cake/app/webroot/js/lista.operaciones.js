$(function() {
	$('#OperacionCaja').change(function(event){
		$('#listaOperaciones').load(
			'listarOperaciones/'+escape($(this).val())+' #content',
			{style: 'Operaciones'}
		);
	});
});
			
