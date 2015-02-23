<?php
class SmawMaquinaPortaelectrodo extends AppModel {
	var $name = 'SmawMaquinaPortaelectrodo';
	var $displayField = 'name';
	
	var $actsAs = array('Containable');
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Maquina' => array(
			'className' => 'Maquina',
			'foreignKey' => 'maquina_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Portaelectrodo' => array(
			'className' => 'Portaelectrodo',
			'foreignKey' => 'portaelectrodo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>