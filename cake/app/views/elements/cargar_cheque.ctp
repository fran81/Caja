<div class="cheques element">
<?php echo $this->Form->create('Cheque');?>
	<fieldset>
		<legend><?php __('Cargar Cheque'); ?></legend>
	<?php
		echo $this->Form->input('numero');
		echo $this->Form->input('importe');
		echo $this->Form->radio('tipo',
			array('corriente'=>'Corriente','diferido'=>'Diferido','canje'=>'Para Canje'),
			array('value'=>'corriente'));
		echo $this->Form->input('fecha_cobro', array('dateFormat'=>'DMY'));
		echo $this->Form->input('responsable_id');
		echo $this->Form->select("Plaza", $listdata);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Cargar', true));?>
</div>

