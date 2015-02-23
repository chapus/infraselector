<div class="calibreGases view">
<h2><?php  __('Calibre Gase');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $calibreGase['CalibreGase']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Calibre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($calibreGase['Calibre']['name'], array('controller' => 'calibres', 'action' => 'view', $calibreGase['Calibre']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Gase'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($calibreGase['Gase']['name'], array('controller' => 'gases', 'action' => 'view', $calibreGase['Gase']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Calibre Gase', true), array('action' => 'edit', $calibreGase['CalibreGase']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Calibre Gase', true), array('action' => 'delete', $calibreGase['CalibreGase']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $calibreGase['CalibreGase']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Calibre Gases', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calibre Gase', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Calibres', true), array('controller' => 'calibres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calibre', true), array('controller' => 'calibres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gases', true), array('controller' => 'gases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gase', true), array('controller' => 'gases', 'action' => 'add')); ?> </li>
	</ul>
</div>
