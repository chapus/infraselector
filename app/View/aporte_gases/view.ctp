<div class="aporteGases view">
<h2><?php  __('Aporte Gase');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $aporteGase['AporteGase']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Aporte'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($aporteGase['Aporte']['name'], array('controller' => 'aportes', 'action' => 'view', $aporteGase['Aporte']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Gas'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($aporteGase['Gas']['name'], array('controller' => 'gases', 'action' => 'view', $aporteGase['Gas']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Aporte Gase', true), array('action' => 'edit', $aporteGase['AporteGase']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Aporte Gase', true), array('action' => 'delete', $aporteGase['AporteGase']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $aporteGase['AporteGase']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Aporte Gases', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aporte Gase', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aportes', true), array('controller' => 'aportes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aporte', true), array('controller' => 'aportes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gases', true), array('controller' => 'gases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gas', true), array('controller' => 'gases', 'action' => 'add')); ?> </li>
	</ul>
</div>
