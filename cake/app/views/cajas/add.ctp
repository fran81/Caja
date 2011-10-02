<div class="cajas form">
<?php echo $this->Form->create('Caja');?>
	<fieldset>
		<legend><?php __('Add Caja'); ?></legend>
	<?php
		echo $this->Form->input('fecha');
		echo $this->Form->input('total_aporte');
		echo $this->Form->input('total_otro_ingreso');
		echo $this->Form->input('total_ingreso');
		echo $this->Form->input('total_cuenta_puente');
		echo $this->Form->input('total_deposito_cheque');
		echo $this->Form->input('total_deposito_efectivo');
		echo $this->Form->input('total_moneda_extranjera');
		echo $this->Form->input('total_reemplazo_valor');
		echo $this->Form->input('total_egreso');
		echo $this->Form->input('caja_id');
		echo $this->Form->input('cuenta_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Cajas', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Cajas', true), array('controller' => 'cajas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Caja', true), array('controller' => 'cajas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cuentas', true), array('controller' => 'cuentas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuenta', true), array('controller' => 'cuentas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Detalle Recaudacions', true), array('controller' => 'detalle_recaudacions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detalle Recaudacion', true), array('controller' => 'detalle_recaudacions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Operacions', true), array('controller' => 'operacions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Operacion', true), array('controller' => 'operacions', 'action' => 'add')); ?> </li>
	</ul>
</div>