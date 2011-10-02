<div class="cotizacions view">
<h2><?php  __('Cotización');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fecha Desde'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cotizacion['Cotizacion']['fecha_desde']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fecha Hasta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cotizacion['Cotizacion']['fecha_hasta']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Importe'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cotizacion['Cotizacion']['importe']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Moneda'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($cotizacion['Moneda']['nombre'], array('controller' => 'monedas', 'action' => 'view', $cotizacion['Moneda']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->element('acordion_acciones'); ?>
