<div class="antorchaReguladors form">
<?php echo $this->Form->create('AntorchaRegulador');?>
	<fieldset>
 		<legend><?php __('Add Antorcha Regulador'); ?></legend>
	<?php
		echo $this->Form->input('antorcha_id');
		echo $this->Form->input('regulador_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Antorcha Reguladors', true), array('action' => 'index'));?></li>
	</ul>
</div>