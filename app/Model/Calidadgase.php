<?php
class Calidadgase extends AppModel {
	var $name = 'Calidadgase';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $actsAs = array('Containable', 'Search.Searchable');
	
	public $filterArgs = array(
		array('name' => 'name', 'type' => 'like'),
		array('name' => 'description', 'type' => 'like')
	);
	
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'creator_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	var $hasMany = array(
		'MigCalibreCalidadgase' => array(
			'className' => 'MigCalibreCalidadgase',
			'foreignKey' => 'calidadgase_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'MigCalidadgaseGase' => array(
			'className' => 'MigCalidadgaseGase',
			'foreignKey' => 'calidadgase_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'TigCalibreCalidadgase' => array(
			'className' => 'TigCalibreCalidadgase',
			'foreignKey' => 'calidadgase_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'TigCalidadgaseGase' => array(
			'className' => 'TigCalidadgaseGase',
			'foreignKey' => 'calidadgase_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
		);
	
	
	var $hasAndBelongsToMany = array(
		'MigCalibre' => array(
			'className' => 'Calibre',
			'joinTable' => 'mig_calibre_calidadgases',
			'foreignKey' => 'calidadgase_id',
			'associationForeignKey' => 'calibre_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'MigGase' => array(
			'className' => 'Gase',
			'joinTable' => 'mig_calidadgase_gases',
			'foreignKey' => 'calidadgase_id',
			'associationForeignKey' => 'gase_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'TigCalibre' => array(
			'className' => 'Calibre',
			'joinTable' => 'tig_calibre_calidadgases',
			'foreignKey' => 'calidadgase_id',
			'associationForeignKey' => 'calibre_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'TigGase' => array(
			'className' => 'Gase',
			'joinTable' => 'tig_calidadgase_gases',
			'foreignKey' => 'calidadgase_id',
			'associationForeignKey' => 'gase_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
	
}
?>