<div class="cajas form">
<?php echo $this->Form->create('Caja');?>
	<fieldset>
		<legend><?php __('Activar Caja'); ?></legend>
	<?php
		echo $this->Form->input('cuenta_id');
		echo $this->Form->select('caja_id',$listcaja);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Activar', true));?>
</div>
<?php echo $this->element('acordion_acciones'); ?>
