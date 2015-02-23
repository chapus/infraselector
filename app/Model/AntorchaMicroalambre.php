<?php
class AntorchaMicroalambre extends AppModel {
	var $name = 'AntorchaMicroalambre';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Antorcha' => array(
			'className' => 'Antorcha',
			'foreignKey' => 'antorcha_id',
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