<div class="permissions index">
	<h2><?php __('Permissions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('group_id');?></th>
			<th><?php echo $this->Paginator->sort('level_id');?></th>
			<th><?php echo $this->Paginator->sort('profile');?></th>
			<th><?php echo $this->Paginator->sort('principal');?></th>
			<th><?php echo $this->Paginator->sort('admin');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($permissions as $permission):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $permission['Permission']['id']; ?>&nbsp;</td>
		<td><?php echo $permission['Permission']['type']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($permission['Group']['name'], array('controller' => 'groups', 'action' => 'view', $permission['Group']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($permission['Level']['name'], array('controller' => 'levels', 'action' => 'view', $permission['Level']['id'])); ?>
		</td>
		<td><?php echo $permission['Permission']['profile']; ?>&nbsp;</td>
		<td><?php echo $permission['Permission']['principal']; ?>&nbsp;</td>
		<td><?php echo $permission['Permission']['admin']; ?>&nbsp;</td>
		<td><?php echo $permission['Permission']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $permission['Permission']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $permission['Permission']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $permission['Permission']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $permission['Permission']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Permission', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Levels', true), array('controller' => 'levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Level', true), array('controller' => 'levels', 'action' => 'add')); ?> </li>
	</ul>
</div>