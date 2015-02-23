<?php
	echo $this->Html->css(array('main/two_columns', 'forms/main'));
?>
<div class="box-content" style="display:inline-block;">

<div class="left_box">
<div id='login_loading' style='display:none; float:right; width:45px; margin-top:8px; margin-right:25px;'></div>
<h3><?= $this->Html->image('infrasmall.png'); ?> sección para Art. de Protección</h3>

<?php echo $this->Form->create('Seccion');
		
		echo $this->Form->input('id');
		
		echo $this->Form->input('name', array('label' => 'Nombre de la Sección')).$this->Html->tag('div', 'Nombre para la Sección','inputmsg');
		
		echo $this->Form->input('creator_id', array('type' => 'hidden', 'value' => $session_info['iduser']));
	
?>

<div class="submit">
    <button class="rounded" id="submit">
      <span>Guardar Cambios</span>
    </button> 
</div>    
</form> 
</div>

<div class="right_box">
<h3>ayuda</h3>
<ul class="bblist">
<li></li>
</ul>
</div>


</div>