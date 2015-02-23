<div class="logins form">
<?php echo $this->Form->create('Login');?>
	<fieldset>
 		<legend><?php __('Edit Login'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('count');
		echo $this->Form->input('user_id');
		echo $this->Form->input('last_login');
		echo $this->Form->input('current_login');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Login.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Login.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Logins', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>