<?php
class Amperaje extends AppModel {
	var $name = 'Amperaje';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $actsAs = array('Containable', 'Search.Searchable');
	
	public $filterArgs = array(
		array('name' => 'name', 'type' => 'like')
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
		'TigAmperajeMaterial' => array(
			'className' => 'TigAmperajeMaterial',
			'foreignKey' => 'amperaje_id',
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
		'TigAmperajeCalibre' => array(
			'className' => 'TigAmperajeCalibre',
			'foreignKey' => 'amperaje_id',
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
		'TigCalibre' => array(
			'className' => 'Calibre',
			'joinTable' => 'tig_amperaje_calibres',
			'foreignKey' => 'amperaje_id',
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
		'TigMaterial' => array(
			'className' => 'Material',
			'joinTable' => 'tig_amperaje_materials',
			'foreignKey' => 'amperaje_id',
			'associationForeignKey' => 'material_id',
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