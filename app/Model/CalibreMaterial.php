<?php
class CalibreMaterial extends AppModel {
	var $name = 'CalibreMaterial';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Calibre' => array(
			'className' => 'Calibre',
			'foreignKey' => 'calibre_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Material' => array(
			'className' => 'Material',
			'foreignKey' => 'material_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>