<?php
class SmawJuegopaPortaelectrodo extends AppModel {
	var $name = 'SmawJuegopaPortaelectrodo';
	var $displayField = 'name';
	
	var $actsAs = array('Containable');
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Juegopa' => array(
			'className' => 'Juegopa',
			'foreignKey' => 'juegopa_id',
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