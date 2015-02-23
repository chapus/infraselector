<div class="aporteGases form">
<?php echo $this->Form->create('AporteGase');?>
	<fieldset>
 		<legend><?php __('Edit Aporte Gase'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('aporte_id');
		echo $this->Form->input('gase_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('AporteGase.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('AporteGase.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Aporte Gases', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Aportes', true), array('controller' => 'aportes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aporte', true), array('controller' => 'aportes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gases', true), array('controller' => 'gases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gas', true), array('controller' => 'gases', 'action' => 'add')); ?> </li>
	</ul>
</div>