<div class="bancos view">
<h2><?php  __('Banco');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Denominación'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $banco['Banco']['denominacion_banco']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->element('acordion_acciones'); ?>
<div class="related">
	<h3><?php __('Cuentas Relacionadas');?></h3>
	<?php if (!empty($banco['Cuenta'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Número'); ?></th>
		<th><?php __('Cbu'); ?></th>
		<th><?php __('Banco Id'); ?></th>
		<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($banco['Cuenta'] as $cuenta):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $cuenta['numero'];?></td>
			<td><?php echo $cuenta['cbu'];?></td>
			<td><?php echo $cuenta['banco_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver', true), array('controller' => 'cuentas', 'action' => 'view', $cuenta['id'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'cuentas', 'action' => 'edit', $cuenta['id'])); ?>
				<?php echo $this->Html->link(__('Borrar', true), array('controller' => 'cuentas', 'action' => 'delete', $cuenta['id']), null, sprintf(__('Está seguro que desea borrar # %s?', true), $cuenta['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Cargar Cuenta', true), array('controller' => 'cuentas', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Plazas Relacionadas');?></h3>
	<?php if (!empty($banco['Plaza'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Denominación'); ?></th>
		<th><?php __('Banco Id'); ?></th>
		<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($banco['Plaza'] as $plaza):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $plaza['denominacion_plaza'];?></td>
			<td><?php echo $plaza['banco_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver', true), array('controller' => 'plazas', 'action' => 'view', $plaza['id'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'plazas', 'action' => 'edit', $plaza['id'])); ?>
				<?php echo $this->Html->link(__('Borrar', true), array('controller' => 'plazas', 'action' => 'delete', $plaza['id']), null, sprintf(__('Está seguro que desea borrar # %s?', true), $plaza['denominacion_plaza'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Cargar Plaza', true), array('controller' => 'plazas', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
