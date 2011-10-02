<div class="bancos form">
<?php echo $this->Form->create('Banco');?>
	<fieldset>
		<legend><?php __('Editar Banco'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('denominacion_banco');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<?php echo $this->element('acordion_acciones'); ?>
