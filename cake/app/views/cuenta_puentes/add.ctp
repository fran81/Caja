<?php
	echo $this->Html->script(array(
		'jquery/development-bundle/ui/jquery.ui.core',
		'jquery.ui.datepicker'
	), array('inline' => false));

$datepicker = "$('.Fecha').datepicker({navigationAsDateFormat:true, showOtherMonths:true, buttonImage:'calendar.png', showAnim:'fadeIn', buttonText:'calendario', dateFormat:'dd-mm-yy', duration:'normal'});";

$this->Js->buffer($datepicker); 
?>

<div class="cuentaPuentes form">
<?php echo $this->Form->create('CuentaPuente');?>
	<fieldset>
		<legend><?php __('Cargar Cuenta Puente'); ?></legend>
	<?php
		echo $this->Form->input('concepto');
		echo $this->Form->input('importe');
		echo $this->Form->input('fecha', array('type' => 'text', 'class' => 'Fecha'));
		echo $this->Form->input('numero');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<?php echo $this->element('acordion_acciones'); ?>
