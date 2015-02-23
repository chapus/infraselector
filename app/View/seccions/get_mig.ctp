<?php

//debug($protecciones);
echo "<div class='objclear'>";

foreach ($protecciones as $proteccion) {
	
	echo "<div class='tabobj'><div class='divimg'>".$this->Html->image('/'.$proteccion['Proteccione']['smallimage'], array('class' => 'imgobj') )."</div><span><b>".$proteccion['Proteccione']['name']."</b></span>
	<span><a href='#' id='ver".$proteccion['Proteccione']['id']."'>+ Ver descripción</a></span><span><input type='checkbox' name='prot".$proteccion['Proteccione']['id']."' id='prot".$proteccion['Proteccione']['id']."' /> Agregar a la selección</span></div>";
	echo "<div class='objclear'></div>";
	
	echo "<div style='display:none;'><div id='description".$proteccion['Proteccione']['id']."'>".$this->Html->image('/'.$proteccion['Proteccione']['smallimage']).$proteccion['Proteccione']['description']."</div></div>";
}

if( empty($protecciones) ) {
	echo "Por el momento no tenemos protecciones de este tipo para el Proceso MIG.";
}
echo "</div>";
?>
<script type="text/javascript">
// <!--
$(document).ready(function() { 
<?php
foreach ($protecciones as $proteccion) {
?>	
	$('a#ver<?= $proteccion['Proteccione']['id']; ?>').colorbox({inline: true, href:"#description<?= $proteccion['Proteccione']['id']; ?>", maxWidth: "500px"});
<?php
}
?>
});
// -->
</script>