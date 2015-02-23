<?php
class AntorchaReguladore extends AppModel {
	var $name = 'AntorchaReguladore';
	var $validate = array(
		'antorcha_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'regulador_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'Antorcha' => array(
			'className' => 'Antorcha',
			'foreignKey' => 'antorcha_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Regulador' => array(
			'className' => 'Regulador',
			'foreignKey' => 'regulador_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>