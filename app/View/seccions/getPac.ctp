<?php

//debug($protecciones);
echo "<div class='objclear'>";

foreach ($protecciones as $proteccion) {
	
	echo "<div class='tabobj'><div class='divimg'>".$this->Html->image('/'.$proteccion['Proteccione']['smallimage'], array('class' => 'imgobj') )."</div><span>".$proteccion['Proteccione']['name']."</span></div>";
	echo "<div class='objclear'></div>";
	
}

echo "</div>";
?>