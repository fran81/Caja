<div class="movimientos form">
<?php echo $this->Form->create('Movimiento');?>
	<fieldset>
		<legend><?php __('Add Movimiento'); ?></legend>
	<?php
		echo $this->Form->input('concepto');
		echo $this->Form->input('importe');
		echo $this->Form->input('nro_boleta');
		echo $this->Form->input('operacion_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Movimientos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Operacions', true), array('controller' => 'operacions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Operacion', true), array('controller' => 'operacions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sellados', true), array('controller' => 'sellados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sellado', true), array('controller' => 'sellados', 'action' => 'add')); ?> </li>
	</ul>
</div>