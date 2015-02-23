<?php
class MigCalibreCalidadgase extends AppModel {
	var $name = 'MigCalibreCalidadgase';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Calibre' => array(
			'className' => 'Calibre',
			'foreignKey' => 'calibre_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Calidadgase' => array(
			'className' => 'Calidadgase',
			'foreignKey' => 'calidadgase_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>