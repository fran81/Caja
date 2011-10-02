<?php 
	echo $this->Html->script(array(
		'jquery/development-bundle/ui/jquery.ui.core',
		'jquery/development-bundle/ui/jquery.ui.datepicker',
		'busca.cotizacion.asignada'
	),
	array('inline' => false));
	$this->Js->buffer("$(function() {
		var importe = $('#EfectivoImporte').val();
		var ajuste = $('#EfectivoAjusteCotizacion').val();
		var cotizacion = $('#EfectivoImporteCotizacion').val();
		$('#EfectivoImporteMoneda').val(importe/(ajuste + cotizacion));});"
	);

?>
<div class="efectivos form">
<?php echo $this->Form->create('Efectivo');?>
	<fieldset>
		<legend><?php __('Editar Efectivo'); ?></legend>
	<?php
		echo $this->Form->input('id', array('type' => 'hidden'));
		echo $this->Form->input('importe_moneda');
		echo $this->Form->input('Importe Cotizacion', array('type' => 'text', 'disabled' => true, 'value' => $this->data['Cotizacion']['importe']));
		echo $this->Form->input('ajuste_cotizacion');
		echo $this->Form->input('importe');
		echo $this->Form->input('Cotizacion.moneda_id');
		echo $this->Form->input('Cotizacion.id', array('type' => 'hidden'));
		echo $this->data['Cotizacion']['importe'];
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>

