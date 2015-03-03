<?php
	echo $this->Html->css(array('main/two_columns', 'forms/main'));
	
	echo $this->element('tinymce');
?>
<div class="box-content" style="display:inline-block; padding-top:20px;">

<div class="left_box">
<div id='login_loading' style='display:none; float:right; width:45px; margin-top:8px; margin-right:25px;'></div>
<h3><?= $this->Html->image('infrasmall.png'); ?> Forma para enviar Correo a Clientes</h3>

<?php 
echo $this->Form->create('Marketing', array('type' => 'file'));


		echo $this->Form->input('name', array('label' => 'Subject')).$this->Html->tag('div', 'Título del mensaje que aparecerá en los correos');
		
		echo $this->Form->input('body', array('label' => 'Mensaje')).$this->Html->tag('div', 'Mensaje que aparecerá dentro del correo.', array('class' => 'inputmsg') );
		

	
?>
<h4>Total de Clientes habilitados para enviar Correo: <b><?= $clientes; ?></b></h4>
<div class="submit">
    <button class="rounded" id="submit">
      <span>Enviar Correo electrónico</span>
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