<div class="responsables view">
<h2><?php  __('Responsable');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Apellido'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $responsable['Responsable']['apellido']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $responsable['Responsable']['nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tipo Responsable'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $responsable['Responsable']['tipo_responsable']; ?>
			&nbsp;
		</dd>
	</dl>
<h2>COMPLETAR OPERACIONES RELACIONADAS</h2>
</div>
<?php echo $this->element('acordion_acciones'); ?>
<div class="related">
	<h3><?php __('Cheques Relacionados');?></h3>
	<?php if (!empty($responsable['Cheque'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Numero'); ?></th>
		<th><?php __('Importe'); ?></th>
		<th><?php __('Fecha Cobro'); ?></th>
		<th><?php __('Fecha Limite'); ?></th>
		<th><?php __('Estado'); ?></th>
		<th><?php __('Tipo'); ?></th>
		<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($responsable['Cheque'] as $cheque):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $cheque['numero'];?></td>
			<td><?php echo $cheque['importe'];?></td>
			<td><?php echo $cheque['fecha_cobro'];?></td>
			<td><?php echo $cheque['fecha_limite'];?></td>
			<td><?php echo $cheque['estado'];?></td>
			<td><?php echo $cheque['tipo'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver', true), array('controller' => 'cheques', 'action' => 'view', $cheque['id'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'cheques', 'action' => 'edit', $cheque['id'])); ?>
				<?php echo $this->Html->link(__('Borrar', true), array('controller' => 'cheques', 'action' => 'delete', $cheque['id']), null, sprintf(__('Está seguro que desea borrar # %s?', true), $cheque['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
<div class="related">
	<h3><?php __('Operaciones Relacionadas');?></h3>
	<?php if (!empty($responsable['Operacion'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Caja Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($responsable['Operacion'] as $operacion):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $operacion['caja_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver', true), array('controller' => 'operacions', 'action' => 'view', $operacion['id'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'operacions', 'action' => 'edit', $operacion['id'])); ?>
				<?php echo $this->Html->link(__('Borrar', true), array('controller' => 'operacions', 'action' => 'delete', $operacion['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $operacion['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>

