<div class="monedas form">
<?php echo $this->Form->create('Moneda');?>
	<fieldset>
		<legend><?php __('Editar Moneda'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<?php echo $this->element('acordion_acciones'); ?>
