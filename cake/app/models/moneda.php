<?php
class Moneda extends AppModel {
	var $name = 'Moneda';
	var $displayField = "nombre";
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Cotizacion' => array(
			'className' => 'Cotizacion',
			'foreignKey' => 'moneda_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		
		'Caja' => array(
			'className' => 'Caja',
			'foreignKey' => 'moneda_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);

}
?>
