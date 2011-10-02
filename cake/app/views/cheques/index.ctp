<?php
	echo $this->Html->script(array(
		'jquery/development-bundle/ui/jquery.ui.widget',
		'jquery/development-bundle/ui/jquery.ui.button',
		'botones.index'
	), array('inline' => false));
?>
<div class="cheques index">
	<h2><?php __('Cheques');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('número');?></th>
			<th><?php echo $this->Paginator->sort('banco');?></th>
			<th><?php echo $this->Paginator->sort('importe');?></th>
			<th><?php echo $this->Paginator->sort('fecha_cobro');?></th>
			<th><?php echo $this->Paginator->sort('fecha_limite');?></th>
			<th><?php echo $this->Paginator->sort('estado');?></th>
			<th><?php echo $this->Paginator->sort('tipo');?></th>
			<th><?php echo $this->Paginator->sort('apellido');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('plaza_id');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
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
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $cheque['Cheque']['id']),array('class'=>'ver')); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $cheque['Cheque']['id']),array('class'=>'editar')); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $cheque['Cheque']['id']), array('class'=>'borrar'), sprintf(__('Está seguro que desea borrar # %s?', true), $cheque['Cheque']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página %page% de %pages%, mostrando %current% registros de %count%, comenzando en el registro %start%, terminando en el registro %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<?php echo $this->element('acordion_acciones'); ?>
