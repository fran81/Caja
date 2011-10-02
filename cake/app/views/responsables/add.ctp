<div class="responsables form">
<?php echo $this->Form->create('Responsable');?>
	<fieldset>
		<legend><?php __('Cargar Responsable'); ?></legend>
	<?php
		echo $this->Form->input('apellido');
		echo $this->Form->input('nombre');
		echo $this->Form->select('tipo_responsable',array('Empleado' => 'Empleado','Escribano' => 'Escribano'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<?php echo $this->element('acordion_acciones'); ?>
