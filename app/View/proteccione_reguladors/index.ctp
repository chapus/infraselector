<div class="proteccioneReguladors index">
	<h2><?php __('Proteccione Reguladors');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('proteccione_id');?></th>
			<th><?php echo $this->Paginator->sort('regulador_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($proteccioneReguladors as $proteccioneRegulador):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $proteccioneRegulador['ProteccioneRegulador']['id']; ?>&nbsp;</td>
		<td><?php echo $proteccioneRegulador['ProteccioneRegulador']['proteccione_id']; ?>&nbsp;</td>
		<td><?php echo $proteccioneRegulador['ProteccioneRegulador']['regulador_id']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $proteccioneRegulador['ProteccioneRegulador']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $proteccioneRegulador['ProteccioneRegulador']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $proteccioneRegulador['ProteccioneRegulador']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $proteccioneRegulador['ProteccioneRegulador']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Proteccione Regulador', true), array('action' => 'add')); ?></li>
	</ul>
</div>