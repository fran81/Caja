<div class="cheques form">
<?php echo $this->Form->create('Cheque');?>
	<fieldset>
		<legend><?php __('Add Cheque'); ?></legend>
	<?php
		echo $this->Form->input('numero');
		echo $this->Form->input('importe');
		echo $this->Form->input('fecha_cobro');
		echo $this->Form->input('fecha_limite');
		echo $this->Form->input('estado');
		echo $this->Form->input('tipo');
		echo $this->Form->input('responsable_id');
		echo $this->Form->input('plaza_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Cheques', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Responsables', true), array('controller' => 'responsables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Responsable', true), array('controller' => 'responsables', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Plazas', true), array('controller' => 'plazas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plaza', true), array('controller' => 'plazas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Flujos', true), array('controller' => 'flujos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Flujo', true), array('controller' => 'flujos', 'action' => 'add')); ?> </li>
	</ul>
</div>