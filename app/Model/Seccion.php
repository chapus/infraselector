<?php
class Seccion extends AppModel {
	var $name = 'Seccion';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	var $actsAs = array('Containable', 'Search.Searchable');
	
	public $filterArgs = array(
		array('name' => 'name', 'type' => 'like')
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
		'Proteccione' => array(
			'className' => 'Proteccione',
			'foreignKey' => 'seccion_id',
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