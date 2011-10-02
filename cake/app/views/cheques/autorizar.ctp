<A1>Autorización de Operaciones</A1>
 <?php echo "El responsable " $responsable " ha entregado un cheque por " $arg1 "con fecha limite" $fechaLimite ". Confirme la fecha límite de retención."?>
<div class="autorizar form">
<?php echo $this->Form->create(false, url => array());?>
	<fieldset>
		<legend><?php __('Autorizar Operación'); ?></legend>
	<?php
		echo $this->Form->input('fecha_limite', array('dateFormat'=>'DMY'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
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
