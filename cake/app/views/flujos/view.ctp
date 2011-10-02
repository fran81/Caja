<div class="flujos view">
<h2><?php  __('Flujo');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $flujo['Flujo']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tipo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $flujo['Flujo']['tipo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cheque'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($flujo['Cheque']['id'], array('controller' => 'cheques', 'action' => 'view', $flujo['Cheque']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Efectivo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($flujo['Efectivo']['id'], array('controller' => 'efectivos', 'action' => 'view', $flujo['Efectivo']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $flujo['Flujo']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $flujo['Flujo']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Operacion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($flujo['Operacion']['id'], array('controller' => 'operacions', 'action' => 'view', $flujo['Operacion']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cuenta Puente'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($flujo['CuentaPuente']['id'], array('controller' => 'cuenta_puentes', 'action' => 'view', $flujo['CuentaPuente']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $flujo['Flujo']['estado']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Flujo', true), array('action' => 'edit', $flujo['Flujo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Flujo', true), array('action' => 'delete', $flujo['Flujo']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $flujo['Flujo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Flujos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Flujo', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cheques', true), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque', true), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Efectivos', true), array('controller' => 'efectivos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Efectivo', true), array('controller' => 'efectivos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Operacions', true), array('controller' => 'operacions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Operacion', true), array('controller' => 'operacions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cuenta Puentes', true), array('controller' => 'cuenta_puentes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuenta Puente', true), array('controller' => 'cuenta_puentes', 'action' => 'add')); ?> </li>
	</ul>
</div>
