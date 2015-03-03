<?php
	echo $this->Html->css(array('main/two_columns', 'forms/main'));
	
	echo $this->element('tinymce');
?>
<div class="box-content" style="display:inline-block;">

<div class="left_box">
<div id='login_loading' style='display:none; float:right; width:45px; margin-top:8px; margin-right:25px;'></div>
<h3><?= $this->Html->image('infrasmall.png'); ?> Editar Alimentador de Micro Alambre</h3>

<?php echo $this->Form->create('Microalambre', array('type' => 'file'));
echo $this->Form->input('id');

		echo $this->Form->input('codigo', array('label' => 'Código')).$this->Html->tag('div', 'Código del Producto', array('class' => 'inputmsg') );

		echo $this->Form->input('name', array('label' => 'Nombre Completo')).$this->Html->tag('div', 'Nombre completo del Alimentador de Micro Alambre', array('class' => 'inputmsg') );
		
		echo $this->Form->input('short', array('label' => 'Nombre Corto')).$this->Html->tag('div', 'Nombre popular o corto del Alimentador de Micro Alambre. Nota: este nombre sale debajo del nombre completo en letras pequeñas.', array('class' => 'inputmsg') );
		
		echo $this->Form->input('smallfile', array('type' => 'file', 'label' => 'Imagen chica')).$this->Html->tag('div', 'La imagen no debe pesar más de 1 mega, y el tamaño ideal tiene que ser de 200x200. No es necesario una imagen más grande.', array('class' => 'inputmsg') );
		
		echo $this->Form->input('bigfile', array('type' => 'file', 'label' => 'Imagen grande')).$this->Html->tag('div', 'La imagen no debe pesar más de 2 Megas, y el tamaño ideal tiene que ser proporcional. El máximo es de 750x750 pixeles.', array('class' => 'inputmsg') );
		
		echo $this->Form->input('description', array('label' => 'Descripción')).$this->Html->tag('div', 'La descripción puede ser de lo más extensa como se requiera. Utilice la barra que se encuentra arriba para darle formato en HTML necesario a la descripción.', array('class' => 'inputmsg2') );
		
		echo $this->Form->input('infra_link', array('label' => 'Link Interno')).$this->Html->tag('div', 'El Link interno es opcional, si se tiene información adicional del producto dentro del portal de INFRA se puede poner el link aquí. Este aparecería en el Alimentador de Micro Alambre como links para mayor información.', array('class' => 'inputmsg') );
		
		echo $this->Form->input('creator_id', array('type' => 'hidden', 'value' => $session_info['iduser']));
		

	echo '<div class="mig_color">';
	echo $this->Form->input('pmig', array('type' => 'checkbox', 'label' => '¿Pertenece al proceso MIG?</label?'));
	
	echo $this->Form->input('MigAntorcha', array('label' => '¿Qué antorchas se relacionan con el Alimentador de Micro Alambre?')).$this->Html->tag('div', 'Para seleccionar más de una, dejar presionando CTRL y dar click a cada una de las antorchas que se necesiten. Para quitar de la selección a una o más presionar CTRL y dar click a la antorcha.', array('class' => 'inputmsg') );
	
	echo $this->Form->input('MigMaquina', array('label' => '¿Qué máquina se relacionan con el Alimentador de Micro Alambre?')).$this->Html->tag('div', 'Para seleccionar más de una, dejar presionando CTRL y dar click a cada una de las máquinas que se necesiten. Para quitar de la selección a una o más presionar CTRL y dar click a la máquina de soldar.', array('class' => 'inputmsg') );
	
	echo '</div>';
	
?>
<div class="submit">
    <button class="rounded" id="submit">
      <span>Editar Alimentador de Micro Alambre</span>
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