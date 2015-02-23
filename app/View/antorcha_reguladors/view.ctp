<div class="antorchaReguladors view">
<h2><?php  __('Antorcha Regulador');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $antorchaRegulador['AntorchaRegulador']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Antorcha Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $antorchaRegulador['AntorchaRegulador']['antorcha_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Regulador Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $antorchaRegulador['AntorchaRegulador']['regulador_id']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Antorcha Regulador', true), array('action' => 'edit', $antorchaRegulador['AntorchaRegulador']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Antorcha Regulador', true), array('action' => 'delete', $antorchaRegulador['AntorchaRegulador']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $antorchaRegulador['AntorchaRegulador']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Antorcha Reguladors', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Antorcha Regulador', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
