<?php
	echo $this->Html->script(array(
		'jquery/development-bundle/ui/jquery.ui.core',
		'jquery/development-bundle/ui/jquery.ui.datepicker',
		'aver',
		'formato.fecha'
	),
	array('inline' => false));
	$datepicker = "$('.Fecha').datepicker({navigationAsDateFormat:true, showOtherMonths:true, buttonImage:'calendar.png', showAnim:'fadeIn', buttonText:'calendario', dateFormat:'dd-mm-yy', duration:'normal'});";
	$this->Js->buffer($datepicker);
	$this->Js->buffer("$('#ChequeFechaCobro').blur(function(){
		var fecha = $('#ChequeFechaCobro').val();
		$('#ChequeFechaLimite').val(sumaFecha(fecha,29));
		});"
	);
//	$this->Js->buffer("$('.Fecha').val(cambioFecha(this));");
?>

<div class="cheques form">
<?php echo $this->Form->create('Cheque');?>
	<fieldset>
		<legend><?php __('Edit Cheque'); ?></legend>
	<?php
		echo $this->Form->input('id', array('type' => 'hidden'));
		echo $this->Form->input('numero');
		echo $this->Form->input('importe');
		echo $this->Form->input('fecha_cobro', array('type' => 'text', 'class' => 'Fecha'));
		echo $this->Form->input('fecha_limite', array('type' => 'text', 'class' => 'Fecha'));
		echo $this->Form->input('estado', array('disabled' => true));
		echo $this->Form->input('tipo', array('options' => array('corriente'=>'corriente','diferido'=>'diferido','canje'=>'canje')));
		echo $this->Form->input('responsable_id');
		echo $this->Form->input('plaza_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php echo $this->element('acordion_acciones'); ?>
