<div class="sellados form">
<?php echo $this->Form->create('Sellado');?>
	<fieldset>
		<legend><?php __('Add Sellado'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Sellados', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Movimientos', true), array('controller' => 'movimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Movimiento', true), array('controller' => 'movimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>