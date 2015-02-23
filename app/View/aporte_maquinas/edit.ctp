<div class="aporteMaquinas form">
<?php echo $this->Form->create('AporteMaquina');?>
	<fieldset>
 		<legend><?php __('Edit Aporte Maquina'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('aporte_id');
		echo $this->Form->input('maquina_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('AporteMaquina.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('AporteMaquina.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Aporte Maquinas', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Aportes', true), array('controller' => 'aportes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aporte', true), array('controller' => 'aportes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Maquinas', true), array('controller' => 'maquinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maquina', true), array('controller' => 'maquinas', 'action' => 'add')); ?> </li>
	</ul>
</div>