<?php
	echo $this->Html->script(array(
		'jquery/development-bundle/ui/jquery.ui.core',
		'jquery/development-bundle/ui/jquery.ui.datepicker',
		'check.caja'
	),
	array('inline' => false));
	$datepicker = "$('.Fecha').datepicker({navigationAsDateFormat:true, showOtherMonths:true, buttonImage:'calendar.png', showAnim:'fadeIn', buttonText:'calendario', dateFormat:'dd-mm-yy', duration:'normal'});";
	$this->Js->buffer($datepicker);
	$this->Js->buffer("$('#CajaFecha').blur(function (){checkCaja()})");
?>

<div class="cheques index">
	<h2><?php __('Cheques');?></h2>
	<?php echo $this->Form->create('Cheque');?>
	<?php echo $this->Form->input('caja', array('type' => 'text', 'class' => 'Fecha'));?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('depositar');?></th>
			<th><?php echo $this->Paginator->sort('numero');?></th>
			<th><?php echo $this->Paginator->sort('banco');?></th>
			<th><?php echo $this->Paginator->sort('importe');?></th>
			<th><?php echo $this->Paginator->sort('fecha_cobro');?></th>
			<th><?php echo $this->Paginator->sort('fecha_limite');?></th>
			<th><?php echo $this->Paginator->sort('estado');?></th>
			<th><?php echo $this->Paginator->sort('tipo');?></th>
			<th><?php echo $this->Paginator->sort('apellido');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('plaza_id');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($cheques as $cheque):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"'; 
		} else { 
			continue; 
		}
	
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $this->Form->checkbox('cheque'.$i, array('value' => $cheque['Cheque']['id'])) ?></td>
		<td><?php echo $cheque['Cheque']['numero']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cheque['Plaza']['Banco']['denominacion_banco'], array('controller' => 'bancos', 'action' => 'view', $cheque['Plaza']['banco_id'])); ?>
		</td>
		<td><?php echo $cheque['Cheque']['importe']; ?>&nbsp;</td>
		<td><?php echo $cheque['Cheque']['fecha_cobro']; ?>&nbsp;</td>
		<td><?php echo $cheque['Cheque']['fecha_limite']; ?>&nbsp;</td>
		<td><?php echo $cheque['Cheque']['estado']; ?>&nbsp;</td>
		<td><?php echo $cheque['Cheque']['tipo']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cheque['Responsable']['apellido'], array('controller' => 'responsables', 'action' => 'view', $cheque['Responsable']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cheque['Responsable']['nombre'], array('controller' => 'responsables', 'action' => 'view', $cheque['Responsable']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cheque['Plaza']['denominacion_plaza'], array('controller' => 'plazas', 'action' => 'view', $cheque['Plaza']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página %page% de %pages%, mostrando %current% registros de %count%, comenzando en el registro %start%, terminando en %end%', true)
	));

	?>	</p>
	<?php echo $this->Form->end(__('Depositar', true));?>
	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('anterior', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('siguiente', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<?php echo $this->element('acordion_acciones'); ?>
