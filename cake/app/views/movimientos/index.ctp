<div class="movimientos index">
	<h2><?php __('Movimientos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('concepto');?></th>
			<th><?php echo $this->Paginator->sort('importe');?></th>
			<th><?php echo $this->Paginator->sort('nro_boleta');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('operacion_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($movimientos as $movimiento):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $movimiento['Movimiento']['id']; ?>&nbsp;</td>
		<td><?php echo $movimiento['Movimiento']['concepto']; ?>&nbsp;</td>
		<td><?php echo $movimiento['Movimiento']['importe']; ?>&nbsp;</td>
		<td><?php echo $movimiento['Movimiento']['nro_boleta']; ?>&nbsp;</td>
		<td><?php echo $movimiento['Movimiento']['created']; ?>&nbsp;</td>
		<td><?php echo $movimiento['Movimiento']['modified']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($movimiento['Operacion']['id'], array('controller' => 'operacions', 'action' => 'view', $movimiento['Operacion']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $movimiento['Movimiento']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $movimiento['Movimiento']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $movimiento['Movimiento']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $movimiento['Movimiento']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Movimiento', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Operacions', true), array('controller' => 'operacions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Operacion', true), array('controller' => 'operacions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sellados', true), array('controller' => 'sellados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sellado', true), array('controller' => 'sellados', 'action' => 'add')); ?> </li>
	</ul>
</div>