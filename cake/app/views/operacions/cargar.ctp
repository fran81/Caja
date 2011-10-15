<?php
	echo $this->Html->script(array(
		'jquery/development-bundle/ui/jquery.ui.widget',
		'jquery/development-bundle/ui/jquery.ui.position',
		'jquery/development-bundle/ui/jquery.ui.datepicker',
		'jquery/development-bundle/ui/jquery.ui.autocomplete',
		'jquery/development-bundle/ui/jquery.ui.button',
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
	$this->Js->buffer("$('#crearOperacion').click(function (){crear()})");
	$this->Js->buffer("$('#TerminarOperacion').live('click',function(){finalizarOperacion()});");
	$this->Js->buffer("$('#CancelarOperacion').live('click',function(){cancelarOperacion()});");
	$this->Js->buffer("$('#auto_responsable').autocomplete({autoFill:true,minLength:'1',source:'../responsables/buscar'});");
	$this->Js->buffer("$('.boton').button();");
?>

<div class="operacions form">
<?php echo $this->Form->create('Operacion', array('default' => false));?>
	<fieldset>
		<legend><?php __('Cargar Operacion'); ?></legend>
		<?php echo $this->Form->input('responsable_id', array('class' => 'OperacionResponsableId', 'id' => 'auto_responsable', 'type' => 'text'));?>
		<?php echo $this->Form->hidden('user_id', array('class' => 'OperacionResponsableId','value'=>'4e0f2d5c-7400-4cc7-9ce0-05e07f56b65b'));?>
		<?php echo $this->Form->select("caja_id", $listcaja);?>
		<?php echo $this->Form->button("Crear", array('id' => 'crearOperacion', 'class' => 'crearOperacion', 'class' => 'boton', 'type' => 'Movimiento'));?>
		<?php echo $this->Form->hidden('id', array('id' => 'id'));?>
		<?php echo $this->Form->select('Accion', 
			array('Aporte' => 'Movimiento - Aportes',
				'Cuota' => 'Movimiento - Cuota de Préstamo',
				'Sellado' => 'Movimiento - Sellado',
				'Vario' => 'Movimiento - Ingreso Vario',
				'Efectivo' => 'Flujo de caja - Efectivo',
				'Cheque' => 'Flujo de caja - Cheque',
				'Puente' => 'Flujo de caja - Cuenta Puente'				
			),null,array('class' => 'selectAccion','id' => 'Accion')
		)?>
		<div id="panelAccion" class="panel"></div>
		<div id="totalOperacion" class="oculto"></div>
		<div id="descuentoVuelto" class="oculto"></div>
		<?php echo $this->Form->button("Cancelar", array('id'=> 'CancelarOperacion','class'=>'boton'));?>
	</fieldset>
</div>
<?php echo $this->element('acordion_acciones'); ?>
