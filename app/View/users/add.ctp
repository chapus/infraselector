<?php
	echo $this->Html->css(array('main/two_columns', 'forms/main'));
?>
<div class="box-content" style="display:inline-block; padding-top:20px;">

<div class="left_box">
<div id='login_loading' style='display:none; float:right; width:45px; margin-top:8px; margin-right:25px;'></div>
<h3><?= $this->Html->image('infrasmall.png'); ?> Nuevo Usuario</h3>

<?php echo $this->Form->create('User');

		echo $this->Form->input('name', array('label' => 'Nombre de Usuario')).$this->Html->tag('div', 'El nombre de Usuario tiene que ser mínimo de 6 caracteres, no se aceptan mayúsculas, ni caracteres especiales, ni espacios en blanco.', array('class' => 'inputmsg') );
		echo $this->Form->input('email', array('label' => 'Correo electrónico')).$this->Html->tag('div', 'Correo electrónico de Infra.', array('class' => 'inputmsg') );	
		
		echo $this->Form->input('password', array('label' => 'Contraseña')).$this->Html->tag('div', 'La contraseña debe ser mínimo de 6 caracteres, sin espacios.', array('class' => 'inputmsg') );
		echo $this->Form->input('password2', array('type' => 'password', 'label' => 'Repítela', 'div' => 'input password')).$this->Html->tag('div', 'Repite la contraseña', array('class' => 'inputmsg') );
		
		echo $this->Form->input('group_id', array('label' => 'Grupo'));
		echo $this->Form->input('level_id', array('label' => 'Nivel'));
		
		echo $this->Form->input('first', array('label' => 'Nombre'));
		echo $this->Form->input('last', array('label' => 'Apellidos'));

		echo $this->Form->input('creator_id', array('type' => 'hidden', 'value' => $session_info['iduser']));

?>
<div class="submit">
    <button class="rounded" id="submit">
      <span>Agregar Nuevo Usuario</span>
    </button> 
</div>    
</form> 
</div>

<div class="right_box">
<h3>ayuda</h3>
<ul class="bblist">
<li><p>Agregar un Usuario, detalles.</p></li>
</ul>
</div>


</div>