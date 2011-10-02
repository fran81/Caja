<div class="detalleRecaudacions view">
<h2><?php  __('Detalle Recaudacion');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $detalleRecaudacion['DetalleRecaudacion']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ingreso'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $detalleRecaudacion['DetalleRecaudacion']['ingreso']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Egreso'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $detalleRecaudacion['DetalleRecaudacion']['egreso']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Saldo Inicial'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $detalleRecaudacion['DetalleRecaudacion']['saldo_inicial']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Saldo Final'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $detalleRecaudacion['DetalleRecaudacion']['saldo_final']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tipo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $detalleRecaudacion['DetalleRecaudacion']['tipo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Caja'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($detalleRecaudacion['Caja']['id'], array('controller' => 'cajas', 'action' => 'view', $detalleRecaudacion['Caja']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $detalleRecaudacion['DetalleRecaudacion']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $detalleRecaudacion['DetalleRecaudacion']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Detalle Recaudacion', true), array('action' => 'edit', $detalleRecaudacion['DetalleRecaudacion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Detalle Recaudacion', true), array('action' => 'delete', $detalleRecaudacion['DetalleRecaudacion']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $detalleRecaudacion['DetalleRecaudacion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Detalle Recaudacions', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detalle Recaudacion', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cajas', true), array('controller' => 'cajas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Caja', true), array('controller' => 'cajas', 'action' => 'add')); ?> </li>
	</ul>
</div>
