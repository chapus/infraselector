<?php
	echo $this->Html->css(array('main/two_columns', 'forms/main'));
	
	echo $this->element('tinymce');
?>
<div class="box-content" style="display:inline-block;">

<div class="left_box">
<div id='login_loading' style='display:none; float:right; width:45px; margin-top:8px; margin-right:25px;'></div>
<h3><?= $this->Html->image('infrasmall.png'); ?> Editar Juego de Pas</h3>

<?php echo $this->Form->create('Juegopa', array('type' => 'file'));
echo $this->Form->input('id');

?>
<div class="submit">
    <button class="rounded" id="submit">
      <span>Editar Juego de Pas</span>
    </button> 
</div>   
<?php
		echo $this->Form->input('codigo', array('label' => 'Código')).$this->Html->tag('div', 'Código del Producto','inputmsg');

		echo $this->Form->input('name', array('label' => 'Nombre Completo')).$this->Html->tag('div', 'Nombre completo del Gas de Protección','inputmsg');
		
		echo $this->Form->input('short', array('label' => 'Nombre Corto')).$this->Html->tag('div', 'Nombre popular o corto del gas de protección. Nota: este nombre sale debajo del nombre completo en letras pequeñas.','inputmsg');
		
		if($this->data['Juegopa']['smallimage']) {
			echo 'Se encontró una imagen.';
		}
		echo $this->Form->input('smallfile', array('type' => 'file', 'label' => 'Imagen chica')).$this->Html->tag('div', 'La imagen no debe pesar más de 1 mega, y el tamaño ideal tiene que ser de 200x200. No es necesario una imagen más grande.','inputmsg');
		
		if($this->data['Juegopa']['image']) {
			echo 'Se encontró una imagen.';
		}
		echo $this->Form->input('bigfile', array('type' => 'file', 'label' => 'Imagen grande')).$this->Html->tag('div', 'La imagen no debe pesar más de 2 Megas, y el tamaño ideal tiene que ser proporcional. El máximo es de 750x750 pixeles.','inputmsg');
		
		if($this->data['Juegopa']['image2']) {
			echo 'Se encontró una imagen.';
		}
		echo $this->Form->input('file2', array('type' => 'file', 'label' => 'Imagen 2')).$this->Html->tag('div', 'La imagen no debe pesar más de 2 Megas, y el tamaño ideal tiene que ser proporcional. El máximo es de 200x200 pixeles.','inputmsg');
		
		if($this->data['Juegopa']['image3']) {
			echo 'Se encontró una imagen.';
		}
		echo $this->Form->input('file3', array('type' => 'file', 'label' => 'Imagen 3')).$this->Html->tag('div', 'La imagen no debe pesar más de 2 Megas, y el tamaño ideal tiene que ser proporcional. El máximo es de 200x200 pixeles.','inputmsg');
		
		echo $this->Form->input('description', array('label' => 'Descripción')).$this->Html->tag('div', 'La descripción puede ser de lo más extensa como se requiera. Utilice la barra que se encuentra arriba para darle formato en HTML necesario a la descripción.','inputmsg2');
		
		echo $this->Form->input('infra_link', array('label' => 'Link Interno')).$this->Html->tag('div', 'El Link interno es opcional, si se tiene información adicional del producto dentro del portal de INFRA se puede poner el link aquí. Este aparecería en el Gas de Protección como link para mayor información.','inputmsg');
		
		echo $this->Form->input('creator_id', array('type' => 'hidden', 'value' => $session_info['iduser']));

	
	
	echo '<div class="smaw_color">';
	echo $this->Form->input('psmaw', array('type' => 'checkbox', 'label' => '¿Pertenece al proceso SMAW?</label?'));
		echo $this->Form->input('SmawPortaelectrodo');
		echo $this->Form->input('SmawAporte');
	echo '</div>'; 
	
			
?>
<div class="submit">
    <button class="rounded" id="submit">
      <span>Editar Juego de Pas</span>
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