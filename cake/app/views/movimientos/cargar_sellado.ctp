<?php echo $this->Form->input('Sellado.nro_prestamo');
echo $this->Form->input('Sellado.importe_prestamo');
echo $this->Form->input('Movimiento.nro_boleta',array('name'=>'data[Movimiento][boletaSellado]','class'=>'movimientos'));
echo $this->Form->input('Movimiento.importe',array('name'=>'data[Movimiento][importeSellado]','class'=>'movimientos'));
echo $this->Form->input('Movimiento.concepto',array('name'=>'data[Movimiento][conceptoSellado]','class'=>'movimientos'));
echo $this->Form->button('cargar', array('class'=>'boton','id'=>'guardar-sellado'));?>
