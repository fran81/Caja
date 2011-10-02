<?php
	echo $this->Html->script(array(
		'jquery/development-bundle/ui/jquery.ui.core',
		'jquery/development-bundle/ui/jquery.ui.datepicker',
		'panelAcciones',		
		'aver',
		'guardar.movimiento',
//		'inicio.operacion',
		'busca.cotizacion',
		'calcula.cotizacion',
		'check.dato',
		'totalizar.operacion',
		'busca.cotizacion.asignada'	
	),
	array('inline' => false));
	$datepicker = "$('.Fecha').datepicker({navigationAsDateFormat:true, showOtherMonths:true, buttonImage:'calendar.png', showAnim:'fadeIn', buttonText:'calendario', dateFormat:'dd-mm-yy', duration:'normal'});";
	$this->Js->buffer($datepicker);
	$this->Js->buffer("$(function() {totalizarOperacion()});");
	$this->Js->buffer("$('#MonedaId').live('change',function(){buscaCotizacionAsignada()});");
	$this->Js->buffer("$('#TerminarOperacion').live('click',function(){finalizarOperacion()});");
	
?>

<div class="operacions form">
<?php echo $this->Form->create('Operacion', array('default' => false));?>
	<fieldset>
		<legend><?php __('Editar Operacion'); ?></legend>
		<?php echo $this->Form->input('responsable_id', array('class' => 'OperacionResponsableId'));?>
		<?php echo $this->Form->input('user_id', array('class' => 'OperacionResponsableId'));?>
		<?php echo $this->Form->select("caja_id", $listcaja);?>
		<?php echo $this->Form->select('Accion', 
			array('Aporte' => 'Movimiento - Aportes',
				'Cuota' => 'Movimiento - Cuota de Préstamo',
				'Sellado' => 'Movimiento - Sellado',
				'Vario' => 'Movimiento - Ingreso Vario',
				'Efectivo' => 'Flujo de caja - Efectivo',
				'Cheque' => 'Flujo de caja - Cheque',
				'Puente' => 'Flujo de caja - Cuenta Puente'				
			),null,array('class'=>'selectAccion','id'=>'Accion')
		)?>
		<?php echo $this->Form->input('id', array('type' => 'hidden','id'=>'id'));?>
		
		<div id="panelAccion"></div>
		<div id="totalOperacion"></div>
		<div id="descuentoVuelto"></div>
		<?php //echo $this->Form->end(__('Crear', true));?>
	</fieldset>
</div>
<?php echo $this->element('acordion_acciones'); ?>
