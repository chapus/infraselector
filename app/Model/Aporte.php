<?php
class Aporte extends AppModel {
	var $name = 'Aporte';
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
		'AporteGase' => array(
			'className' => 'AporteGase',
			'foreignKey' => 'aporte_id',
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
		'SmawAporteMaquina' => array(
			'className' => 'SmawAporteMaquina',
			'foreignKey' => 'aporte_id',
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
		'SmawMaquina' => array(
			'className' => 'Maquina',
			'joinTable' => 'smaw_aporte_maquinas',
			'foreignKey' => 'aporte_id',
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
		'Gase' => array(
			'className' => 'Gase',
			'joinTable' => 'aporte_gases',
			'foreignKey' => 'aporte_id',
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
		'MigAntorcha' => array(
			'className' => 'Antorcha',
			'joinTable' => 'mig_antorcha_aportes',
			'foreignKey' => 'aporte_id',
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
		'TigAntorcha' => array(
			'className' => 'Antorcha',
			'joinTable' => 'tig_antorcha_aportes',
			'foreignKey' => 'aporte_id',
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
		'MigRegulador' => array(
			'className' => 'Regulador',
			'joinTable' => 'mig_aporte_reguladors',
			'foreignKey' => 'aporte_id',
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
		),
		'TigRegulador' => array(
			'className' => 'Regulador',
			'joinTable' => 'tig_aporte_reguladors',
			'foreignKey' => 'aporte_id',
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
		),
		'TigTungsteno' => array(
			'className' => 'Tungsteno',
			'joinTable' => 'tig_aporte_tungstenos',
			'foreignKey' => 'aporte_id',
			'associationForeignKey' => 'tungsteno_id',
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
		'SmawProteccione' => array(
			'className' => 'Proteccione',
			'joinTable' => 'smaw_aporte_protecciones',
			'foreignKey' => 'aporte_id',
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
		)
	);

}
?>