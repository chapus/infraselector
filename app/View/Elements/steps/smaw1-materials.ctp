<?php 
$data = $this->requestAction('/smaws/s1');
//debug($data);

$options = array();

foreach($data as $dat) {
	$options[$dat['Material']['id']] = $dat['Material']['name'];
}

//debug($options);
asort($options, SORT_STRING);

echo $this->Form->select('materials', $options);

?>
