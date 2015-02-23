<div class="calibreGases index">
	<h2><?php __('Calibre Gases');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('calibre_id');?></th>
			<th><?php echo $this->Paginator->sort('gase_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($calibreGases as $calibreGase):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $calibreGase['CalibreGase']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($calibreGase['Calibre']['name'], array('controller' => 'calibres', 'action' => 'view', $calibreGase['Calibre']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($calibreGase['Gase']['name'], array('controller' => 'gases', 'action' => 'view', $calibreGase['Gase']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $calibreGase['CalibreGase']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $calibreGase['CalibreGase']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $calibreGase['CalibreGase']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $calibreGase['CalibreGase']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Calibre Gase', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Calibres', true), array('controller' => 'calibres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calibre', true), array('controller' => 'calibres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gases', true), array('controller' => 'gases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gase', true), array('controller' => 'gases', 'action' => 'add')); ?> </li>
	</ul>
</div>