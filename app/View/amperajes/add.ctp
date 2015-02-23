<?php
	echo $this->Html->css(array('main/two_columns', 'forms/main'));
	
?>
<div class="box-content" style="display:inline-block; padding-top:20px;">

<div class="left_box">
<div id='login_loading' style='display:none; float:right; width:45px; margin-top:8px; margin-right:25px;'></div>
<h3><?= $this->Html->image('infrasmall.png'); ?> Edición de Rangos de Amperaje</h3>

<?php echo $this->Form->create('Amperaje', array('type' => 'file'));
		
		echo $this->Form->input('name', array('label' => 'Nombre Completo')).$this->Html->tag('div', 'Título que aparecerá en el selector, abajo de la imagen del Calibre. Es una nota importante para el usuario.','inputmsg');

		
		echo '<div class="tig_color">';
			echo $this->Form->input('TigCalibre', array('size' => 50) );
			
			echo $this->Form->input('TigMaterial', array('size' => 10) );
		echo '</div>';

		echo $this->Form->input('creator_id', array('type' => 'hidden', 'value' => $session_info['iduser']));
	
?>

<div class="submit">
    <button class="rounded" id="submit">
      <span>Guardar Rango de Amperaje</span>
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