<?php
	echo $this->Html->script(array(
		'jquery/development-bundle/ui/jquery.ui.core',
		'jquery.ui.datepicker',
	), array('inline' => false));
	$cambio = "$('#Operacion').submit(function(){ return false; } );";
	$cambio2 = "$('#OperacionAccion').change(function(){
//			$('[value='']',this).remove();
			$('#acciones > div:visible').hide('puff');
			$('#acciones > div:input').attr('disabled',true);
			$('#acciones div.' + $(this).val()).show('slide');
			$('#acciones div.' + $(this).val() +' :input').attr('disabled',false);});";
	$datepicker = "$('#OperacionFechaCobro').datepicker();";
	$this->Js->Buffer($cambio);
	$this->Js->Buffer($cambio2);
	$this->Js->buffer($datepicker);
?>

<div class="operacions form">
<?php echo $this->Form->create('Operacion');?>
	<fieldset>
		<legend><?php __('Add Operacion'); ?></legend>
		<?php echo $this->Form->input('responsable_id');?>
		<?php echo $this->Form->input('user_id');?>
		<?php echo $this->Form->select("caja_id", $listcaja);?>
		<?php echo $this->Form->select('Accion', 
			array('aporte' => 'Movimiento - Aportes',
				'cuota' => 'Movimiento - Cuota de Préstamo',
				'vario' => 'Movimiento - Ingreso Vario',
				'efectivo' => 'Flujo de caja - Efectivo',
				'cheque' => 'Flujo de caja - Cheque',
				'puente' => 'Flujo de caja - Cuenta Puente'
			)
		)?>


		<div class="acciones" id="acciones">
			<div class="aporte">
				<?php echo $this->Form->input('barra', array('type' => 'text'));
					echo $this->Form->input('nro_boleta_aporte');
					echo $this->Form->input('importe_aporte');
					echo $this->Form->input('concepto_aporte')?>
			</div>
	
			<div class="cuota">
				<?php echo $this->Form->input('nro_boleta_cuota');
					echo $this->Form->input('importe_cuota');
					echo $this->Form->input('concepto_cuota');?>
			</div>
	
			<div class="vario">
				<?php echo $this->Form->input('nro_boleta_vario');
					echo $this->Form->input('importe_vario');
					echo $this->Form->input('concepto_vario');?>
			</div>

			<div class="efectivo">
				<table cellpadding="0" cellspacing="0">
				<tr>
					<th><?php echo $this->Paginator->sort('nombre');?></th>
					<th><?php echo $this->Paginator->sort('importe');?></th>
				</tr>
				<?php
				$i = 0;
				Debugger::dump($cotizacions);
				foreach ($cotizacions as $cotizacion):
					$class = null;
					if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
					}
				Debugger::dump($cotizacion);
				?>
				<tr<?php echo $class;?>>
				<td>
				<?php echo $this->Html->link($cotizacion[0]['Moneda']['nombre'], array('controller' => 'monedas', 'action' => 'view', $cotizacion['Moneda']['id'])); ?>
				</td>
				<td><?php echo $cotizacion['importe']; ?>&nbsp;</td>
				</tr>
				<?php endforeach; ?>
				</table>
			</div>
		
			<div class="cheque">
				<?php echo $this->Form->input('numero');
				echo $this->Form->input('importe');
				echo $this->Form->radio('tipo',array(
					'corriente'=>'Corriente',
					'diferido'=>'Diferido',
					'canje'=>'Para Canje'),
					array('value'=>'corriente'));
				echo $this->Form->input('fecha_cobro');
//				echo $this->Form->input('responsable_id');
				echo $this->Form->select("plaza_id", $listdata);?>
			</div>	
		</div>
		<?php echo $this->Form->end(__('Crear', true));?>
	</fieldset>
</div>
<?php echo $this->element('acordion_acciones'); ?>	
