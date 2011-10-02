<div class="flujos element">
<?php echo $this->Form->create('Flujo');?>
	<fieldset>
		<legend><?php __('Add Flujo'); ?></legend>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('concepto');?></th>
			<th><?php echo $this->Paginator->sort('importe');?></th>
	<?php
	$i = 0;
	foreach ($cheques as $cheque):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
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

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
//		$opciones = array('Entrada' => 'entrada', 'Salida' => 'salida');
//		$atributos = array ('value' => 'entrada');
//		echo $this->Form->radio('tipo', array('Entrada', 'Salida'), array ('value' => 'Entrada'));
/**		echo $this->Form->input('cheque_id');
		echo $this->Form->input('efectivo_id');
		echo $this->Form->input('operacion_id');
		echo $this->Form->input('cuenta_puente_id');*/
		echo $this->Element('cargar_cheque');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Crear', true));?>
</div>
