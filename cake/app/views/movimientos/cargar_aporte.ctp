<?php echo $this->Form->input('barra', array('type' => 'text','id'=>'barra'));
echo $this->Form->input('Movimiento.nro_boleta',array('name'=>'data[Movimiento][boletaAporte]','class'=>'movimientos'));
echo $this->Form->input('Movimiento.importe',array('name'=>'data[Movimiento][importeAporte]','class'=>'movimientos'));
echo $this->Form->input('Movimiento.concepto',array('name'=>'data[Movimiento][conceptoAporte]','class'=>'movimientos'));
echo $this->Form->button('cargar', array('class'=>'boton guardar-movimiento')); ?>

