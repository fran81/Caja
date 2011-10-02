<div class="efectivos form">
<?php echo $this->Form->create('Efectivo');?>
	<fieldset>
		<legend><?php __('Add Efectivo'); ?></legend>
	<?php
		echo $this->Form->input('ajuste_cotizacion');
		echo $this->Form->input('importe');
		echo $this->Form->input('moneda_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Efectivos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Monedas', true), array('controller' => 'monedas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Moneda', true), array('controller' => 'monedas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Flujos', true), array('controller' => 'flujos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Flujo', true), array('controller' => 'flujos', 'action' => 'add')); ?> </li>
	</ul>
</div>