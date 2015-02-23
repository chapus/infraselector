<?php
	echo $this->Html->css(array('main/two_columns', 'forms/main'));
	
	echo $this->element('tinymce');
?>
<div class="box-content" style="display:inline-block;">

<div class="left_box">
<div id='login_loading' style='display:none; float:right; width:45px; margin-top:8px; margin-right:25px;'></div>
<h3><?= $this->Html->image('infrasmall.png'); ?> Editar Artículo de Protección</h3>

<?php echo $this->Form->create('Proteccione', array('type' => 'file'));
echo $this->Form->input('id');

		echo $this->Form->input('codigo', array('label' => 'Código')).$this->Html->tag('div', 'Código del Producto','inputmsg');
		
		echo $this->Form->input('seccion_id', array('label' => 'Sección', 'empty' => true)).$this->Html->tag('div', 'Sección a la que pertenece','inputmsg');

		echo $this->Form->input('name', array('label' => 'Nombre Completo')).$this->Html->tag('div', 'Nombre completo del material a Soldar','inputmsg');
		
		echo $this->Form->input('short', array('label' => 'Nombre Corto')).$this->Html->tag('div', 'Nombre popular o corto del material a soldar. Nota: este nombre sale debajo del nombre completo en letras pequeñas.','inputmsg');
		
		echo $this->Form->input('smallfile', array('type' => 'file', 'label' => 'Imagen chica')).$this->Html->tag('div', 'La imagen no debe pesar más de 1 mega, y el tamaño ideal tiene que ser de 200x200. No es necesario una imagen más grande.','inputmsg');
		
		echo $this->Form->input('bigfile', array('type' => 'file', 'label' => 'Imagen grande')).$this->Html->tag('div', 'La imagen no debe pesar más de 2 Megas, y el tamaño ideal tiene que ser proporcional. El máximo es de 750x750 pixeles.','inputmsg');
		
		echo $this->Form->input('description', array('label' => 'Descripción')).$this->Html->tag('div', 'La descripción puede ser de lo más extensa como se requiera. Utilice la barra que se encuentra arriba para darle formato en HTML necesario a la descripción.','inputmsg2');
		
		echo $this->Form->input('infra_link', array('label' => 'Link Interno')).$this->Html->tag('div', 'El Link interno es opcional, si se tiene información adicional del producto dentro del portal de INFRA se puede poner el link aquí. Este aparecería en Artículo de Protección como link para mayor información.','inputmsg');
		
		echo $this->Form->input('creator_id', array('type' => 'hidden', 'value' => $session_info['iduser']));
		
?>

	<?= $this->Form->input('pmig', array('type' => 'checkbox', 'label' => '¿Pertenece al proceso MIG?</label?')); ?>
    <?= $this->Form->input('ptig', array('type' => 'checkbox', 'label' => '¿Pertenece al proceso TIG?</label?')); ?>
    <?= $this->Form->input('psmaw', array('type' => 'checkbox', 'label' => '¿Pertenece al proceso SMAW?</label?')); ?>
    <?= $this->Form->input('ppac', array('type' => 'checkbox', 'label' => '¿Pertenece al proceso Corte por Plasma?</label?')); ?>
<div class="submit">
    <button class="button" id="submit">
      <span>Editar Artículo de Protección</span>
    </button> 
</div>    
</form> 
</div>

<div class="right_box">
<h3>ayuda</h3>
<ul class="bblist">
<li><p>Edición de los Productos</p></li>
</ul>
</div>

</div>
