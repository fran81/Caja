<?php
class Flujo extends AppModel {
	var $name = 'Flujo';
	var $actsAs = array('Containable');
	var $validate = array(
		'cheque_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'efectivo_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'operacion_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cuenta_puente_id' => array(
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
		'Cheque' => array(
			'className' => 'Cheque',
			'foreignKey' => 'cheque_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Efectivo' => array(
			'className' => 'Efectivo',
			'foreignKey' => 'efectivo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Operacion' => array(
			'className' => 'Operacion',
			'foreignKey' => 'operacion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CuentaPuente' => array(
			'className' => 'CuentaPuente',
			'foreignKey' => 'cuenta_puente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>
