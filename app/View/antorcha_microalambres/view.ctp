<div class="antorchaMicroalambres view">
<h2><?php  __('Antorcha Microalambre');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $antorchaMicroalambre['AntorchaMicroalambre']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Antorcha'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($antorchaMicroalambre['Antorcha']['name'], array('controller' => 'antorchas', 'action' => 'view', $antorchaMicroalambre['Antorcha']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Microalambre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($antorchaMicroalambre['Microalambre']['name'], array('controller' => 'microalambres', 'action' => 'view', $antorchaMicroalambre['Microalambre']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Antorcha Microalambre', true), array('action' => 'edit', $antorchaMicroalambre['AntorchaMicroalambre']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Antorcha Microalambre', true), array('action' => 'delete', $antorchaMicroalambre['AntorchaMicroalambre']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $antorchaMicroalambre['AntorchaMicroalambre']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Antorcha Microalambres', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Antorcha Microalambre', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Antorchas', true), array('controller' => 'antorchas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Antorcha', true), array('controller' => 'antorchas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Microalambres', true), array('controller' => 'microalambres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Microalambre', true), array('controller' => 'microalambres', 'action' => 'add')); ?> </li>
	</ul>
</div>
