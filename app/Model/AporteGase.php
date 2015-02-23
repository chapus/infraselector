<?php
class AporteGase extends AppModel {
	var $name = 'AporteGase';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Aporte' => array(
			'className' => 'Aporte',
			'foreignKey' => 'aporte_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Gas' => array(
			'className' => 'Gase',
			'foreignKey' => 'gase_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>