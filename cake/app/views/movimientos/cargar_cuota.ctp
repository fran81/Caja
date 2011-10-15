<?php echo $this->Form->input('nro_boleta', array('name' => 'data[Movimiento][boletaCuota]','class'=>'movimientos'));
echo $this->Form->radio('Moneda', $monedas,array('class'=>'moneda boton')); ?>
<div id="extranjera" class="oculto">	
	<?php echo $this->Form->input('Efectivo.ajuste_cotizacion');
	echo $this->Form->input('importe_moneda',array('class'=>'movimientos')); ?>
</div>
<div id="labelCotizacion" class="oculto"></div>
<?php echo $this->Form->input('importe',array('name'=> 'data[Movimiento][importeCuota]','class'=>'movimientos'));
echo $this->Form->input('Movimiento.concepto',array('name'=>'data[Movimiento][conceptoCuota]','class'=>'movimientos'));
echo $this->Form->button('cargar', array('class'=>'boton guardar-movimiento')); ?>
