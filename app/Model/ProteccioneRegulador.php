<?php
class ProteccioneRegulador extends AppModel {
	var $name = 'ProteccioneRegulador';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Proteccione' => array(
			'className' => 'Proteccione',
			'foreignKey' => 'proteccione_id',
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