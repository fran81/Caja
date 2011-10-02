<?php
class DetalleRecaudacion extends AppModel {
	var $name = 'DetalleRecaudacion';
	var $validate = array(
		'caja_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Caja' => array(
			'className' => 'Caja',
			'foreignKey' => 'caja_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>