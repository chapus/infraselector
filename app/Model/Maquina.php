<?php
class Maquina extends AppModel {
	var $name = 'Maquina';
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
		),
		'Ciclomaquina' => array(
			'className' => 'Ciclomaquina',
			'foreignKey' => 'ciclomaquina_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'MigMaquinaMicroalambre' => array(
			'className' => 'MigMaquinaMicroalambre',
			'foreignKey' => 'maquina_id',
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
			'foreignKey' => 'maquina_id',
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
		'MigGaseMaquina' => array(
			'className' => 'MigGaseMaquina',
			'foreignKey' => 'maquina_id',
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
		'TigGaseMaquina' => array(
			'className' => 'TigGaseMaquina',
			'foreignKey' => 'maquina_id',
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
			'foreignKey' => 'maquina_id',
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
			'foreignKey' => 'maquina_id',
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
		'PacGaseMaquina' => array(
			'className' => 'PacGaseMaquina',
			'foreignKey' => 'maquina_id',
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
		),
		'SmawMaquinaPortaelectrodo' => array(
			'className' => 'SmawMaquinaPortaelectrodo',
			'foreignKey' => 'portaelectrodo_id',
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
		'TigAntorcha' => array(
			'className' => 'Antorcha',
			'joinTable' => 'tig_antorcha_maquinas',
			'foreignKey' => 'maquina_id',
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
		'MigMicroalambre' => array(
			'className' => 'Microalambre',
			'joinTable' => 'mig_maquina_microalambres',
			'foreignKey' => 'maquina_id',
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
		'MigGase' => array(
			'className' => 'Gase',
			'joinTable' => 'mig_gase_maquinas',
			'foreignKey' => 'maquina_id',
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
		'TigGase' => array(
			'className' => 'Gase',
			'joinTable' => 'tig_gase_maquinas',
			'foreignKey' => 'maquina_id',
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
		'SmawCalibre' => array(
			'className' => 'Calibre',
			'joinTable' => 'smaw_calibre_maquinas',
			'foreignKey' => 'maquina_id',
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
			'joinTable' => 'pac_calibre_maquinas',
			'foreignKey' => 'maquina_id',
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
		'PacGase' => array(
			'className' => 'Gase',
			'joinTable' => 'pac_gase_maquinas',
			'foreignKey' => 'maquina_id',
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
		'SmawAporte' => array(
			'className' => 'Aporte',
			'joinTable' => 'smaw_aporte_maquinas',
			'foreignKey' => 'maquina_id',
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