<?php
	echo $this->Html->css(array('main/two_columns', 'forms/main'));
	
?>
<div class="box-content" style="display:inline-block; padding-top:20px;">

<div class="left_box">
<div id='login_loading' style='display:none; float:right; width:45px; margin-top:8px; margin-right:25px;'></div>
<h3><?= $this->Html->image('infrasmall.png'); ?> Agregar nueva Ciudad</h3>

<?php 
echo $this->Form->create('Ciudade');


		echo $this->Form->input('name', array('label' => 'Ciudad')).$this->Html->tag('div', 'Nombre de la Ciudad, no se pueden repetir con los existentes.','inputmsg');
		
		echo $this->Form->input('area', array('label' => 'Ciudad')).$this->Html->tag('div', 'Nombre de la Ciudad, no se pueden repetir con los existentes.','inputmsg');
		echo $this->Form->input('gerente', array('label' => 'Correo del Gerente')).$this->Html->tag('div', 'Correo del Gerente.','inputmsg');
		echo $this->Form->input('tecnico', array('label' => 'Correo del Técnico')).$this->Html->tag('div', 'Correo del Técnico.','inputmsg');
		echo $this->Form->input('sucursal', array('label' => 'Correo de la Sucursal')).$this->Html->tag('div', 'Correo de la Sucursal.','inputmsg');
		echo $this->Form->input('vendedor1', array('label' => 'Correo del vendedor 1')).$this->Html->tag('div', 'Correo del vendedor 1. (opcional)','inputmsg');
		echo $this->Form->input('vendedor2', array('label' => 'Correo del vendedor 2')).$this->Html->tag('div', 'Correo del vendedor 2. (opcional)','inputmsg');
		echo $this->Form->input('vendedor3', array('label' => 'Correo del vendedor 3')).$this->Html->tag('div', 'Correo del vendedor 3. (opcional)','inputmsg');
		echo $this->Form->input('vendedor4', array('label' => 'Correo del vendedor 4')).$this->Html->tag('div', 'Correo del vendedor 4. (opcional)','inputmsg');
		echo $this->Form->input('vendedor5', array('label' => 'Correo del vendedor 5')).$this->Html->tag('div', 'Correo del vendedor 5. (opcional)','inputmsg');
		echo $this->Form->input('vendedor6', array('label' => 'Correo del vendedor 6')).$this->Html->tag('div', 'Correo del vendedor 6. (opcional)','inputmsg');
		
		

	
?>
<div class="submit">
    <button class="rounded" id="submit">
      <span>Agregar nueva Ciudad</span>
    </button> 
</div>    
</form> 
</div>

<div class="right_box">
<h3>ayuda</h3>
<ul class="bblist">
<li><p>.</p></li>
</ul>
</div>

</div>