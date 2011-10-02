<div class="monedas form">
<?php echo $this->Form->create('Moneda');?>
	<fieldset>
		<legend><?php __('Add Moneda'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Monedas', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Cotizacions', true), array('controller' => 'cotizacions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cotizacion', true), array('controller' => 'cotizacions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Efectivos', true), array('controller' => 'efectivos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Efectivo', true), array('controller' => 'efectivos', 'action' => 'add')); ?> </li>
	</ul>
</div>