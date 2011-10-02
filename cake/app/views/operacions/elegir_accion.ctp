<?php
	$style = isset($_REQUEST['style']) ? $_REQUEST['style'] : 'default';
	if(substr_compare($style,"Canje",0,5)==0) {
		echo $this->Form->radio('Flujo.tipo',array('E'=>'Entrada','S'=>'Salida'),array('value'=>'E','Class' => 'selectCheque'));
		$style = substr($style,5);
	} else if ($style == "Efectivo" || $style == "Cheque" || $style == "Puente") {
		echo $this->Form->hidden('Flujo.tipo', array('value' => 'E'));
	}
	echo $this->Html->script(array('calcula.cotizacion'),array('inline' => false));
	
?>
<?php if ($style == "Aporte") { ?>
	<div id="movimiento">
		<?php echo $this->Form->input('barra', array('type' => 'text'));
		echo $this->Form->input('Movimiento.nro_boleta');
		echo $this->Form->input('Movimiento.importe');
		echo $this->Form->input('Movimiento.concepto');
		echo $this->Form->button('cargar', array('onclick' => 'guardarMovimiento()'));
		echo $this->Form->hidden('Movimiento.tipo', array('value' => 'Aporte')); ?>
	</div>
<?php } else if ($style == "Cuota") { ?>
	<div id="movimiento">
		<?php echo $this->Form->input('Movimiento.nro_boleta');
		echo $this->Form->select('Moneda.id', $monedas); ?>
		<div id="panelCotizacion"></div>
		<div id="labelCotizacion"></div>
		<?php echo $this->Form->input('importe',array('name'=> 'data[Movimiento][importe]'));
		echo $this->Form->input('Movimiento.concepto');
		echo $this->Form->button('cargar', array('onclick' => 'guardarMovimiento()'));
		echo $this->Form->hidden('Movimiento.tipo', array('value' => $style)); ?>
	</div>
<?php } else if ($style == "Vario") { ?>
	<div id="movimiento">
		<?php echo $this->Form->input('Movimiento.nro_boleta');
		echo $this->Form->input('Movimiento.importe');
		echo $this->Form->input('Movimiento.concepto');
		echo $this->Form->button('cargar', array('onclick' => 'guardarMovimiento()'));
		echo $this->Form->hidden('Movimiento.tipo', array('value' => $style)); ?>
	</div>
<?php } else if ($style == "Sellado") {?>
	<div id="sellado">
		<?php echo $this->Form->input('Sellado.nro_prestamo');
		echo $this->Form->input('Sellado.importe_prestamo');
		echo $this->Form->input('Movimiento.nro_boleta');
		echo $this->Form->input('Movimiento.importe');
		echo $this->Form->input('Movimiento.concepto');
		echo $this->Form->button('cargar', array('onclick' => 'guardarSellado()', 'id' => 'Guardar'));
		echo $this->Form->hidden('Movimiento.tipo', array('value' => 'Sellado'));?>
	</div>
<?php }  else if ($style == "Efectivo") {?>
	<div id="efectivo">
		<?php echo $this->Form->select('Moneda.id', $monedas); ?>
		<div id="panelCotizacion"></div>
		<div id="labelCotizacion"></div>
		<?php echo $this->Form->input('importe', array('name'=>'data[Efectivo][importe]'));
		echo $this->Form->button('cargar', array('type' => 'Efectivo', 'onclick' => 'guardarEfectivo()')); ?>
	</div>
<?php } else if ($style == "no_pesos") {?>
	<div id="no_pesos">
		
		<?php echo $this->Form->input('Efectivo.ajuste_cotizacion');
		echo $this->Form->input('importe_moneda'); ?>
	</div>
<?php } else if ($style == "pesos") {?>
	<div id="pesos">
		<?php echo ""; ?>
	</div>
	<?php } else if ($style == "Cheque" || $style == "E") {?>
	<div id="cheque" class="panel">
		<?php echo $this->Form->select("Cheque.plaza_id", $listdata);
		echo $this->Form->input('Cheque.numero', array('onblur' => 'checkDato()'));
		echo $this->Form->input('Cheque.importe');
		echo $this->Form->input('Cheque.fecha_cobro', array('type' => 'text', 'class' => 'Fecha'));
		echo $this->Form->radio('Cheque.tipo',
	array('corriente'=>'Corriente','diferido'=>'Diferido','canje'=>'Para Canje'),
	array('value'=>'corriente'));
		echo $this->Form->input('Cheque.fecha_limite', array('type' => 'text', 'class' => 'Fecha', 'disabled' => true));
		echo $this->Form->button('cargar', array('onclick' => 'guardarCheque()', 'id' => 'Guardar','disabled' => true)); ?>
	</div>
<?php } else if ($style == "Puente") {?>
	<div id="puente">
		<?php echo $this->Form->input('CuentaPuente.numero', array('onblur' => 'checkDato()'));
		echo $this->Form->input('CuentaPuente.concepto');
		echo $this->Form->input('CuentaPuente.importe');
		echo $this->Form->input('CuentaPuente.fecha', array('type' => 'text', 'class' => 'Fecha'));
		echo $this->Form->button('cargar', array('onclick' => 'guardarPuente()', 'id' => 'Guardar','disabled' => true)); ?>
	</div>
<?php } else if ($style == "Operaciones") {?>
	<div id="operaciones">
		<?php echo $this->Form->select('Operacion', $listoperacions);?>
	</div>
<?php } else if ($style == "S") {?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('numero');?></th>
		<th><?php echo $this->Paginator->sort('banco');?></th>
		<th><?php echo $this->Paginator->sort('importe');?></th>
		<th><?php echo $this->Paginator->sort('fecha_cobro');?></th>
		<th><?php echo $this->Paginator->sort('fecha_limite');?></th>
		<th><?php echo $this->Paginator->sort('estado');?></th>
		<th><?php echo $this->Paginator->sort('tipo');?></th>
		<th><?php echo $this->Paginator->sort('apellido');?></th>
		<th><?php echo $this->Paginator->sort('nombre');?></th>
		<th><?php echo $this->Paginator->sort('plaza_id');?></th>
		<th><?php echo $this->Paginator->sort('canjear');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($cheques as $cheque):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $cheque['Cheque']['numero']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cheque['Plaza']['Banco']['denominacion_banco'], array('controller' => 'bancos', 'action' => 'view', $cheque['Plaza']['banco_id'])); ?>
		</td>
		<td><?php echo $cheque['Cheque']['importe']; ?>&nbsp;</td>
		<td><?php echo $cheque['Cheque']['fecha_cobro']; ?>&nbsp;</td>
		<td><?php echo $cheque['Cheque']['fecha_limite']; ?>&nbsp;</td>
		<td><?php echo $cheque['Cheque']['estado']; ?>&nbsp;</td>
		<td><?php echo $cheque['Cheque']['tipo']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cheque['Responsable']['apellido'], array('controller' => 'responsables', 'action' => 'view', $cheque['Responsable']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cheque['Responsable']['nombre'], array('controller' => 'responsables', 'action' => 'view', $cheque['Responsable']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cheque['Plaza']['denominacion_plaza'], array('controller' => 'plazas', 'action' => 'view', $cheque['Plaza']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Form->button('Canjear', array('onclick' => "canjearCheque('".$cheque['Cheque']['id']."')")); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
<?php } ?>
