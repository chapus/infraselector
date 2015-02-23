<?php
class Login extends AppModel {
	var $name = 'Login';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	//public $actsAs = array('Increment'=>array('incrementFieldName'=>'count'));
	
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>