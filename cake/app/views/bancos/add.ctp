<?php
	echo $this->Html->script(array(
		'jquery/development-bundle/ui/jquery.ui.widget',
		'jquery/development-bundle/ui/jquery.ui.button'
	), array('inline' => false));
	
	$this->Js->buffer("$('.boton').button();");
?>
<div class="bancos form">
<?php echo $this->Form->create('Banco');?>
	<fieldset>
		<legend><?php __('Cargar Banco'); ?></legend>
	<?php
		echo $this->Form->input('denominacion_banco');
	?>
	</fieldset>
<?php echo $this->Form->end(array('label'=>'Cargar', 'class'=>'boton'));?>
</div>
<?php echo $this->element('acordion_acciones'); ?>
