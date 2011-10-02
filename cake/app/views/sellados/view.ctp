<div class="sellados view">
<h2><?php  __('Sellado');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $sellado['Sellado']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nro Prestamo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $sellado['Sellado']['nro_prestamo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Importe Prestamo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $sellado['Sellado']['importe_prestamo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Movimiento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($sellado['Movimiento']['id'], array('controller' => 'movimientos', 'action' => 'view', $sellado['Movimiento']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $sellado['Sellado']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $sellado['Sellado']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sellado', true), array('action' => 'edit', $sellado['Sellado']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Sellado', true), array('action' => 'delete', $sellado['Sellado']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $sellado['Sellado']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sellados', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sellado', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Movimientos', true), array('controller' => 'movimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Movimiento', true), array('controller' => 'movimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
