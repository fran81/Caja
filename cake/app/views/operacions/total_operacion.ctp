<div id="totalFlujos">
<h2><?php __('Flujos de Caja');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo 'forma_de_pago';?></th>
	<th><?php echo 'importe';?></th>
	<th class="actions"><?php __('Acciones');?></th>
</tr>
<?php
	$totalFlujos = 0;
	$i = 0;
	foreach ($operacion['Flujo'] as $flujo):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<?php if ($flujo['efectivo_id'] != null) { ?>
		<td><?php echo "Efectivo"; ?>&nbsp;</td>
		<td><?php echo (FLOAT)$flujo['Efectivo']['importe'] ; ?>&nbsp;</td>
		<td class="actions">
		<?php echo $this->Html->link(__('Ver', true), array('controller' => 'Efectivos','action' => 'view', $flujo['Efectivo']['id'])); ?>
		<?php echo $this->Html->link(__('Editar', true), array('controller' => 'Efectivos','action' => 'edit', $flujo['Efectivo']['id'])); ?>

		<?php $totalFlujos = (FLOAT)$totalFlujos + (FLOAT)$flujo['Efectivo']['importe'];
		} else if ($flujo['cheque_id'] != null) { ?>
		<td><?php echo "Cheque"; ?>&nbsp;</td>
		<td><?php echo $flujo['Cheque']['importe']; ?>&nbsp;</td>
		<td class="actions">
		<?php echo $this->Html->link(__('Ver', true), array('controller' => 'Cheques','action' => 'view', $flujo['Cheque']['id'])); ?>
		<?php echo $this->Html->link(__('Editar', true), array('controller' => 'Cheques','action' => 'edit', $flujo['Cheque']['id'])); ?>
		
		<?php $totalFlujos = (FLOAT)$totalFlujos + $flujo['Cheque']['importe'];
		} else { ?>
		<td><?php echo "Cuenta Puente"; ?>&nbsp;</td>
		<td><?php echo $flujo['CuentaPuente']['importe']; ?>&nbsp;</td>
		<td class="actions">
		<?php echo $this->Html->link(__('Ver', true), array('controller' => 'CuentaPuentes','action' => 'view', $flujo['CuentaPuente']['id'])); ?>
		<?php echo $this->Html->link(__('Editar', true), array('controller' => 'CuentaPuentes','action' => 'edit', $flujo['CuentaPuente']['id'])); ?>
		<?php $totalFlujos = (FLOAT)$totalFlujos + (FLOAT)$flujo['CuentaPuente']['importe'];
		}
		echo $this->Html->link(__('Borrar', true), array('controller' => 'Flujos','action' => 'delete', $flujo['id']), null, sprintf(__('Está seguro que desea borrar # %s?', true), $flujo['id'])); ?>
		</td>	
	</tr>
	<?php endforeach; ?>
	<?php echo $this->Form->hidden('totalFlujo', array('value' => $totalFlujos,'onchange' => 'calcularDiferencia()'));?>
</table>
<?php 	echo '<label>TOTAL FLUJOS: $'.$totalFlujos.'</label>';?>
</div>

<div id="totalMovimientos">
<h2><?php __('Movimientos');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo 'nro_boleta';?></th>
	<th><?php echo 'concepto';?></th>
	<th><?php echo 'tipo';?></th>
	<th><?php echo 'importe';?></th>
	<th class="actions"><?php __('Acciones');?></th>
</tr>
<?php
	$totalMovimientos = 0;
	$i = 0;
	foreach ($operacion['Movimiento'] as $movimiento):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $movimiento['nro_boleta']; ?>&nbsp;</td>
		<td><?php echo $movimiento['concepto']; ?>&nbsp;</td>
		<td><?php echo $movimiento['tipo']; ?>&nbsp;</td>
		<td><?php echo $movimiento['importe']; ?>&nbsp;</td>
		<td class="actions">
		<?php echo $this->Html->link(__('Ver', true), array('controller' => 'Movimientos','action' => 'view', $movimiento['id'])); ?>
		<?php echo $this->Html->link(__('Editar', true), array('controller' => 'Movimientos','action' => 'edit', $movimiento['id'])); ?>
		<?php echo $this->Html->link(__('Borrar', true), array('controller' => 'Movimientos','action' => 'delete', $movimiento['id']), null, sprintf(__('Está seguro que desea borrar # %s?', true), $movimiento['id'])); ?>
		</td>
		<?php $totalMovimientos = $totalMovimientos + $movimiento['importe']; ?>
	</tr>
	<?php endforeach; ?>
</table>	
</div>
<div id="diferenciaOperacion">
	<?php (FLOAT)$diferencia = (FLOAT)$totalFlujos - (FLOAT)$totalMovimientos;
	echo '<label>SALDO: $'.$diferencia.'</label>';
	echo $this->Form->hidden('Saldo', array('value' => $diferencia));
	echo $this->Form->hidden('Cotizacion', array('value' => $cotizacion['Cotizacion']['id']));
	if ($diferencia > 0) {
		echo $this->Form->button('Descontar Vuelto', array('onclick'=>"crearVuelto()"));
	} else if ($diferencia == 0) { ?>
		<div id="TerminarOperacion">
		<?php echo $this->Form->button('Terminar',array('id'=>'Terminar','type'=>'button')); ?>
		</div>
	<?php } ?>
</div>
