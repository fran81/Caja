<h2><?php __('Flujos Entrantes');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo 'forma_de_pago';?></th>
	<th><?php echo 'importe';?></th>
	<th class="actions"><?php __('Acciones');?></th>
</tr>
<?php
	$totalFlujosEntrantes = 0;
	$i = 0;
	foreach ($flujosEntrantes as $flujo):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<?php if ($flujo['Flujo']['efectivo_id'] != null) { ?>
		<td><?php echo "Efectivo"; ?>&nbsp;</td>
		<td><?php echo ($flujo['Flujo']['tipo'] == 'E') ? $flujo['Efectivo']['importe'] : (FLOAT)$flujo['Efectivo']['importe'] ; ?>&nbsp;</td>
		<td class="actions">
		<?php echo $this->Html->link(__('Ver', true), array('controller' => 'Efectivos','action' => 'view', $flujo['Efectivo']['id'])); ?>
		<?php echo $this->Html->link(__('Editar', true), array('controller' => 'Efectivos','action' => 'edit', $flujo['Efectivo']['id'])); ?>
		<?php echo $this->Html->link(__('Borrar', true), array('controller' => 'Efectivos','action' => 'delete', $flujo['Efectivo']['id']), null, sprintf(__('Está seguro que desea borrar # %s?', true), $flujo['Efectivo']['id'])); ?>
		</td>
		<?php $totalFlujosEntrantes = $totalFlujosEntrantes + $flujo['Efectivo']['importe'];
		} else if ($flujo['Flujo']['cheque_id'] != null) { ?>
		<td><?php echo "Cheque"; ?>&nbsp;</td>
		<td><?php echo $flujo['Cheque']['importe']; ?>&nbsp;</td>
		<td class="actions">
		<?php echo $this->Html->link(__('Ver', true), array('controller' => 'Cheques','action' => 'view', $flujo['Cheque']['id'])); ?>
		<?php echo $this->Html->link(__('Editar', true), array('controller' => 'Cheques','action' => 'edit', $flujo['Cheque']['id'])); ?>
		<?php echo $this->Html->link(__('Borrar', true), array('controller' => 'Cheques','action' => 'delete', $flujo['Cheque']['id']), null, sprintf(__('Está seguro que desea borrar # %s?', true), $flujo['Cheque']['id'])); ?>
		</td>
		<?php $totalFlujosEntrantes = $totalFlujosEntrantes + $flujo['Cheque']['importe'];
		} else { ?>
		<td><?php echo "Cuenta Puente"; ?>&nbsp;</td>
		<td><?php echo $flujo['CuentaPuente']['importe']; ?>&nbsp;</td>
		<td class="actions">
		<?php echo $this->Html->link(__('Ver', true), array('controller' => 'CuentaPuentes','action' => 'view', $flujo['CuentaPuente']['id'])); ?>
		<?php echo $this->Html->link(__('Editar', true), array('controller' => 'CuentaPuentes','action' => 'edit', $flujo['CuentaPuente']['id'])); ?>
		<?php echo $this->Html->link(__('Borrar', true), array('controller' => 'CuentaPuentes','action' => 'delete', $flujo['CuentaPuente']['id']), null, sprintf(__('Está seguro que desea borrar # %s?', true), $flujo['CuentaPuente']['id'])); ?>
		</td>
		<?php $totalFlujosEntrantes = $totalFlujosEntrantes + $flujo['CuentaPuente']['importe'];
		}
		?>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo '<label>TOTAL FLUJOS ENTRANTES: $'. $totalFlujosEntrantes .'</label>';?>
<h2><?php __('Flujos Salientes');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo 'forma_de_pago';?></th>
	<th><?php echo 'importe';?></th>
	<th class="actions"><?php __('Acciones');?></th>
</tr>
<?php
	$totalFlujosSalientes = 0;
	$i = 0;
	foreach ($flujosSalientes as $flujo):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<?php if ($flujo['Flujo']['efectivo_id'] != null) { ?>
		<td><?php echo "Efectivo"; ?>&nbsp;</td>
		<td><?php echo $flujo['Efectivo']['importe']; ?>&nbsp;</td>
		<td class="actions">
		<?php echo $this->Html->link(__('Ver', true), array('controller' => 'Efectivos','action' => 'view', $flujo['Efectivo']['id'])); ?>
		<?php echo $this->Html->link(__('Editar', true), array('controller' => 'Efectivos','action' => 'edit', $flujo['Efectivo']['id'])); ?>
		<?php echo $this->Html->link(__('Borrar', true), array('controller' => 'Efectivos','action' => 'delete', $flujo['Efectivo']['id']), null, sprintf(__('Está seguro que desea borrar # %s?', true), $flujo['Efectivo']['id'])); ?>
		</td>
		<?php $totalFlujosSalientes = $totalFlujosSalientes + $flujo['Efectivo']['importe'];
		} else if ($flujo['Flujo']['cheque_id'] != null) { ?>
		<td><?php echo "Cheque"; ?>&nbsp;</td>
		<td><?php echo $flujo['Cheque']['importe']; ?>&nbsp;</td>
		<td class="actions">
		<?php echo $this->Html->link(__('Ver', true), array('controller' => 'Cheques','action' => 'view', $flujo['Cheque']['id'])); ?>
		<?php echo $this->Html->link(__('Editar', true), array('controller' => 'Cheques','action' => 'edit', $flujo['Cheque']['id'])); ?>
		<?php echo $this->Html->link(__('Borrar', true), array('controller' => 'Cheques','action' => 'delete', $flujo['Cheque']['id']), null, sprintf(__('Está seguro que desea borrar # %s?', true), $flujo['Cheque']['id'])); ?>
		</td>
		<?php $totalFlujosSalientes = $totalFlujosSalientes + $flujo['Cheque']['importe'];
		} else { ?>
		<td><?php echo "Cuenta Puente"; ?>&nbsp;</td>
		<td><?php echo $flujo['CuentaPuente']['importe']; ?>&nbsp;</td>
		<td class="actions">
		<?php echo $this->Html->link(__('Ver', true), array('controller' => 'CuentaPuentes','action' => 'view', $flujo['CuentaPuente']['id'])); ?>
		<?php echo $this->Html->link(__('Editar', true), array('controller' => 'CuentaPuentes','action' => 'edit', $flujo['CuentaPuente']['id'])); ?>
		<?php echo $this->Html->link(__('Borrar', true), array('controller' => 'CuentaPuentes','action' => 'delete', $flujo['CuentaPuente']['id']), null, sprintf(__('Está seguro que desea borrar # %s?', true), $flujo['CuentaPuente']['id'])); ?>
		</td>
		<?php $totalFlujosSalientes = $totalFlujosSalientes + $flujo['CuentaPuente']['importe'];
		}
		?>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo '<label>TOTAL FLUJOS SALIENTES: $'. $totalFlujosSalientes .'</label>';
(FLOAT)$diferencia = (FLOAT)$totalFlujosEntrantes + $totalFlujosSalientes;
echo '<label>TOTAL FLUJOS: $'. $diferencia .'</label>';
if ($diferencia == 0) {
	echo $this->Form->button('Terminar', array('onclick' => 'finalizarOperacion()','id' => 'terminarOperacion'));
} ?>
