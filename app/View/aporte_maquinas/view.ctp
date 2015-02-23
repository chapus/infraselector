<div class="aporteMaquinas view">
<h2><?php  __('Aporte Maquina');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $aporteMaquina['AporteMaquina']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Aporte'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($aporteMaquina['Aporte']['name'], array('controller' => 'aportes', 'action' => 'view', $aporteMaquina['Aporte']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Maquina'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($aporteMaquina['Maquina']['name'], array('controller' => 'maquinas', 'action' => 'view', $aporteMaquina['Maquina']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Aporte Maquina', true), array('action' => 'edit', $aporteMaquina['AporteMaquina']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Aporte Maquina', true), array('action' => 'delete', $aporteMaquina['AporteMaquina']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $aporteMaquina['AporteMaquina']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Aporte Maquinas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aporte Maquina', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aportes', true), array('controller' => 'aportes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aporte', true), array('controller' => 'aportes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Maquinas', true), array('controller' => 'maquinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maquina', true), array('controller' => 'maquinas', 'action' => 'add')); ?> </li>
	</ul>
</div>
