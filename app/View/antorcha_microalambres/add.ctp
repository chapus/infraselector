<div class="antorchaMicroalambres form">
<?php echo $this->Form->create('AntorchaMicroalambre');?>
	<fieldset>
 		<legend><?php __('Add Antorcha Microalambre'); ?></legend>
	<?php
		echo $this->Form->input('antorcha_id');
		echo $this->Form->input('microalambre_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Antorcha Microalambres', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Antorchas', true), array('controller' => 'antorchas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Antorcha', true), array('controller' => 'antorchas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Microalambres', true), array('controller' => 'microalambres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Microalambre', true), array('controller' => 'microalambres', 'action' => 'add')); ?> </li>
	</ul>
</div>