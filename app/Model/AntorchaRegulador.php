<?php
class AntorchaRegulador extends AppModel {
	var $name = 'AntorchaRegulador';
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