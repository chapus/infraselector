<?php
	echo $this->Html->css(array('main/two_columns'));
?>
<div class="box-content" style="display:inline-block;">

<div class="left_box">
<div id='login_loading' style='display:none; float:right; width:45px; margin-top:8px; margin-right:25px;'></div>
<h3><?= $this->Html->image('infrasmall.png'); ?> Ciudad / Área</h3>

<h4><?php echo $ciudad['Ciudade']['name']; ?></h4>
<h4><?php echo $ciudad['Ciudade']['area']; ?></h4>
<div class="line"></div>

<table>
<tr>
	<td>Gerente:</td>
    <td><?= $ciudad['Ciudade']['gerente']; ?></td>
</tr>
<tr>
	<td>Técnico:</td>
    <td><?= $ciudad['Ciudade']['tecnico']; ?></td>
</tr>
<tr>
	<td>Sucursal:</td>
    <td><?= $ciudad['Ciudade']['sucursal']; ?></td>
</tr>
<tr>
	<td>Vendedor 1:</td>
    <td><?= $ciudad['Ciudade']['vendedor1']; ?></td>
</tr>
<tr>
	<td>Vendedor 2:</td>
    <td><?= $ciudad['Ciudade']['vendedor2']; ?></td>
</tr>
<tr>
	<td>Vendedor 3:</td>
    <td><?= $ciudad['Ciudade']['vendedor3']; ?></td>
</tr>
<tr>
	<td>Vendedor 4:</td>
    <td><?= $ciudad['Ciudade']['vendedor4']; ?></td>
</tr>
<tr>
	<td>Vendedor 5:</td>
    <td><?= $ciudad['Ciudade']['vendedor5']; ?></td>
</tr>
<tr>
	<td>Vendedor 6:</td>
    <td><?= $ciudad['Ciudade']['vendedor6']; ?></td>
</tr>
</table>


</div>

<div class="right_col">

</div>

</div>

