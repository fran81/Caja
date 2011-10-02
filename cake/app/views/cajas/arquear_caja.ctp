<?php
	echo $this->Html->script(array(
		'jquery/development-bundle/ui/jquery.ui.core',
		'jquery/development-bundle/ui/jquery.ui.datepicker'
	),
	array('inline' => false));
	$datepicker = "$('.Fecha').datepicker({navigationAsDateFormat:true, showOtherMonths:true, buttonImage:'calendar.png', showAnim:'fadeIn', buttonText:'calendario', dateFormat:'dd-mm-yy', duration:'normal'});";
	$this->Js->buffer($datepicker);?>
<div class="cajas form">
<?php echo $this->Form->create('Caja');?>
	<fieldset>
		<legend><?php __('Caja'); ?></legend>
	<?php
		echo $this->Form->input('fecha', array('type' => 'text', 'class' => 'Fecha'));?>
		<fieldset>
			<legend><?php __('Ingresos'); ?></legend>
			<?php echo $this->Form->input('total_aporte');
			echo $this->Form->input('total_otro_ingreso');
			echo $this->Form->input('total_ingreso'); ?>
		</fieldset>
		<fieldset>
			<legend><?php __('Egresos s/ su destino'); ?></legend>
			<?php echo $this->Form->input('total_deposito_cheque');
			echo $this->Form->input('total_cuenta_puente');
			echo $this->Form->input('total_deposito_efectivo');
			echo $this->Form->input('total_moneda_extranjera');
			echo $this->Form->input('total_reemplazo_valor');
			echo $this->Form->input('total_egreso');?>
		</fieldset>
	</fieldset>
</div>
<div class="detalleRecaudacions index">
	<h2><?php __('Detalle Recaudacions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>Concepto</th>
			<th>Saldo Inicial</th>
			<th>Ingreso</th>
			<th>Egreso</th>
			<th>Saldo Final</th>
	</tr>
	<?php
	$i = 0;
	$totalSaldoInicial = 0;
	$totalIngreso = 0;
	$totalEgreso = 0;
	$totalSaldoFinal = 0;
	foreach ($detalleRecaudacions as $key => $detalleRecaudacion):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $key; ?>&nbsp;</td>
		<td><?php echo $detalleRecaudacion['saldo_inicial']; 
		$totalSaldoInicial += $detalleRecaudacion['saldo_inicial'];?>&nbsp;</td>		
		<td><?php echo $detalleRecaudacion['ingreso'];
		$totalIngreso += $detalleRecaudacion['ingreso'] ?>&nbsp;</td>
		<td><?php echo $detalleRecaudacion['egreso'];
		$totalEgreso += $detalleRecaudacion['egreso'] ?>&nbsp;</td>
		<td><?php echo $detalleRecaudacion['saldo_final'];
		$totalSaldoFinal += $detalleRecaudacion['saldo_final'] ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	<tr>
		<td>TOTALES</td>
		<td><?php echo $totalSaldoInicial; ?></td>
		<td><?php echo $totalIngreso; ?></td>
		<td><?php echo $totalEgreso; ?></td>
		<td><?php echo $totalSaldoFinal; ?></td>
	</table>
</div>
<?php echo $this->element('acordion_acciones'); ?>
