<?php
	echo $this->Html->script(array(
		'jquery/development-bundle/ui/jquery.ui.core',
		'jquery.ui.datepicker'
	), array('inline' => false));

$datepicker = "$('·fecha_cobro').datepicker({navigationAsDateFormat:true, showOtherMonths:true, buttonImage:'calendar.png', showAnim:'fadeIn', buttonText:'calendario', dateFormat:'dd-mm-yy', duration:'normal'});";

$this->Js->buffer($datepicker); 


 ?>

<div class="cheques form">
<?php echo $this->Form->create('Cheque');?>
	<fieldset>
		<legend><?php __('Cargar Cheque'); ?></legend>
	<?php
		echo $this->Form->input('numero');
		echo $this->Form->input('importe');
		echo $this->Form->radio('tipo',
			array('corriente'=>'Corriente','diferido'=>'Diferido','canje'=>'Para Canje'),
			array('value'=>'corriente'));
		echo $this->Form->dateTime('fecha_cobro', 'DMY', null);
		echo $this->Form->input('responsable_id');
		echo $this->Form->select("plaza_id", $listdata);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Cargar', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Cheques', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Responsables', true), array('controller' => 'responsables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Responsable', true), array('controller' => 'responsables', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Plazas', true), array('controller' => 'plazas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plaza', true), array('controller' => 'plazas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Flujos', true), array('controller' => 'flujos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Flujo', true), array('controller' => 'flujos', 'action' => 'add')); ?> </li>
	</ul>
</div>
