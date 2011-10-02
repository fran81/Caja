<div class="detalleRecaudacions index">
	<h2><?php __('Detalle Recaudacions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('ingreso');?></th>
			<th><?php echo $this->Paginator->sort('egreso');?></th>
			<th><?php echo $this->Paginator->sort('saldo_inicial');?></th>
			<th><?php echo $this->Paginator->sort('saldo_final');?></th>
			<th><?php echo $this->Paginator->sort('tipo');?></th>
			<th><?php echo $this->Paginator->sort('caja_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($detalleRecaudacions as $detalleRecaudacion):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $detalleRecaudacion['DetalleRecaudacion']['id']; ?>&nbsp;</td>
		<td><?php echo $detalleRecaudacion['DetalleRecaudacion']['ingreso']; ?>&nbsp;</td>
		<td><?php echo $detalleRecaudacion['DetalleRecaudacion']['egreso']; ?>&nbsp;</td>
		<td><?php echo $detalleRecaudacion['DetalleRecaudacion']['saldo_inicial']; ?>&nbsp;</td>
		<td><?php echo $detalleRecaudacion['DetalleRecaudacion']['saldo_final']; ?>&nbsp;</td>
		<td><?php echo $detalleRecaudacion['DetalleRecaudacion']['tipo']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($detalleRecaudacion['Caja']['id'], array('controller' => 'cajas', 'action' => 'view', $detalleRecaudacion['Caja']['id'])); ?>
		</td>
		<td><?php echo $detalleRecaudacion['DetalleRecaudacion']['created']; ?>&nbsp;</td>
		<td><?php echo $detalleRecaudacion['DetalleRecaudacion']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $detalleRecaudacion['DetalleRecaudacion']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $detalleRecaudacion['DetalleRecaudacion']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $detalleRecaudacion['DetalleRecaudacion']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $detalleRecaudacion['DetalleRecaudacion']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Detalle Recaudacion', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cajas', true), array('controller' => 'cajas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Caja', true), array('controller' => 'cajas', 'action' => 'add')); ?> </li>
	</ul>
</div>
