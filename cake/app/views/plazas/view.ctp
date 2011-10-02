<div class="plazas view">
<h2><?php  __('Plaza');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Denominacion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $plaza['Plaza']['denominacion_plaza']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Banco'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($plaza['Banco']['denominacion_banco'], array('controller' => 'bancos', 'action' => 'view', $plaza['Banco']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->element('acordion_acciones'); ?>
<div class="related">
	<h3><?php __('Cheques Relacionados');?></h3>
	<?php if (!empty($plaza['Cheque'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Numero'); ?></th>
		<th><?php __('Importe'); ?></th>
		<th><?php __('Fecha Cobro'); ?></th>
		<th><?php __('Fecha Limite'); ?></th>
		<th><?php __('Estado'); ?></th>
		<th><?php __('Tipo'); ?></th>
		<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($plaza['Cheque'] as $cheque):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $cheque['numero'];?></td>
			<td><?php echo $cheque['importe'];?></td>
			<td><?php echo $cheque['fecha_cobro'];?></td>
			<td><?php echo $cheque['fecha_limite'];?></td>
			<td><?php echo $cheque['estado'];?></td>
			<td><?php echo $cheque['tipo'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver', true), array('controller' => 'cheques', 'action' => 'view', $cheque['id'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'cheques', 'action' => 'edit', $cheque['id'])); ?>
				<?php echo $this->Html->link(__('Borrar', true), array('controller' => 'cheques', 'action' => 'delete', $cheque['id']), null, sprintf(__('Está seguro que desea borrar # %s?', true), $cheque['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
