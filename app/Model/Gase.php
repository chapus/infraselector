<?php
class Gase extends AppModel {
	var $name = 'Gase';
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
		'Aporte' => array(
			'className' => 'Aporte',
			'joinTable' => 'aporte_gases',
			'foreignKey' => 'gase_id',
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
		'MigCalibre' => array(
			'className' => 'Calibre',
			'joinTable' => 'mig_calibre_gases',
			'foreignKey' => 'gase_id',
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
		'MigCalidadgase' => array(
			'className' => 'Calidadgase',
			'joinTable' => 'mig_calidadgase_gases',
			'foreignKey' => 'gase_id',
			'associationForeignKey' => 'calidadgase_id',
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
			'joinTable' => 'tig_calibre_gases',
			'foreignKey' => 'gase_id',
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
		'MigMaquina' => array(
			'className' => 'Maquina',
			'joinTable' => 'mig_gase_maquinas',
			'foreignKey' => 'gase_id',
			'associationForeignKey' => 'maquina_id',
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
		'TigMaquina' => array(
			'className' => 'Maquina',
			'joinTable' => 'tig_gase_maquinas',
			'foreignKey' => 'gase_id',
			'associationForeignKey' => 'maquina_id',
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
		'PacMaquina' => array(
			'className' => 'Maquina',
			'joinTable' => 'pac_gase_maquinas',
			'foreignKey' => 'gase_id',
			'associationForeignKey' => 'maquina_id',
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
		'PacRegulador' => array(
			'className' => 'Regulador',
			'joinTable' => 'pac_gase_reguladors',
			'foreignKey' => 'gase_id',
			'associationForeignKey' => 'regulador_id',
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