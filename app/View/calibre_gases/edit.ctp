<div class="calibreGases form">
<?php echo $this->Form->create('CalibreGase');?>
	<fieldset>
 		<legend><?php __('Edit Calibre Gase'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('calibre_id');
		echo $this->Form->input('gase_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('CalibreGase.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('CalibreGase.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Calibre Gases', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Calibres', true), array('controller' => 'calibres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calibre', true), array('controller' => 'calibres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gases', true), array('controller' => 'gases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gase', true), array('controller' => 'gases', 'action' => 'add')); ?> </li>
	</ul>
</div>