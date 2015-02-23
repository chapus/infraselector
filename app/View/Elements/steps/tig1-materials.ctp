<?php 
$data = $this->requestAction('/tigs/s1');
//debug($data);

$options = array();

foreach($data as $dat) {
	$options[$dat['id']] = $dat['name'];
}

//debug($options);

echo $this->Form->select('materials', $options);

?>
