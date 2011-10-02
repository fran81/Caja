<div class="users view">
<h2><?php  __('User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Username'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['username']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Password'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['password']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Grupo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($user['Group']['denominacion'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Responsable'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($user['Responsable']['nombre'], array('controller' => 'responsables', 'action' => 'view', $user['Responsable']['id'])); ?>
			<?php echo $this->Html->link($user['Responsable']['apellido'], array('controller' => 'responsables', 'action' => 'view', $user['Responsable']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->element('acordion_acciones'); ?>
<div class="related">
	<h3><?php __('Cajas Relacionadas');?></h3>
	<?php if (!empty($user['Caja'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
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
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Caja'] as $caja):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
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
			<td class="actions">
				<?php echo $this->Html->link(__('Ver', true), array('controller' => 'cajas', 'action' => 'view', $caja['id'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'cajas', 'action' => 'edit', $caja['id'])); ?>
				<?php echo $this->Html->link(__('Borrar', true), array('controller' => 'cajas', 'action' => 'delete', $caja['id']), null, sprintf(__('Está seguro que desea borrar # %s?', true), $caja['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
