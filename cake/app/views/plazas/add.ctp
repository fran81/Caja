<div class="plazas form">
<?php echo $this->Form->create('Plaza');?>
	<fieldset>
		<legend><?php __('Cargar Plaza'); ?></legend>
	<?php
		echo $this->Form->input('denominacion_plaza');
		echo $this->Form->input('banco_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<?php echo $this->element('acordion_acciones'); ?>
