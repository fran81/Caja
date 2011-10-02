<?php
	echo $this->Html->script(array(
		'jquery/js/jquery-1.6.2.min',
		'jquery/development-bundle/ui/jquery.ui.core',
		'jquery/development-bundle/ui/jquery.ui.datepicker',
		'jquery/development-bundle/ui/jquery.ui.widget',
		'jquery/development-bundle/ui/jquery.ui.button',
		'check.caja'
	), array('inline' => false));

	$datepicker = "$('.Fecha').datepicker({navigationAsDateFormat:true, showOtherMonths:true, buttonImage:'calendar.png', showAnim:'fadeIn', buttonText:'calendario', dateFormat:'dd-mm-yy', duration:'normal'});";
	$this->Js->buffer($datepicker); 
	$this->Js->buffer("$('#CajaFecha').blur(function (){checkCaja()})");
	$this->Js->buffer("$('.boton').button();");
	
?>

<div class="cajas form">
<?php echo $this->Form->create('Caja');?>
	<fieldset>
		<legend><?php __('Crear Caja'); ?></legend>
	<?php echo $this->Form->input('fecha', array('type' => 'text', 'class' => 'Fecha'));
		echo $this->Form->input('cuenta_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<div id="endForm"></div>
<?php echo $this->Form->end(array('label'=>'Crear', 'class'=>'boton'));?>
</div>
<?php echo $this->element('acordion_acciones'); ?>
