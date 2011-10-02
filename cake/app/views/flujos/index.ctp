<div class="flujos index">
	<h2><?php __('Flujos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('tipo');?></th>
			<th><?php echo $this->Paginator->sort('cheque_id');?></th>
			<th><?php echo $this->Paginator->sort('efectivo_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('operacion_id');?></th>
			<th><?php echo $this->Paginator->sort('cuenta_puente_id');?></th>
			<th><?php echo $this->Paginator->sort('estado');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($flujos as $flujo):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $flujo['Flujo']['id']; ?>&nbsp;</td>
		<td><?php echo $flujo['Flujo']['tipo']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($flujo['Cheque']['id'], array('controller' => 'cheques', 'action' => 'view', $flujo['Cheque']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($flujo['Efectivo']['id'], array('controller' => 'efectivos', 'action' => 'view', $flujo['Efectivo']['id'])); ?>
		</td>
		<td><?php echo $flujo['Flujo']['created']; ?>&nbsp;</td>
		<td><?php echo $flujo['Flujo']['modified']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($flujo['Operacion']['id'], array('controller' => 'operacions', 'action' => 'view', $flujo['Operacion']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($flujo['CuentaPuente']['id'], array('controller' => 'cuenta_puentes', 'action' => 'view', $flujo['CuentaPuente']['id'])); ?>
		</td>
		<td><?php echo $flujo['Flujo']['estado']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $flujo['Flujo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $flujo['Flujo']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $flujo['Flujo']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $flujo['Flujo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Flujo', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cheques', true), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque', true), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Efectivos', true), array('controller' => 'efectivos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Efectivo', true), array('controller' => 'efectivos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Operacions', true), array('controller' => 'operacions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Operacion', true), array('controller' => 'operacions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cuenta Puentes', true), array('controller' => 'cuenta_puentes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuenta Puente', true), array('controller' => 'cuenta_puentes', 'action' => 'add')); ?> </li>
	</ul>
</div>