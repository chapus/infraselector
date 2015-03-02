<?php
class Ccalidade extends AppModel {
	var $name = 'Ccalidade';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $actsAs = array('Containable', 'Search.Searchable', 'Cacher.Cache' => array('config' => 'short') );
	
	public $filterArgs = array(
		array('name' => 'name', 'type' => 'like'),
		array('name' => 'short', 'type' => 'like'),
		array('name' => 'codigo', 'type' => 'like'),
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

	var $hasMany = array(
		'TigCcalidadeGase' => array(
			'className' => 'TigCcalidadeGase',
			'foreignKey' => 'ccalidade_id',
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
		'TigCcalidadeCalibre' => array(
			'className' => 'TigCcalidadeCalibre',
			'foreignKey' => 'ccalidade_id',
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
		'TigGase' => array(
			'className' => 'Gase',
			'joinTable' => 'tig_ccalidade_gases',
			'foreignKey' => 'ccalidade_id',
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
			'joinTable' => 'tig_ccalidade_calibres',
			'foreignKey' => 'ccalidade_id',
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