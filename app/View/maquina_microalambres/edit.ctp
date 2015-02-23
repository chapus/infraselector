<div class="maquinaMicroalambres form">
<?php echo $this->Form->create('MaquinaMicroalambre');?>
	<fieldset>
 		<legend><?php __('Edit Maquina Microalambre'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('maquina_id');
		echo $this->Form->input('microalambre_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('MaquinaMicroalambre.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('MaquinaMicroalambre.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Maquina Microalambres', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Maquinas', true), array('controller' => 'maquinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maquina', true), array('controller' => 'maquinas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Microalambres', true), array('controller' => 'microalambres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Microalambre', true), array('controller' => 'microalambres', 'action' => 'add')); ?> </li>
	</ul>
</div>