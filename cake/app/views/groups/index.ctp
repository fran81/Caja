<?php
	echo $this->Html->script(array(
		'jquery/development-bundle/ui/jquery.ui.widget',
		'jquery/development-bundle/ui/jquery.ui.button',
		'botones.index'
	), array('inline' => false));
?>
<div class="groups index">
	<h2><?php __('Groups');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('denominación');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($groups as $group):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $group['Group']['denominacion']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $group['Group']['id']),array('class'=>'ver')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $group['Group']['id']),array('class'=>'editar')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $group['Group']['id']),array('class'=>'borrar'), sprintf(__('Are you sure you want to delete # %s?', true), $group['Group']['id'])); ?>
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
