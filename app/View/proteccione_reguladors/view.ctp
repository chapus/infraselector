<div class="proteccioneReguladors view">
<h2><?php  __('Proteccione Regulador');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $proteccioneRegulador['ProteccioneRegulador']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Proteccione Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $proteccioneRegulador['ProteccioneRegulador']['proteccione_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Regulador Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $proteccioneRegulador['ProteccioneRegulador']['regulador_id']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Proteccione Regulador', true), array('action' => 'edit', $proteccioneRegulador['ProteccioneRegulador']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Proteccione Regulador', true), array('action' => 'delete', $proteccioneRegulador['ProteccioneRegulador']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $proteccioneRegulador['ProteccioneRegulador']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Proteccione Reguladors', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proteccione Regulador', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
