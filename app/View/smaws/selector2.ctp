<?php

//debug($material);

//debug($calibre);

//debug($gas);

//debug($maquina);

//debug($alternativo);

//debug($antorcha);

//debug($aporte);

//debug($regulador);

echo $this->Html->css(array('tables/stp2'));

echo $this->Html->script(array('selector2') );

?>
<script type="text/javascript">
<!--
$(document).ready(function() { 
	$('a#vmaq').colorbox({inline: true, href:"#dmaq", maxWidth: "500px"});
	$('a#vport').colorbox({inline: true, href:"#dport", maxWidth: "500px"});
	$('a#vjue').colorbox({inline: true, href:"#djue", maxWidth: "500px"});
	$('a#vapor').colorbox({inline: true, href:"#dapor", maxWidth: "500px"});
	<?php
	$i = 1;
	foreach($protecciones as $proteccion) {
		echo "$('a#vprot".$i."').colorbox({inline: true, href:'#dprot".$i."', maxWidth: '500px'});";
		$i++;
	}
	?>
});
-->
</script>

<div id="header">
    <?= $this->Html->image('fotos/smaw3v2.jpg'); ?>
    <div class="header-desc2">
        <h1>Proceso SMAW</h1>
        <h4>Selector de Procesos</h4>
        <p>Envíe su selección a un asesor.</p>
    </div>
</div><!-- end #header -->

<div id="content">
<h2>Envíe su selección a un asesor.</h2>
<p>De acuerdo al material base a soldar y su espesor seleccionado, INFRA le recomienda emplear los productos que a continuación se presentan.</p>
<p>&nbsp;</p>
<p>Obtenga mayor información y disponibilidad de nuestros equipos y consumibles enviando su selección a uno de nuestros asesores, que con gusto le atenderá.</p>
<p>&nbsp;</p>
<div class="infratbl">
<table width="600">
<thead>
<tr>
	<th>PRODUCTO</th>
    <th>DESCRIPCIÓN</th>
</tr>
</thead>

<tfoot>
<tr>
    <td colspan="2">
    <br />
	<div style="float:left; width:40%; padding:5px;">
	<?= $this->Html->link($this->Html->image('icons/back.png').'Vuelva a empezar', '/proceso-smaw', array('class' => 'large fancybtn size1', 'escape' => false) ); ?>
    </div>
    <div style="float:right; width:50%; padding:5px;">
    <a href="#" id="step1" class="large fancybtn size2"><?= $this->Html->image('icons/premium_support.png'); ?>Envíe a un asesor Infra</a>
    </div>
    <div style="float:left; width:40%; padding:5px;">
    <?= $this->Html->link($this->Html->image('icons/email.png').'Enviar por E-mail', 'mailto:?Subject=Selección SMAW&body=http://www.infra-selector.com.mx'.$_SERVER['REQUEST_URI'], array('class' => 'large fancybtn size1', 'escape' => false, 'target' => '_blank') ); ?>
    </div>
    <div style="float:right; width:50%; padding:5px;">
    <?php
	$printpdf = explode('step2', $_SERVER["REQUEST_URI"]);
	echo $this->Html->link($this->Html->image('icons/pdf.png').'Descargar información', '/pdf/smaw'.$printpdf[1], array('class' => 'large fancybtn size2', 'escape' => false, 'target' => '_blank') );
	?>
    </div>
    </td>
</tr>

<tr>
<td colspan="2">


<?php echo $this->Form->create('Customer', array('action' => 'add') ); ?>
<br />
<table class="customer" style="display:block;">

<thead>
<tr>
	<th></th>
    <th>DATOS PERSONALES</th>
</tr>
</thead>

<tr class="odd">
	<td width="140">NOMBRE <span class="required">*</span></td>
    <td width="415"><?= $this->Form->input('name', array('label' => '', 'div' => false, 'class' => 'input', 'size' => 50, 'maxlength' => 100) ); ?></td>
</tr>
<tr>
	<td>APELLIDOS <span class="required">*</span></td>
    <td><?= $this->Form->input('apeidos', array('label' => '', 'div' => false, 'class' => 'input', 'size' => 50, 'maxlength' => 100) ); ?></td>
</tr>
<tr class="odd">
	<td>TELÉFONO <span class="required">*</span></td>
    <td><?= $this->Form->input('telefono', array('label' => '', 'div' => false, 'class' => 'input', 'size' => 50, 'maxlength' => 100) ); ?></td>
</tr>
<tr>
	<td>CORREO <span class="required">*</span></td>
    <td><?= $this->Form->input('correo', array('label' => '', 'div' => false, 'class' => 'input', 'size' => 50, 'maxlength' => 100) ); ?></td>
</tr>
<tr class="odd">
	<td>EMPRESA</td>
    <td><?= $this->Form->input('empresa', array('label' => '', 'div' => false, 'class' => 'input', 'size' => 50, 'maxlength' => 100) ); ?></td>
</tr>
<tr>
	<td>CIUDAD</td>
    <td><?= $this->Form->input('ciudade_id', array('label' => '', 'div' => false, 'class' => 'input', 'empty' => true) ); ?></td>
</tr>
<tr class="odd">
	<td>COMENTARIOS</td>
    <td><?= $this->Form->textarea('comments', array('label' => '', 'div' => false, 'class' => 'input', 'size' => 50, 'escape' => false, 'cols' => 40, 'rows' => 5) ); ?></td>
</tr>
<tr class="odd">
    <td colspan="2"><?php 
		echo $this->Form->input('privacidad', array('type' => 'checkbox', 'label' => '', 'div' => '') )."   ";
		echo $this->Html->link('He leído Aviso de Privacidad', 'http://www.infra.com.mx/avisodeprivacidad.html', array('target' => '_blank') ).'<br />Los datos que usted proporcione en relación con su solicitud, están protedigos en términos del aviso de privacidad que puede ser consultado en '; ?><a href="http://www.infra.com.mx/avisodeprivacidad.html" target="_blank">Aviso de Privacidad</a></td>
</tr>

<tr>
	<td colspan="2" class="campob"><span style="float:right;">* Campos Obligatorios</span></td>
</tr>

<tr class="odd">
	<td><div class="loading" style="display:none;"></div></td>
    <td style="padding-top:10px;">
	<?= $this->Html->link('ENVIAR INFORMACIÓN', '#', array('class' => 'nmore', 'id' => 'submit') ); ?>
	</td>
</tr>

</table>


<?php echo $this->Form->input('page', array('type' => 'hidden', 'value' => $_SERVER["REQUEST_URI"]) ); ?>
<?php echo $this->Form->input('selector', array('type' => 'hidden', 'value' => 3) ); ?>
</form>

</td>
</tr>

</tfoot>

<tbody>
<tr>
	<th>Material</th>
	<td><?php 
	$calibrename = explode("-", $calibre['Calibre']['name']);
	echo $material['Material']['name']." - ".$calibrename[0];  
	?></td>
</tr>

<tr class="odd">
	<th>Máquina de Soldar</th>
	<td><?= $maquina['Maquina']['name']." <span class='pcod'>Código  ".$maquina['Maquina']['codigo']." </span>".$this->Html->link('Más información', '#maquina', array('class' => 'sendto', 'id' => 'vmaq')); ?></td>
</tr>

<tr>
	<th>Portaelectrodo</th>
	<td><?php 
		if($portaelectrodo['Portaelectrodo']['name'] == "N/A") {
				echo $portaelectrodo['Portaelectrodo']['description'];
			} else {
				echo $portaelectrodo['Portaelectrodo']['name']." <span class='pcod'>Código  ".$portaelectrodo['Portaelectrodo']['codigo']." </span>".$this->Html->link('Más información', '#portaelectrodo', array('class' => 'sendto', 'id' => 'vport'));
		}
	 ?></td>
</tr>

<tr class="odd">
	<th>Juego de Pas</th>
	<td><?php 
		if($juegopas['Juegopa']['name'] == "N/A") {
				echo $juegopas['Juegopa']['description'];
			} else {
				echo $juegopas['Juegopa']['name']." <span class='pcod'>Código  ".$juegopas['Juegopa']['codigo']." </span>".$this->Html->link('Más información', '#juegopas', array('class' => 'sendto', 'id' => 'vjue'));
		}
	?></td>
</tr>

<tr>
	<th>Material de Aporte</th>
	<td><?= $aporte['Aporte']['name']." <span class='pcod'>Código  ".$aporte['Aporte']['codigo']." </span>".$this->Html->link('Más información', '#aporte', array('class' => 'sendto', 'id' => 'vapor')); ?></td>
</tr>

<tr class="odd">
	<th>Artículos de Protección</th>
    <td>
    <?php
	$i = 1;
	foreach($protecciones as $proteccion) {
		echo "<div class='box'>".$this->Html->image('/'.$proteccion['Proteccione']['smallimage'], array('class' => 'stpimg') ).$proteccion['Proteccione']['name']." <span class='pcod'>Código  ".$proteccion['Proteccione']['codigo']." </span>".$this->Html->link('Más información', '#', array('class' => 'sendto', 'id' => 'vprot'.$i))."</div>";
		$i++;
	}
	?>
    </td>
</tr>

</tbody>

</table>
</div>

</div>

<div id="sidebar">
<div id="imgselection" class="infratbl">
<table width="250">
<tbody>

    <tr class="bold" id="maquina"><th><?= $maquina['Maquina']['name']." <span class='pcodimg'>Código  ".$maquina['Maquina']['codigo']." </span>"; ?></th></tr>
    <tr>
        <td><?= $this->Html->image('/'.$maquina['Maquina']['smallimage']); ?></td>
    </tr>
<?php
	if($portaelectrodo['Portaelectrodo']['codigo'] != "N/A") {
?>
    <tr class="bold" id="portaelectrodo"><th><?= $portaelectrodo['Portaelectrodo']['name']." <span class='pcodimg'>Código  ".$portaelectrodo['Portaelectrodo']['codigo']." </span>"; ?></th></tr>
    <tr>
        <td><?= $this->Html->image('/'.$portaelectrodo['Portaelectrodo']['smallimage']); ?></td>
    </tr>
<?php
	 }
?>

<?php
	if($juegopas['Juegopa']['codigo'] != "N/A") {
?>
    <tr class="bold" id="juegopas"><th><?= $juegopas['Juegopa']['name']." <span class='pcodimg'>Código  ".$juegopas['Juegopa']['codigo']." </span>"; ?></th></tr>
    <tr>
        <td><?= $this->Html->image('/'.$juegopas['Juegopa']['smallimage']); ?></td>
    </tr>
<?php
	 }
?>
    <tr class="bold" id="aporte"><th><?= $aporte['Aporte']['name']." <span class='pcodimg'>Código  ".$aporte['Aporte']['codigo']." </span>"; ?></th></tr>
    <tr>
        <td><?php 
		if($aporte['Aporte']['smallimage'] != null) {
			echo $this->Html->image('/'.$aporte['Aporte']['smallimage']);
		} else {
			echo $this->Html->image('aportes/default.png');
		}
		?></td>
    </tr>

</tbody>

</table>

</div>

</div>

<div class="clear"></div>

<div class="informations" style="display:none;">

<div id="dmaq"><?= $this->Html->image('/'.$maquina['Maquina']['smallimage'], array('class' => 'imgcentered') ).$maquina['Maquina']['description']; ?></div>
<div id="dport"><?= $this->Html->image('/'.$portaelectrodo['Portaelectrodo']['smallimage'], array('class' => 'imgcentered') ).$portaelectrodo['Portaelectrodo']['description']; ?></div>
<div id="djue"><?= $this->Html->image('/'.$juegopas['Juegopa']['smallimage'], array('class' => 'imgcentered') ).$juegopas['Juegopa']['description']; ?></div>
<div id="dapor"><?= $this->Html->image('/'.$aporte['Aporte']['smallimage'], array('class' => 'imgcentered') ).$aporte['Aporte']['description']; ?></div>
<?php
	$i = 1;
	foreach($protecciones as $proteccion) {
		echo "<div id='dprot$i'>".$this->Html->image('/'.$proteccion['Proteccione']['smallimage'], array('class' => 'imgcentered') ).$proteccion['Proteccione']['description']."</div>";
		$i++;
	}
?>
</div>

<div class="clear"></div>