<div class="cuentas form">
<?php echo $this->Form->create('Cuenta');?>
	<fieldset>
		<legend><?php __('Cargar Cuenta'); ?></legend>
	<?php
		echo $this->Form->input('numero');
		echo $this->Form->input('cbu');
		echo $this->Form->input('banco_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<?php echo $this->element('acordion_acciones'); ?>
