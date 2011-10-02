<div class="operacions index">
	<h2><?php __('Operacions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('responsable_id');?></th>
			<th><?php echo $this->Paginator->sort('caja_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($operacions as $operacion):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $operacion['Operacion']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($operacion['Responsable']['id'], array('controller' => 'responsables', 'action' => 'view', $operacion['Responsable']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($operacion['Caja']['id'], array('controller' => 'cajas', 'action' => 'view', $operacion['Caja']['id'])); ?>
		</td>
		<td><?php echo $operacion['Operacion']['created']; ?>&nbsp;</td>
		<td><?php echo $operacion['Operacion']['modified']; ?>&nbsp;</td>
		<td><?php echo $operacion['Operacion']['user_id']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $operacion['Operacion']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $operacion['Operacion']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $operacion['Operacion']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $operacion['Operacion']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Operacion', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Responsables', true), array('controller' => 'responsables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Responsable', true), array('controller' => 'responsables', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cajas', true), array('controller' => 'cajas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Caja', true), array('controller' => 'cajas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Flujos', true), array('controller' => 'flujos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Flujo', true), array('controller' => 'flujos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Movimientos', true), array('controller' => 'movimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Movimiento', true), array('controller' => 'movimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
