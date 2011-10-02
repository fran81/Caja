<div class="cajas view">
<h2><?php  __('Caja');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $caja['Caja']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fecha'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $caja['Caja']['fecha']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total Aporte'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $caja['Caja']['total_aporte']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total Otro Ingreso'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $caja['Caja']['total_otro_ingreso']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total Ingreso'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $caja['Caja']['total_ingreso']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total Cuenta Puente'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $caja['Caja']['total_cuenta_puente']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total Deposito Cheque'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $caja['Caja']['total_deposito_cheque']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total Deposito Efectivo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $caja['Caja']['total_deposito_efectivo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total Moneda Extranjera'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $caja['Caja']['total_moneda_extranjera']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total Reemplazo Valor'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $caja['Caja']['total_reemplazo_valor']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total Egreso'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $caja['Caja']['total_egreso']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Caja'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($caja['Caja']['id'], array('controller' => 'cajas', 'action' => 'view', $caja['Caja']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cuenta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($caja['Cuenta']['id'], array('controller' => 'cuentas', 'action' => 'view', $caja['Cuenta']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $caja['Caja']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $caja['Caja']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($caja['User']['id'], array('controller' => 'users', 'action' => 'view', $caja['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Caja', true), array('action' => 'edit', $caja['Caja']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Caja', true), array('action' => 'delete', $caja['Caja']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $caja['Caja']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cajas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Caja', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cajas', true), array('controller' => 'cajas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Caja', true), array('controller' => 'cajas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cuentas', true), array('controller' => 'cuentas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuenta', true), array('controller' => 'cuentas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Detalle Recaudacions', true), array('controller' => 'detalle_recaudacions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detalle Recaudacion', true), array('controller' => 'detalle_recaudacions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Operacions', true), array('controller' => 'operacions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Operacion', true), array('controller' => 'operacions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Cajas');?></h3>
	<?php if (!empty($caja['Caja'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Fecha'); ?></th>
		<th><?php __('Total Aporte'); ?></th>
		<th><?php __('Total Otro Ingreso'); ?></th>
		<th><?php __('Total Ingreso'); ?></th>
		<th><?php __('Total Cuenta Puente'); ?></th>
		<th><?php __('Total Deposito Cheque'); ?></th>
		<th><?php __('Total Deposito Efectivo'); ?></th>
		<th><?php __('Total Moneda Extranjera'); ?></th>
		<th><?php __('Total Reemplazo Valor'); ?></th>
		<th><?php __('Total Egreso'); ?></th>
		<th><?php __('Caja Id'); ?></th>
		<th><?php __('Cuenta Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($caja['Caja'] as $caja):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $caja['id'];?></td>
			<td><?php echo $caja['fecha'];?></td>
			<td><?php echo $caja['total_aporte'];?></td>
			<td><?php echo $caja['total_otro_ingreso'];?></td>
			<td><?php echo $caja['total_ingreso'];?></td>
			<td><?php echo $caja['total_cuenta_puente'];?></td>
			<td><?php echo $caja['total_deposito_cheque'];?></td>
			<td><?php echo $caja['total_deposito_efectivo'];?></td>
			<td><?php echo $caja['total_moneda_extranjera'];?></td>
			<td><?php echo $caja['total_reemplazo_valor'];?></td>
			<td><?php echo $caja['total_egreso'];?></td>
			<td><?php echo $caja['caja_id'];?></td>
			<td><?php echo $caja['cuenta_id'];?></td>
			<td><?php echo $caja['created'];?></td>
			<td><?php echo $caja['modified'];?></td>
			<td><?php echo $caja['user_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'cajas', 'action' => 'view', $caja['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'cajas', 'action' => 'edit', $caja['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'cajas', 'action' => 'delete', $caja['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $caja['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Caja', true), array('controller' => 'cajas', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Detalle Recaudacions');?></h3>
	<?php if (!empty($caja['DetalleRecaudacion'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Ingreso'); ?></th>
		<th><?php __('Egreso'); ?></th>
		<th><?php __('Saldo Inicial'); ?></th>
		<th><?php __('Saldo Final'); ?></th>
		<th><?php __('Tipo'); ?></th>
		<th><?php __('Caja Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($caja['DetalleRecaudacion'] as $detalleRecaudacion):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $detalleRecaudacion['id'];?></td>
			<td><?php echo $detalleRecaudacion['ingreso'];?></td>
			<td><?php echo $detalleRecaudacion['egreso'];?></td>
			<td><?php echo $detalleRecaudacion['saldo_inicial'];?></td>
			<td><?php echo $detalleRecaudacion['saldo_final'];?></td>
			<td><?php echo $detalleRecaudacion['tipo'];?></td>
			<td><?php echo $detalleRecaudacion['caja_id'];?></td>
			<td><?php echo $detalleRecaudacion['created'];?></td>
			<td><?php echo $detalleRecaudacion['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'detalle_recaudacions', 'action' => 'view', $detalleRecaudacion['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'detalle_recaudacions', 'action' => 'edit', $detalleRecaudacion['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'detalle_recaudacions', 'action' => 'delete', $detalleRecaudacion['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $detalleRecaudacion['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Detalle Recaudacion', true), array('controller' => 'detalle_recaudacions', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Operacions');?></h3>
	<?php if (!empty($caja['Operacion'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Responsable Id'); ?></th>
		<th><?php __('Caja Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($caja['Operacion'] as $operacion):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $operacion['id'];?></td>
			<td><?php echo $operacion['responsable_id'];?></td>
			<td><?php echo $operacion['caja_id'];?></td>
			<td><?php echo $operacion['created'];?></td>
			<td><?php echo $operacion['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'operacions', 'action' => 'view', $operacion['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'operacions', 'action' => 'edit', $operacion['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'operacions', 'action' => 'delete', $operacion['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $operacion['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Operacion', true), array('controller' => 'operacions', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
