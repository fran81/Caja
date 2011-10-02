<?php
	echo $this->Html->script(array(
		'jquery/development-bundle/ui/jquery.ui.core',
		'jquery.ui.datepicker'
	), array('inline' => false));

$datepicker = "$('.Fecha').datepicker({navigationAsDateFormat:true, showOtherMonths:true, buttonImage:'calendar.png', showAnim:'fadeIn', buttonText:'calendario', dateFormat:'dd-mm-yy', duration:'normal'});";

$this->Js->buffer($datepicker); 
?>

<div class="cotizacions form">
<?php echo $this->Form->create('Cotizacion');?>
	<fieldset>
		<legend><?php __('Cargar Cotización'); ?></legend>
	<?php
		echo $this->Form->input('fecha_desde', array('type' => 'text', 'class' => 'Fecha'));
		echo $this->Form->input('importe');
		echo $this->Form->input('moneda_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Cargar', true));?>
</div>
<?php echo $this->element('acordion_acciones'); ?>
