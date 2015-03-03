<?php
	echo $this->Html->css(array('main/two_columns', 'forms/main'));
	
	echo $this->element('tinymce');
?>
<div class="box-content" style="display:inline-block; padding-top:20px;">

<div class="left_box">
<div id='login_loading' style='display:none; float:right; width:45px; margin-top:8px; margin-right:25px;'></div>
<h3><?= $this->Html->image('infrasmall.png'); ?> Editar Calibre de lámina (espesor)</h3>

<?php echo $this->Form->create('Calibre', array('type' => 'file'));
echo $this->Form->input('id');
?>
<div class="submit">
    <button class="rounded" id="submit">
      <span>Editar Calibre de Lámina</span>
    </button> 
</div>   
<?php
		echo $this->Form->input('name', array('label' => 'Nombre Completo')).$this->Html->tag('div', 'Nombre completo del calibre de lámina', array('class' => 'inputmsg') );
		
		echo $this->Form->input('short', array('label' => 'Nombre Corto')).$this->Html->tag('div', 'Nombre popular o corto del calibre de lámina. Nota: este nombre sale debajo del nombre completo en letras pequeñas.', array('class' => 'inputmsg') );
		
		if($this->data['Calibre']['smallimage']) {
			echo 'Se encontró una imagen.';
		}
		echo $this->Form->input('smallfile', array('type' => 'file', 'label' => 'Imagen chica')).$this->Html->tag('div', 'La imagen no debe pesar más de 1 mega, y el tamaño ideal tiene que ser de 200x200. No es necesario una imagen más grande.', array('class' => 'inputmsg') );
		
		if($this->data['Calibre']['image']) {
			echo 'Se encontró una imagen.';
		}
		echo $this->Form->input('bigfile', array('type' => 'file', 'label' => 'Imagen grande')).$this->Html->tag('div', 'La imagen no debe pesar más de 2 Megas, y el tamaño ideal tiene que ser proporcional. El máximo es de 750x750 pixeles.', array('class' => 'inputmsg') );
		
		echo $this->Form->input('description', array('label' => 'Descripción')).$this->Html->tag('div', 'La descripción puede ser de lo más extensa como se requiera. Utilice la barra que se encuentra arriba para darle formato en HTML necesario a la descripción.', array('class' => 'inputmsg2') );
		
		echo $this->Form->input('infra_link', array('label' => 'Link Interno')).$this->Html->tag('div', 'El Link interno es opcional, si se tiene información adicional del producto dentro del portal de INFRA se puede poner el link aquí. Este aparecería en el calibre de lámina como link para mayor información.', array('class' => 'inputmsg') );
		
		
		echo $this->Form->input('creator_id', array('type' => 'hidden', 'value' => $session_info['iduser']));
		
	
	echo '<div class="mig_color">';
	echo $this->Form->input('pmig', array('type' => 'checkbox', 'label' => '¿Pertenece al proceso MIG?</label?')); 
		echo $this->Form->input('MigGase');
	echo '</div>';
	
	
	echo '<div class="tig_color">';
	echo $this->Form->input('ptig', array('type' => 'checkbox', 'label' => '¿Pertenece al proceso TIG?</label?')); 
		echo $this->Form->input('TigGase');
	echo '</div>';
	
	
	echo '<div class="smaw_color">';
	echo $this->Form->input('psmaw', array('type' => 'checkbox', 'label' => '¿Pertenece al proceso SMAW?</label?'));
	echo $this->Form->input('SmawMaquina');
	echo '</div>'; 
	
	echo '<div class="pac_color">';
	echo $this->Form->input('ppac', array('type' => 'checkbox', 'label' => '¿Pertenece al proceso Corte por Plasma?</label?'));
	echo $this->Form->input('PacMaquina');
	echo '</div>'; 
	
	$urlchingon = str_replace(array('_', '-'), array('/', ':'), $url);
	
	echo $this->Form->input('url', array('label' => '', 'type' => 'hidden', 'value' => $urlchingon));
 
 ?>
<div class="submit">
    <button class="rounded" id="submit">
      <span>Editar Calibre de Lámina</span>
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