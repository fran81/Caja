<?php
	echo $this->Html->script(array(
		'jquery/development-bundle/ui/jquery.ui.widget',
		'jquery/development-bundle/ui/jquery.ui.button',
		'botones.index'
	), array('inline' => false));
?>
<div class="sellados index">
	<h2><?php __('Sellados');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('nro_prestamo');?></th>
			<th><?php echo $this->Paginator->sort('importe_prestamo');?></th>
			<th><?php echo $this->Paginator->sort('movimiento_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($sellados as $sellado):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $sellado['Sellado']['id']; ?>&nbsp;</td>
		<td><?php echo $sellado['Sellado']['nro_prestamo']; ?>&nbsp;</td>
		<td><?php echo $sellado['Sellado']['importe_prestamo']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($sellado['Movimiento']['id'], array('controller' => 'movimientos', 'action' => 'view', $sellado['Movimiento']['id'])); ?>
		</td>
		<td><?php echo $sellado['Sellado']['created']; ?>&nbsp;</td>
		<td><?php echo $sellado['Sellado']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $sellado['Sellado']['id']),array('class'=>'ver')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $sellado['Sellado']['id']),array('class'=>'editar')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $sellado['Sellado']['id']),array('class'=>'borrar'), sprintf(__('Are you sure you want to delete # %s?', true), $sellado['Sellado']['id'])); ?>
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
<?php echo $this->element('acordion_acciones'); ?>
