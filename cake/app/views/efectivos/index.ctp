<div class="efectivos index">
	<h2><?php __('Efectivos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('ajuste_cotizacion');?></th>
			<th><?php echo $this->Paginator->sort('importe');?></th>
			<th><?php echo $this->Paginator->sort('moneda_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($efectivos as $efectivo):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $efectivo['Efectivo']['id']; ?>&nbsp;</td>
		<td><?php echo $efectivo['Efectivo']['ajuste_cotizacion']; ?>&nbsp;</td>
		<td><?php echo $efectivo['Efectivo']['importe']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($efectivo['Moneda']['id'], array('controller' => 'monedas', 'action' => 'view', $efectivo['Moneda']['id'])); ?>
		</td>
		<td><?php echo $efectivo['Efectivo']['created']; ?>&nbsp;</td>
		<td><?php echo $efectivo['Efectivo']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $efectivo['Efectivo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $efectivo['Efectivo']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $efectivo['Efectivo']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $efectivo['Efectivo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Efectivo', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Monedas', true), array('controller' => 'monedas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Moneda', true), array('controller' => 'monedas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Flujos', true), array('controller' => 'flujos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Flujo', true), array('controller' => 'flujos', 'action' => 'add')); ?> </li>
	</ul>
</div>