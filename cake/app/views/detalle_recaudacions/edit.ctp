<div class="detalleRecaudacions form">
<?php echo $this->Form->create('DetalleRecaudacion');?>
	<fieldset>
		<legend><?php __('Edit Detalle Recaudacion'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('ingreso');
		echo $this->Form->input('egreso');
		echo $this->Form->input('saldo_inicial');
		echo $this->Form->input('saldo_final');
		echo $this->Form->input('tipo');
		echo $this->Form->input('caja_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('DetalleRecaudacion.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('DetalleRecaudacion.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Detalle Recaudacions', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Cajas', true), array('controller' => 'cajas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Caja', true), array('controller' => 'cajas', 'action' => 'add')); ?> </li>
	</ul>
</div>