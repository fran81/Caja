<div class="monedas view">
<h2><?php  __('Moneda');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moneda['Moneda']['nombre']; ?>
			&nbsp;
		</dd>
</div>
<?php echo $this->element('acordion_acciones'); ?>
<div class="related">
	<h3><?php __('Cotizaciones Relacionadas');?></h3>
	<?php if (!empty($moneda['Cotizacion'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Fecha Desde'); ?></th>
		<th><?php __('Fecha Hasta'); ?></th>
		<th><?php __('Importe'); ?></th>
		<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($moneda['Cotizacion'] as $cotizacion):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $cotizacion['fecha_desde'];?></td>
			<td><?php echo $cotizacion['fecha_hasta'];?></td>
			<td><?php echo $cotizacion['importe'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver', true), array('controller' => 'cotizacions', 'action' => 'view', $cotizacion['id'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'cotizacions', 'action' => 'edit', $cotizacion['id'])); ?>
				<?php echo $this->Html->link(__('Borrar', true), array('controller' => 'cotizacions', 'action' => 'delete', $cotizacion['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $cotizacion['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>

