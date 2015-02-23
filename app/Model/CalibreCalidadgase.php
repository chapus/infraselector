<?php
class CalibreCalidadgase extends AppModel {
	var $name = 'CalibreCalidadgase';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	var $actsAs = array('Containable');
	
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