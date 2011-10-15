<?php echo $this->Form->input('Movimiento.nro_boleta',array('name'=>'data[Movimiento][boletaVario]','class'=>'movimientos'));
echo $this->Form->input('Movimiento.importe',array('name'=>'data[Movimiento][importeVario]','class'=>'movimientos'));
echo $this->Form->input('Movimiento.concepto',array('name'=>'data[Movimiento][conceptoVario]','class'=>'movimientos'));
echo $this->Form->button('cargar', array('class'=>'boton guardar-movimiento')); ?>
