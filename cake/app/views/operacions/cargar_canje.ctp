<?php
	echo $this->Html->script(array(
		'jquery/development-bundle/ui/jquery.ui.core',
		'jquery/development-bundle/ui/jquery.ui.datepicker',
		'panelAcciones',		
		'aver',
		'guardar.movimiento',
		'inicio.operacion',
		'busca.cotizacion',
		'calcula.cotizacion',
		'check.dato',
		'totalizar.operacion'
	),
	array('inline' => false));
	$datepicker = "$('.Fecha').datepicker({navigationAsDateFormat:true, showOtherMonths:true, buttonImage:'calendar.png', showAnim:'fadeIn', buttonText:'calendario', dateFormat:'dd-mm-yy', duration:'normal'});";
	$this->Js->buffer($datepicker);
	$this->Js->buffer("  $('#Accion').attr('disabled',true);
  $('#Canje').attr('value','');
  $('#id').removeAttr('value');
  $('#crearOperacion').removeAttr('disabled');
  $('.selectAccion').attr('disabled',true);
  $('#terminarOperacion').attr('disabled',true);");
?>

<div class="operacions form">
<?php echo $this->Form->create('Operacion', array('default' => false));?>
	<fieldset>
		<legend><?php __('Cargar Operacion'); ?></legend>
		<?php echo $this->Form->input('responsable_id', array('class' => 'OperacionResponsableId'));?>
		<?php echo $this->Form->input('user_id', array('class' => 'OperacionResponsableId'));?>
		<?php echo $this->Form->select("caja_id", $listcaja);?>
		<?php echo $this->Form->button("crear", array('id' => 'crearOperacion', 'class' => 'crearOperacion', 'onclick' => 'crear()', 'type' => 'Movimiento'));?>
		<?php echo $this->Form->hidden('id',array('id' => 'id'));?>
			<?php echo $this->Form->select('Canje', 
				array('CanjeEfectivo' => 'Efectivo',
					'CanjeCheque' => 'Cheque',
					'CanjePuente' => 'Cuenta Puente'				
				),null,array('class' => 'selectAccion','id' => 'Canje')
			)?>

			<div id="panelCanje"></div>
			<div id="totalFlujos"></div>
		<div id="descuentoVuelto"></div>
		
	<?php echo $this->Form->button('Terminar', array('onclick' => 'terminarOperacion()','id' => 'terminarOperacion')); ?>
	</fieldset>
</div>
<?php echo $this->element('acordion_acciones'); ?>
