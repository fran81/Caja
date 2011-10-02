$('#guardar').click(function(event){
 $.post(
  'formAjax',
  {style: $(event.target).val()},
  $('#movimiento').serialize(),
  function(data) {
   alert("algo hace");
  }  
 );
});

