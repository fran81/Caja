<div class="flujos form">
<?php echo $this->Form->create('Flujo');?>
	<fieldset>
		<legend><?php __('Edit Flujo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tipo');
		echo $this->Form->input('cheque_id');
		echo $this->Form->input('efectivo_id');
		echo $this->Form->input('operacion_id');
		echo $this->Form->input('cuenta_puente_id');
		echo $this->Form->input('estado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Flujo.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Flujo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Flujos', true), array('action' => 'index'));?></li>
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