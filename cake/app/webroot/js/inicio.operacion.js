window.onload = iniciarPagina;

function iniciarPagina() {
  $('#Accion').attr('disabled',true);
  $('#Accion').attr('value',"");
  $('#id').removeAttr('value');
  $('#crearOperacion').removeAttr('disabled');
  $('#terminarOperacion').attr('disabled',true);
}
