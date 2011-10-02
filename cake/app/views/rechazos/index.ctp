<div class="rechazos index">
	<h2><?php __('Rechazos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('fecha');?></th>
			<th><?php echo $this->Paginator->sort('motivo');?></th>
			<th><?php echo $this->Paginator->sort('comision');?></th>
			<th><?php echo $this->Paginator->sort('cheque_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($rechazos as $rechazo):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $rechazo['Rechazo']['id']; ?>&nbsp;</td>
		<td><?php echo $rechazo['Rechazo']['fecha']; ?>&nbsp;</td>
		<td><?php echo $rechazo['Rechazo']['motivo']; ?>&nbsp;</td>
		<td><?php echo $rechazo['Rechazo']['comision']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($rechazo['Cheque']['id'], array('controller' => 'cheques', 'action' => 'view', $rechazo['Cheque']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $rechazo['Rechazo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $rechazo['Rechazo']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $rechazo['Rechazo']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $rechazo['Rechazo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Rechazo', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cheques', true), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque', true), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
	</ul>
</div>