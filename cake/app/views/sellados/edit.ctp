<div class="sellados form">
<?php echo $this->Form->create('Sellado');?>
	<fieldset>
		<legend><?php __('Edit Sellado'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nro_prestamo');
		echo $this->Form->input('importe_prestamo');
		echo $this->Form->input('movimiento_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Sellado.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Sellado.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sellados', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Movimientos', true), array('controller' => 'movimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Movimiento', true), array('controller' => 'movimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>