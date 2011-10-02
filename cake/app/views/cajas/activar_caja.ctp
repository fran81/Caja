<div class="cajas index">
	<h2><?php __('Cajas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('fecha');?></th>
			<th><?php echo $this->Paginator->sort('cuenta_id');?></th>
			<th><?php echo $this->Paginator->sort('activar');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($cajas as $caja):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $caja['Caja']['fecha']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($caja['Cuenta']['numero'], array('controller' => 'cuentas', 'action' => 'view', $caja['Cuenta']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link('Activar', array('controller' => 'Cajas', 'action' => 'activar',$caja['Caja']['id'])); ?>
	</tr>
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
