<div class="proteccioneReguladors form">
<?php echo $this->Form->create('ProteccioneRegulador');?>
	<fieldset>
 		<legend><?php __('Add Proteccione Regulador'); ?></legend>
	<?php
		echo $this->Form->input('proteccione_id');
		echo $this->Form->input('regulador_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Proteccione Reguladors', true), array('action' => 'index'));?></li>
	</ul>
</div>