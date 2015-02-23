<?php
class MaquinaMicroalambre extends AppModel {
	var $name = 'MaquinaMicroalambre';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Maquina' => array(
			'className' => 'Maquina',
			'foreignKey' => 'maquina_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Microalambre' => array(
			'className' => 'Microalambre',
			'foreignKey' => 'microalambre_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>