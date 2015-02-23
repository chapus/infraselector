<div class="maquinaMicroalambres view">
<h2><?php  __('Maquina Microalambre');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $maquinaMicroalambre['MaquinaMicroalambre']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Maquina'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($maquinaMicroalambre['Maquina']['name'], array('controller' => 'maquinas', 'action' => 'view', $maquinaMicroalambre['Maquina']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Microalambre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($maquinaMicroalambre['Microalambre']['name'], array('controller' => 'microalambres', 'action' => 'view', $maquinaMicroalambre['Microalambre']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Maquina Microalambre', true), array('action' => 'edit', $maquinaMicroalambre['MaquinaMicroalambre']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Maquina Microalambre', true), array('action' => 'delete', $maquinaMicroalambre['MaquinaMicroalambre']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $maquinaMicroalambre['MaquinaMicroalambre']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Maquina Microalambres', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maquina Microalambre', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Maquinas', true), array('controller' => 'maquinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maquina', true), array('controller' => 'maquinas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Microalambres', true), array('controller' => 'microalambres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Microalambre', true), array('controller' => 'microalambres', 'action' => 'add')); ?> </li>
	</ul>
</div>
