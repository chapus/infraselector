<?php
class Regulador extends AppModel {
	var $name = 'Regulador';
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

	var $hasAndBelongsToMany = array(
		'Antorcha' => array(
			'className' => 'Antorcha',
			'joinTable' => 'antorcha_reguladors',
			'foreignKey' => 'regulador_id',
			'associationForeignKey' => 'antorcha_id',
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
		'MigAporte' => array(
			'className' => 'Aporte',
			'joinTable' => 'mig_aporte_reguladors',
			'foreignKey' => 'regulador_id',
			'associationForeignKey' => 'aporte_id',
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
		'TigAporte' => array(
			'className' => 'Aporte',
			'joinTable' => 'tig_aporte_reguladors',
			'foreignKey' => 'regulador_id',
			'associationForeignKey' => 'aporte_id',
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
		'TigAlternativo' => array(
			'className' => 'Alternativo',
			'joinTable' => 'tig_alternativo_reguladors',
			'foreignKey' => 'regulador_id',
			'associationForeignKey' => 'alternativo_id',
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
		'MigAlternativo' => array(
			'className' => 'Alternativo',
			'joinTable' => 'mig_alternativo_reguladors',
			'foreignKey' => 'regulador_id',
			'associationForeignKey' => 'alternativo_id',
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
		'MigProteccione' => array(
			'className' => 'Proteccione',
			'joinTable' => 'mig_proteccione_reguladors',
			'foreignKey' => 'regulador_id',
			'associationForeignKey' => 'proteccione_id',
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
		'PacGase' => array(
			'className' => 'Gase',
			'joinTable' => 'pac_gase_reguladors',
			'foreignKey' => 'regulador_id',
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