<?php echo $this->Form->input('CuentaPuente.numero', array('onblur' => 'checkDato()'));
echo $this->Form->input('CuentaPuente.concepto');
echo $this->Form->input('CuentaPuente.importe');
echo $this->Form->input('CuentaPuente.fecha', array('type' => 'text', 'class' => 'Fecha'));
echo $this->Form->button('Cargar', array('id' => 'guardar-puente','class'=>'boton Guardar'));?>
