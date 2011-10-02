<?php
	echo $this->Html->script(array(
		'jquery/development-bundle/ui/jquery.ui.widget',
		'jquery/development-bundle/ui/jquery.ui.button',
		'botones.index'
	), array('inline' => false));
?>
<div class="monedas index">
	<h2><?php __('Monedas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($monedas as $moneda):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $moneda['Moneda']['nombre']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $moneda['Moneda']['id']),array('class'=>'ver')); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $moneda['Moneda']['id']),array('class'=>'editar')); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $moneda['Moneda']['id']),array('class'=>'borrar'), sprintf(__('Está seguro que desea borrar # %s?', true), $moneda['Moneda']['id'])); ?>
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
		<?php echo $this->Paginator->prev('<< ' . __('anterior', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('siguiente', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<?php echo $this->element('acordion_acciones'); ?>