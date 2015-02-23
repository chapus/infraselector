<div class="calibreMaterials form">
<?php echo $this->Form->create('CalibreMaterial');?>
	<fieldset>
 		<legend><?php __('Edit Calibre Material'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('calibre_id');
		echo $this->Form->input('material_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('CalibreMaterial.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('CalibreMaterial.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Calibre Materials', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Calibres', true), array('controller' => 'calibres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calibre', true), array('controller' => 'calibres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Materials', true), array('controller' => 'materials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Material', true), array('controller' => 'materials', 'action' => 'add')); ?> </li>
	</ul>
</div>