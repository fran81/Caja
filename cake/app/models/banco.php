<?php
class Banco extends AppModel {
	var $name = 'Banco';
	var $displayField = "denominacion_banco";
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Cuenta' => array(
			'className' => 'Cuenta',
			'foreignKey' => 'banco_id',
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
		'Plaza' => array(
			'className' => 'Plaza',
			'foreignKey' => 'banco_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>
