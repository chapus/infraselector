<?php
	echo $this->Html->css(array('main/three_columns'));
?>
<style type="text/css">

.header-desc{ 
	width:178px; 
	padding:34px 19px 0px 19px;;
	margin-right:78px; 
	position:absolute; 
	z-index:15; 
	right:0px; 
	height:320px; 
	top:0px;
 }

</style>
<div id="header">
    <?= $this->Html->image('fotos/catalogo3.jpg'); ?>
    <div class="header-desc">
        <h1>Catálogo</h1>
        <h4>Selector de Procesos</h4>
        <p>Conozca nuestros productos por tipo de familia. Encuentre todos los que tenemos disponibles para nuestro Selector de Procesos.</p>
    </div>
</div><!-- end #header -->
<h2>Catálogo de Productos</h2>
<div id="content" class="full">

<div class="box-content" style="display:inline-block;">

<div class="three_box">
<h3><?= $this->Html->image('infrasmall.png'); ?> Gases de Protección</h3>
<ul class="bblist">
<li><?= $this->Html->link('Ver Catálogo', array('controller' => 'gases', 'action' => 'index')); ?></li>
</ul>

<h3><?= $this->Html->image('infrasmall.png'); ?> Máquinas de Soldar</h3>
<ul class="bblist">
<li><?= $this->Html->link('Ver Catálogo', array('controller' => 'maquinas', 'action' => 'index')); ?></li>
</ul>

<h3><?= $this->Html->image('infrasmall.png'); ?> Portaelectrodos</h3>
<ul class="bblist">
<li><?= $this->Html->link('Ver Catálogo', array('controller' => 'portaelectrodos', 'action' => 'index')); ?></li>
</ul>

<h3><?= $this->Html->image('infrasmall.png'); ?> juegos de pas</h3>
<ul class="bblist">
<li><?= $this->Html->link('Ver Catálogo', array('controller' => 'juegopas', 'action' => 'index')); ?></li>
</ul>
</div>


<div class="three_box">
<h3><?= $this->Html->image('infrasmall.png'); ?> materiales de aporte</h3>
<ul class="bblist">
<li><?= $this->Html->link('Ver Catálogo', array('controller' => 'aportes', 'action' => 'index')); ?></li>
</ul>

<h3><?= $this->Html->image('infrasmall.png'); ?> alimentadores de microalambre</h3>
<ul class="bblist">
<li><?= $this->Html->link('Ver Catálogo', array('controller' => 'microalambres', 'action' => 'index')); ?></li>
</ul>

<h3><?= $this->Html->image('infrasmall.png'); ?> antorchas</h3>
<ul class="bblist">
<li><?= $this->Html->link('Ver Catálogo', array('controller' => 'antorchas', 'action' => 'index')); ?></li>
</ul>

<h3><?= $this->Html->image('infrasmall.png'); ?> Artículos de Protección</h3>
<ul class="bblist">
<li><?= $this->Html->link('Ver Catálogo', array('controller' => 'protecciones', 'action' => 'index')); ?></li>
</ul>
</div>



<div class="three_box">
<h3><?= $this->Html->image('infrasmall.png'); ?> reguladores de presión</h3>
<ul class="bblist">
<li><?= $this->Html->link('Ver Catálogo', array('controller' => 'reguladors', 'action' => 'index')); ?></li>
</ul>

<h3><?= $this->Html->image('infrasmall.png'); ?> equipos alternativos</h3>
<ul class="bblist">
<li><?= $this->Html->link('Ver Catálogo', array('controller' => 'alternativos', 'action' => 'index')); ?></li>
</ul>
</div>

</div>

</div> <!-- CONTENT -->