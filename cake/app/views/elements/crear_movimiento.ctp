<div class="movimientos element">
<?php echo $this->Form->create('Movimiento');?>
	<fieldset>
		<legend><?php __('Add Movimiento'); ?></legend>
	<?php
		echo $this->Form->select('tipo', array('Cuota prestamo' => 'cuota', 'Aporte' => 'aporte', 'Ingreso vario' => 'vario', 'Sellado' => 'sellado'));
		echo $this->Form->input('concepto');
		echo $this->Form->input('importe');
		echo $this->Form->input('nro_boleta');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Crear', true));?>
</div>

