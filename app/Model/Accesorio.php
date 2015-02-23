<?php
class Accesorio extends AppModel {
	var $name = 'Accesorio';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $actsAs = array('Containable', 'Search.Searchable');
	
	public $filterArgs = array(
		array('name' => 'ceramica', 'type' => 'like'),
		array('name' => 'portamordaza', 'type' => 'like'),
		array('name' => 'mordaza', 'type' => 'like'),
		array('name' => 'tapa', 'type' => 'like'),
		array('name' => 'tungsteno', 'type' => 'like')
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
		'TigAccesorioMaterial' => array(
			'className' => 'TigAccesorioMaterial',
			'foreignKey' => 'accesorio_id',
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
		'TigAccesorioCalibre' => array(
			'className' => 'TigAccesorioCalibre',
			'foreignKey' => 'accesorio_id',
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
			'joinTable' => 'tig_accesorio_calibres',
			'foreignKey' => 'accesorio_id',
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
			'joinTable' => 'tig_accesorio_materials',
			'foreignKey' => 'accesorio_id',
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