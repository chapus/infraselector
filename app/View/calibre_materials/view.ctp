<div class="calibreMaterials view">
<h2><?php  __('Calibre Material');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $calibreMaterial['CalibreMaterial']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Calibre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($calibreMaterial['Calibre']['name'], array('controller' => 'calibres', 'action' => 'view', $calibreMaterial['Calibre']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Material'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($calibreMaterial['Material']['name'], array('controller' => 'materials', 'action' => 'view', $calibreMaterial['Material']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Calibre Material', true), array('action' => 'edit', $calibreMaterial['CalibreMaterial']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Calibre Material', true), array('action' => 'delete', $calibreMaterial['CalibreMaterial']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $calibreMaterial['CalibreMaterial']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Calibre Materials', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calibre Material', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Calibres', true), array('controller' => 'calibres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calibre', true), array('controller' => 'calibres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Materials', true), array('controller' => 'materials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Material', true), array('controller' => 'materials', 'action' => 'add')); ?> </li>
	</ul>
</div>
