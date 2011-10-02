<h2><?php __('Movimientos');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo 'nro_boleta';?></th>
	<th><?php echo 'concepto';?></th>
	<th><?php echo 'tipo';?></th>
	<th><?php echo 'importe';?></th>
	<th><?php echo 'id';?></th>
</tr>
<?php
	$totalMovimientos = 0;
	$i = 0;
	foreach ($movimientos as $movimiento):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $movimiento['Movimiento']['nro_boleta']; ?>&nbsp;</td>
		<td><?php echo $movimiento['Movimiento']['concepto']; ?>&nbsp;</td>
		<td><?php echo $movimiento['Movimiento']['tipo']; ?>&nbsp;</td>
		<td><?php echo $movimiento['Movimiento']['importe']; ?>&nbsp;</td>
		<td><?php echo $movimiento['Movimiento']['operacion_id']; ?>&nbsp;</td>
		<?php $totalMovimientos = $totalMovimientos + $movimiento['Movimiento']['importe']; ?>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo $this->Form->label('TOTAL MOVIMIENTOS: $'.$totalMovimientos); ?>
