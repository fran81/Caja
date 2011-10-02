<div class="movimientos view">
<h2><?php  __('Movimiento');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Concepto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $movimiento['Movimiento']['concepto']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Importe'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $movimiento['Movimiento']['importe']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nro Boleta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $movimiento['Movimiento']['nro_boleta']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Operacion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($movimiento['Operacion']['created'], array('controller' => 'operacions', 'action' => 'view', $movimiento['Operacion']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->element('acordion_acciones'); ?>

