<?php
class Material extends AppModel {
	var $name = 'Material';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $actsAs = array('Containable', 'Search.Searchable');
	
	public $filterArgs = array(
		array('name' => 'name', 'type' => 'like'),
		array('name' => 'short', 'type' => 'like'),
		array('name' => 'description', 'type' => 'like'),
		array('name' => 'pmig', 'type' => 'value'),
		array('name' => 'ptig', 'type' => 'value'),
		array('name' => 'psmaw', 'type' => 'value'),
		array('name' => 'ppac', 'type' => 'value')
	);

	var $belongsTo = array(
		'Fullitem' => array(
			'className' => 'Fullitem',
			'foreignKey' => 'fullitem_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'creator_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasAndBelongsToMany = array(
		'MigCalibre' => array(
			'className' => 'Calibre',
			'joinTable' => 'mig_calibre_materials',
			'foreignKey' => 'material_id',
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
		'TigCalibre' => array(
			'className' => 'Calibre',
			'joinTable' => 'tig_calibre_materials',
			'foreignKey' => 'material_id',
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
		'TigAmperaje' => array(
			'className' => 'Amperaje',
			'joinTable' => 'tig_amperaje_materials',
			'foreignKey' => 'material_id',
			'associationForeignKey' => 'amperaje_id',
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
		'SmawCalibre' => array(
			'className' => 'Calibre',
			'joinTable' => 'smaw_calibre_materials',
			'foreignKey' => 'material_id',
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
		'PacCalibre' => array(
			'className' => 'Calibre',
			'joinTable' => 'pac_calibre_materials',
			'foreignKey' => 'material_id',
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
		)
	);

}
?>