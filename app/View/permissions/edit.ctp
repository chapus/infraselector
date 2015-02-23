<div class="permissions form">
<?php echo $this->Form->create('Permission');?>
	<fieldset>
 		<legend><?php __('Edit Permission'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('type');
		echo $this->Form->input('group_id');
		echo $this->Form->input('level_id');
		echo $this->Form->input('profile');
		echo $this->Form->input('principal');
		echo $this->Form->input('admin');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Permission.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Permission.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Permissions', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Levels', true), array('controller' => 'levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Level', true), array('controller' => 'levels', 'action' => 'add')); ?> </li>
	</ul>
</div>