$(document).ready(function(){
	$('#auto_responsable').keypress(function(){
//		if ($('#auto_responsable').val().length > 1) {
			var data = $('#auto_responsable').val();
/*			$.ajax({
				type: "post",
				url: '../responsables/buscar',
				dataType: "json",
				data: data,
				success : function(respuesta) {
					alert(respuesta);
					$('auto_responsable').autocomplete({source: respuesta});
				}
			});*/
	//		alert('../responsables/buscar'+data);
//			$('#auto_responsable').autocomplete({source: '../responsables/buscar'});
			$('#auto_responsable').autocomplete({minLength:'2',source:'../responsables/buscar/'});
//		}
	});
/*	var username = $('#auto_responsable');
		auto_responsable.defaultText('Responsable');
		auto_responsable.autocomplete({
		minLength:2,
		source: 'responsables/buscar'
	});*/
	 
});
	 
	// A custom jQuery method for placeholder text:
	 
/*	$.fn.defaultText = function(value){
	 
	var element = this.eq(0);
	element.data('defaultText',value);
	 
	element.focus(function(){
	if(element.val() == value){
	element.val('').removeClass('defaultText');
	}
	}).blur(function(){
	if(element.val() == '' || element.val() == value){
	element.addClass('defaultText').val(value);
	}
	});
	 
	return element.blur();
	}*/
