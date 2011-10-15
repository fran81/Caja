<?php echo $this->Form->radio('Moneda', $monedas, array('class'=>'boton','name'=>'data[Moneda][id]')); ?>
<div id="panelCotizacion" class="oculto"></div>
<?php echo $this->Form->input('importe', array('name'=>'data[Efectivo][importe]'));
echo $this->Form->button('Cargar', array('type' => 'Efectivo', 'id' => 'guardar-efectivo','class'=>'boton')); ?>
