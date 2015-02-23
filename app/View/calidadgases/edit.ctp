<?php
	echo $this->Html->css(array('main/two_columns', 'forms/main'));
	
?>
<div class="box-content" style="display:inline-block; padding-top:20px;">

<div class="left_box">
<div id='login_loading' style='display:none; float:right; width:45px; margin-top:8px; margin-right:25px;'></div>
<h3><?= $this->Html->image('infrasmall.png'); ?> Edición de Condición de Calidad</h3>

<?php echo $this->Form->create('Calidadgase', array('type' => 'file'));
		
		echo $this->Form->input('id');
		
		echo $this->Form->input('name', array('label' => 'Nombre Completo')).$this->Html->tag('div', 'Título que aparecerá en el selector, abajo de la imagen del Gas. Es una nota importante para el usuario.','inputmsg');

		echo $this->Form->input('description', array('label' => 'Descripción')).$this->Html->tag('div', 'La descripción puede ser de lo más extensa como se requiera.','inputmsg2');
		
		echo '<div class="mig_color">';
			echo $this->Form->input('MigCalibre', array('size' => 50, 'width' => '300') );
			
			echo $this->Form->input('MigGase', array('size' => 10) );
			
		echo '</div>';
		
		echo '<div class="tig_color">';
			echo $this->Form->input('TigCalibre', array('size' => 50) );
			
			echo $this->Form->input('TigGase', array('size' => 10) );
		echo '</div>';

		echo $this->Form->input('creator_id', array('type' => 'hidden', 'value' => $session_info['iduser']));
	
?>

<div class="submit">
    <button class="rounded" id="submit">
      <span>Editar Condición de Calidad</span>
    </button> 
</div>    
</form> 
</div>

<div class="right_box">
<h3>ayuda</h3>
<ul class="bblist">
<li><p>Como agregar un nuevo producto</p></li>
</ul>
</div>

</div>