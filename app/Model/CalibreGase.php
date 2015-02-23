<?php
class CalibreGase extends AppModel {
	var $name = 'CalibreGase';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Calibre' => array(
			'className' => 'Calibre',
			'foreignKey' => 'calibre_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Gase' => array(
			'className' => 'Gase',
			'foreignKey' => 'gase_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>