<div class="cuentas view">
<h2><?php  __('Cuenta');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Numero'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cuenta['Cuenta']['numero']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cbu'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cuenta['Cuenta']['cbu']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Banco'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($cuenta['Banco']['denominacion_banco'], array('controller' => 'bancos', 'action' => 'view', $cuenta['Banco']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->element('acordion_acciones'); ?>
<div class="related">
	<h3><?php __('Cajas Relacionadas');?></h3>
	<?php if (!empty($cuenta['Caja'])):?>
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
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($cuenta['Caja'] as $caja):
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
			<td><?php echo $caja['created'];?></td>
			<td><?php echo $caja['modified'];?></td>
			<td><?php echo $caja['user_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver', true), array('controller' => 'cajas', 'action' => 'view', $caja['id'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'cajas', 'action' => 'edit', $caja['id'])); ?>
				<?php echo $this->Html->link(__('Borrar', true), array('controller' => 'cajas', 'action' => 'delete', $caja['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $caja['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
