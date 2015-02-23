<?php
	echo $this->Html->css(array('main/two_columns', 'forms/main'));
	
?>
<div class="box-content" style="display:inline-block; padding-top:20px;">

<div class="left_box">
<div id='login_loading' style='display:none; float:right; width:45px; margin-top:8px; margin-right:25px;'></div>
<h3><?= $this->Html->image('infrasmall.png'); ?> Editar Cliente</h3>

<?php echo $this->Form->create('Customer');
		echo $this->Form->input('id');
		
		echo $this->Form->input('name', array('label' => 'Nombre(s)'));
		
		echo $this->Form->input('apeidos', array('label' => 'Apellidos'));
		
		echo $this->Form->input('telefono', array('label' => 'Teléfono'));
		echo $this->Form->input('correo', array('label' => 'Correo Electrónico'));
		echo $this->Form->input('empresa', array('label' => 'Empresa'));
		
		$options = array('1' => 'Proceso MIG', '2' => 'Proceso TIG', '3' => 'Proceso SMAW', '4' => 'Proceso PAC');
		echo $this->Form->input('selector', array('type' => 'select', 'options' => $options, 'label' => 'Proceso'));
		echo $this->Form->input('page', array('label' => 'Selección'));
		echo $this->Form->input('comments', array('label' => 'Comentarios'));
		
		echo $this->Form->input('ciudade_id', array('label' => 'Ciudad', 'empty' => true));
		
		$options = array('0' => 'NO', '1' => 'SI');
		echo $this->Form->input('hide', array('type' => 'select', 'options' => $options, 'label' => 'ESCONDER CLIENTE (NO VERLO DE NUEVO EN LA TABLA)'));
	
?>
    
<div class="submit">
    <button class="rounded" id="submit">
      <span>Editar Cliente</span>
    </button> 
</div>    
</form> 
</div>


<div class="right_box">
<h3>herramientas</h3>
<ul class="bblist">
<li><p>.</p></li>
</ul>
</div>

</div>