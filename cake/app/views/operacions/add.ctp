<div class="operacions form">
<?php echo $this->Form->create('Operacion');?>
	<fieldset>
		<legend><?php __('Add Operacion'); ?></legend>
	<?php
		echo $this->Form->input('responsable_id');
		echo $this->Form->input('caja_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Operacions', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Responsables', true), array('controller' => 'responsables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Responsable', true), array('controller' => 'responsables', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cajas', true), array('controller' => 'cajas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Caja', true), array('controller' => 'cajas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Flujos', true), array('controller' => 'flujos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Flujo', true), array('controller' => 'flujos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Movimientos', true), array('controller' => 'movimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Movimiento', true), array('controller' => 'movimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>