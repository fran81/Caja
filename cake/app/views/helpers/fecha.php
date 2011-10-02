<?php

class FechaHelper extends FormHelper {

	var $helpers = array('Html','Javascript');
	var $format = '%Y-%m-%d';

	function elegir($campo, $options = array()) {
		$this->setEntity($campo);
		$htmlAttributes = $this->domId($options);        
		$divOptions['class'] = 'date';
		$options['type'] = 'date';
		$options['div']['class'] = 'date';
		$options['dateFormat'] = 'DMY';
		$options['minYear'] = isset($options['minYear']) ? $options['minYear'] : (date('Y') - 1);
		$options['maxYear'] = isset($options['maxYear']) ? $options['maxYear'] : (date('Y') + 1);
		$options['after'] = $this->Html->image('calendar.png', array('id'=> $htmlAttributes['id'],'style'=>'cursor:pointer'));

		if (isset($options['empty'])) {
			$options['after'] .= $this->Html->image('b_drop.png', array('id'=> $htmlAttributes ['id']."_drop",'style'=>'cursor:pointer'));
    }
		$fecha = $this->input($campo, $options);
		$fecha .= $this->Javascript->codeBlock('datepicker({navigationAsDateFormat:true, showOtherMonths:true, buttonImage:"calendar.png", showAnim:"fadeIn", buttonText:"calendario", dateFormat:"dd-mm-yy", duration:"normal"});', array('safe' => false, 'inline' => false));
//		Debugger::dump($fecha);

		return $fecha;
	}
}

?>
