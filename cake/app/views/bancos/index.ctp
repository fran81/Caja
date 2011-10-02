<?php
	echo $this->Html->script(array(
		'/app/webroot/js/jquery/js/jquery-1.6.2.min',
		'jquery/development-bundle/ui/jquery.ui.widget',
		'jquery/development-bundle/ui/jquery.ui.button',
		'botones.index'
	), array('inline' => false));
?>
<div class="bancos index">
	<h2><?php __('Bancos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('denominación');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($bancos as $banco):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $banco['Banco']['denominacion_banco']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $banco['Banco']['id']),array('class'=>'ver')); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $banco['Banco']['id']),array('class'=>'editar')); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $banco['Banco']['id']),array('class'=>'borrar'), sprintf(__('Está seguro que desea borrar # %s?', true), $banco['Banco']['denominacion_banco'])); ?>
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
