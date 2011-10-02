<div class="operacions view">
<h2><?php  __('Operacion');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $operacion['Operacion']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Responsable'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($operacion['Responsable']['id'], array('controller' => 'responsables', 'action' => 'view', $operacion['Responsable']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Caja'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($operacion['Caja']['id'], array('controller' => 'cajas', 'action' => 'view', $operacion['Caja']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Creada'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $operacion['Operacion']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modificada'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $operacion['Operacion']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Usuario'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($operacion['User']['username'], array('controller' => 'Users', 'action' => 'view', $operacion['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->element('acordion_acciones'); ?>
<div class="related">
	<h3><?php __('Flujos Relacionados');?></h3>
	<?php if (!empty($operacion['Flujo'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Tipo'); ?></th>
		<th><?php __('Cheque Id'); ?></th>
		<th><?php __('Efectivo Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Operacion Id'); ?></th>
		<th><?php __('Cuenta Puente Id'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($operacion['Flujo'] as $flujo):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $flujo['id'];?></td>
			<td><?php echo $flujo['tipo'];?></td>
			<td><?php echo $flujo['cheque_id'];?></td>
			<td><?php echo $flujo['efectivo_id'];?></td>
			<td><?php echo $flujo['created'];?></td>
			<td><?php echo $flujo['modified'];?></td>
			<td><?php echo $flujo['operacion_id'];?></td>
			<td><?php echo $flujo['cuenta_puente_id'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="related">
	<h3><?php __('Movimientos Relacionados');?></h3>
	<?php if (!empty($operacion['Movimiento'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Concepto'); ?></th>
		<th><?php __('Importe'); ?></th>
		<th><?php __('Nro Boleta'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Operacion Id'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($operacion['Movimiento'] as $movimiento):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $movimiento['id'];?></td>
			<td><?php echo $movimiento['concepto'];?></td>
			<td><?php echo $movimiento['importe'];?></td>
			<td><?php echo $movimiento['nro_boleta'];?></td>
			<td><?php echo $movimiento['created'];?></td>
			<td><?php echo $movimiento['modified'];?></td>
			<td><?php echo $movimiento['operacion_id'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
