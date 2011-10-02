<div class="rechazos form">
<?php echo $this->Form->create('Rechazo');?>
	<fieldset>
		<legend><?php __('Add Rechazo'); ?></legend>
	<?php
		echo $this->Form->input('fecha');
		echo $this->Form->input('motivo');
		echo $this->Form->input('comision');
		echo $this->Form->input('cheque_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Rechazos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Cheques', true), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque', true), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
	</ul>
</div>