<div class="rechazos view">
<h2><?php  __('Rechazo');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rechazo['Rechazo']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fecha'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rechazo['Rechazo']['fecha']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Motivo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rechazo['Rechazo']['motivo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Comision'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rechazo['Rechazo']['comision']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cheque'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($rechazo['Cheque']['id'], array('controller' => 'cheques', 'action' => 'view', $rechazo['Cheque']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rechazo', true), array('action' => 'edit', $rechazo['Rechazo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Rechazo', true), array('action' => 'delete', $rechazo['Rechazo']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $rechazo['Rechazo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rechazos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rechazo', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cheques', true), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque', true), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
	</ul>
</div>
