<?php
	echo $this->Html->script(array(
		'jquery/development-bundle/ui/jquery.ui.core',
		'jquery/development-bundle/ui/jquery.ui.datepicker',
		'lista.operaciones'
	),
	array('inline' => false));
?>


<div class="operacions index">
	<h2><?php __('Operaciones');?></h2>
	<?php echo $this->Form->create('Operacion');?>
	<fieldset>
		<legend><?php __('Listar Operaciones'); ?></legend>
		<?php echo $this->Form->select('caja', $listcaja); ?>
		<div id="listaOperaciones"></div>
	</fieldset>
</div>
<?php echo $this->element('acordion_acciones'); ?>
