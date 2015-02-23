<div class="aporteGases index">
	<h2><?php __('Aporte Gases');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('aporte_id');?></th>
			<th><?php echo $this->Paginator->sort('gase_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($aporteGases as $aporteGase):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $aporteGase['AporteGase']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($aporteGase['Aporte']['name'], array('controller' => 'aportes', 'action' => 'view', $aporteGase['Aporte']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($aporteGase['Gas']['name'], array('controller' => 'gases', 'action' => 'view', $aporteGase['Gas']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $aporteGase['AporteGase']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $aporteGase['AporteGase']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $aporteGase['AporteGase']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $aporteGase['AporteGase']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Aporte Gase', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Aportes', true), array('controller' => 'aportes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aporte', true), array('controller' => 'aportes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gases', true), array('controller' => 'gases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gas', true), array('controller' => 'gases', 'action' => 'add')); ?> </li>
	</ul>
</div>