<?php 
$data = $this->requestAction('/migs/s1');
//debug($data);

$options = array();

foreach($data as $dat) {
	$options[$dat['Material']['id']] = $dat['Material']['name'];
}

//debug($options);

echo $this->Form->select('materials', $options );

?>
