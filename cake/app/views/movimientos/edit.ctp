<div class="movimientos form">
<?php echo $this->Form->create('Movimiento');?>
	<fieldset>
		<legend><?php __('Editar Movimiento'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('concepto');
		echo $this->Form->input('importe');
		echo $this->Form->input('nro_boleta');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php echo $this->element('acordion_acciones'); ?>
