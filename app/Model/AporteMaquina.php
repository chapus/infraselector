<?php
class AporteMaquina extends AppModel {
	var $name = 'AporteMaquina';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Aporte' => array(
			'className' => 'Aporte',
			'foreignKey' => 'aporte_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Maquina' => array(
			'className' => 'Maquina',
			'foreignKey' => 'maquina_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>