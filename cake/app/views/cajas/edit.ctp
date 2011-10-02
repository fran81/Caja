<?php
	echo $this->Html->script(array(
		'jquery/development-bundle/ui/jquery.ui.core',
		'jquery/development-bundle/ui/jquery.ui.datepicker',
		'check.caja'
	),
	array('inline' => false));
	$datepicker = "$('.Fecha').datepicker({navigationAsDateFormat:true, showOtherMonths:true, buttonImage:'calendar.png', showAnim:'fadeIn', buttonText:'calendario', dateFormat:'dd-mm-yy', duration:'normal'});";
	$this->Js->buffer($datepicker);
	$this->Js->buffer("$('#CajaFecha').blur(function (){checkCaja()})");
?>

<div class="cajas form">
<?php echo $this->Form->create('Caja');?>
	<fieldset>
		<legend><?php __('Editar Caja'); ?></legend>
	<?php
		echo $this->Form->input('fecha', array('type' => 'text', 'class' => 'Fecha'));
		echo $this->Form->select("caja_id", $listcaja);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<?php echo $this->element('acordion_acciones'); ?>
