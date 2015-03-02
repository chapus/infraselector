<?php
class Calibre extends AppModel {
	var $name = 'Calibre';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $actsAs = array('Containable', 'Search.Searchable', 'Cacher.Cache' => array('config' => 'short') );
	
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

	var $hasMany = array(
		'MigCalibreGase' => array(
			'className' => 'MigCalibreGase',
			'foreignKey' => 'calibre_id',
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
		'TigCalibreCcalidade' => array(
			'className' => 'TigCalibreCcalidade',
			'foreignKey' => 'calibre_id',
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
		'TigCalibreGase' => array(
			'className' => 'TigCalibreGase',
			'foreignKey' => 'calibre_id',
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
		'SmawCalibreMaquina' => array(
			'className' => 'SmawCalibreMaquina',
			'foreignKey' => 'calibre_id',
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
		'PacCalibreMaquina' => array(
			'className' => 'PacCalibreMaquina',
			'foreignKey' => 'calibre_id',
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
		'MigCalibreMaterial' => array(
			'className' => 'MigCalibreMaterial',
			'foreignKey' => 'calibre_id',
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
		'TigCalibreMaterial' => array(
			'className' => 'TigCalibreMaterial',
			'foreignKey' => 'calibre_id',
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
		'SmawCalibreMaterial' => array(
			'className' => 'SmawCalibreMaterial',
			'foreignKey' => 'calibre_id',
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
		'PacCalibreMaterial' => array(
			'className' => 'PacCalibreMaterial',
			'foreignKey' => 'calibre_id',
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
		'TigCcalidade' => array(
			'className' => 'Ccalidade',
			'joinTable' => 'tig_ccalidade_calibres',
			'foreignKey' => 'calibre_id',
			'associationForeignKey' => 'ccalidade_id',
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
			'joinTable' => 'mig_calibre_gases',
			'foreignKey' => 'calibre_id',
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
		'MigCalidadgase' => array(
			'className' => 'Calidadgase',
			'joinTable' => 'mig_calibre_calidadgases',
			'foreignKey' => 'calibre_id',
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
		'TigAmperaje' => array(
			'className' => 'Amperaje',
			'joinTable' => 'tig_amperaje_calibres',
			'foreignKey' => 'calibre_id',
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
		'TigGase' => array(
			'className' => 'Gase',
			'joinTable' => 'tig_calibre_gases',
			'foreignKey' => 'calibre_id',
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
		'SmawMaquina' => array(
			'className' => 'Maquina',
			'joinTable' => 'smaw_calibre_maquinas',
			'foreignKey' => 'calibre_id',
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
			'joinTable' => 'pac_calibre_maquinas',
			'foreignKey' => 'calibre_id',
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
		)
	);

}
?>