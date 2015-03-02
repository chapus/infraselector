<?php
class Antorcha extends AppModel {
	var $name = 'Antorcha';
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
		'MigAntorchaMicroalambre' => array(
			'className' => 'MigAntorchaMicroalambre',
			'foreignKey' => 'antorcha_id',
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
		'TigAntorchaMaquina' => array(
			'className' => 'TigAntorchaMaquina',
			'foreignKey' => 'antorcha_id',
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
		'TigAntorchaAporte' => array(
			'className' => 'TigAntorchaAporte',
			'foreignKey' => 'antorcha_id',
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
		'AntorchaRegulador' => array(
			'className' => 'AntorchaRegulador',
			'foreignKey' => 'antorcha_id',
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
		'Regulador' => array(
			'className' => 'Regulador',
			'joinTable' => 'antorcha_reguladors',
			'foreignKey' => 'antorcha_id',
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
		'TigMaquina' => array(
			'className' => 'Maquina',
			'joinTable' => 'tig_antorcha_maquinas',
			'foreignKey' => 'antorcha_id',
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
		'MigMicroalambre' => array(
			'className' => 'Microalambre',
			'joinTable' => 'mig_antorcha_microalambres',
			'foreignKey' => 'antorcha_id',
			'associationForeignKey' => 'microalambre_id',
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
			'joinTable' => 'mig_antorcha_aportes',
			'foreignKey' => 'antorcha_id',
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
		'TigTungsteno' => array(
			'className' => 'Tungsteno',
			'joinTable' => 'tig_antorcha_tungstenos',
			'foreignKey' => 'antorcha_id',
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
		'TigAporte' => array(
			'className' => 'Aporte',
			'joinTable' => 'tig_antorcha_aportes',
			'foreignKey' => 'antorcha_id',
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
		)
	);

}
?>