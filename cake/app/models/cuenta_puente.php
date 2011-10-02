<?php
class CuentaPuente extends AppModel {
	var $name = 'CuentaPuente';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Flujo' => array(
			'className' => 'Flujo',
			'foreignKey' => 'cuenta_puente_id',
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