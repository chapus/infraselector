<?php
class Mig extends AppModel {
	var $name = 'Mig';
	var $displayField = 'id';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	var $actsAs = array('Cacher.Cache' => array('config' => 'short') );

}
?>