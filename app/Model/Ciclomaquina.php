<?php
class Ciclomaquina extends AppModel {
	var $name = 'Ciclomaquina';
	var $displayField = 'name';
	
	var $actsAs = array('Search.Searchable');
	
	public $filterArgs = array(
		array('name' => 'name', 'type' => 'like'),
		array('name' => 'description', 'type' => 'like')
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	var $hasMany = array(
		'Maquina' => array(
			'className' => 'Maquina',
			'foreignKey' => 'ciclomaquina_id',
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

}
?>