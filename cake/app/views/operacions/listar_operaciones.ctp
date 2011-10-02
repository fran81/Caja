	<h2><?php __('Operaciones');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('responsable');?></th>
			<th><?php echo $this->Paginator->sort('cantidad_flujos');?></th>
			<th><?php echo $this->Paginator->sort('cantidad_movimientos');?></th>
			<th><?php echo $this->Paginator->sort('importe');?></th>
			<th><?php echo $this->Paginator->sort('fecha_hora');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($operaciones as $operacion):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $operacion['Operacion']['id']; ?>&nbsp;</td>
		<td><?php echo $operacion['Responsable']['apellido']; ?>&nbsp;</td>
		<td><?php echo count($operacion['Flujo']); ?>&nbsp;</td>
		<td><?php echo count($operacion['Movimiento']); ?>&nbsp;</td>
		<td><?php $k = 0;
		$sum = 0;
		foreach ($operacion['Movimiento'] as $movi):
			$sum = $sum + $movi['importe'];
		endforeach;
		echo $sum;?>&nbsp;</td>
		<td><?php echo $operacion['Operacion']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $operacion['Operacion']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $operacion['Operacion']['id'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $operacion['Operacion']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $operacion['Operacion']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página %page% de %pages%, mostrando %current% registros de %count%, comenzando en el registro %start%, terminando en el registro %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>


