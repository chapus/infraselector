<div class="aporteMaquinas index">
	<h2><?php __('Aporte Maquinas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('aporte_id');?></th>
			<th><?php echo $this->Paginator->sort('maquina_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($aporteMaquinas as $aporteMaquina):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $aporteMaquina['AporteMaquina']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($aporteMaquina['Aporte']['name'], array('controller' => 'aportes', 'action' => 'view', $aporteMaquina['Aporte']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($aporteMaquina['Maquina']['name'], array('controller' => 'maquinas', 'action' => 'view', $aporteMaquina['Maquina']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $aporteMaquina['AporteMaquina']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $aporteMaquina['AporteMaquina']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $aporteMaquina['AporteMaquina']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $aporteMaquina['AporteMaquina']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Aporte Maquina', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Aportes', true), array('controller' => 'aportes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aporte', true), array('controller' => 'aportes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Maquinas', true), array('controller' => 'maquinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maquina', true), array('controller' => 'maquinas', 'action' => 'add')); ?> </li>
	</ul>
</div>