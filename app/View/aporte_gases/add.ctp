<div class="aporteGases form">
<?php echo $this->Form->create('AporteGase');?>
	<fieldset>
 		<legend><?php __('Add Aporte Gase'); ?></legend>
	<?php
		echo $this->Form->input('aporte_id');
		echo $this->Form->input('gase_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Aporte Gases', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Aportes', true), array('controller' => 'aportes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aporte', true), array('controller' => 'aportes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gases', true), array('controller' => 'gases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gas', true), array('controller' => 'gases', 'action' => 'add')); ?> </li>
	</ul>
</div>