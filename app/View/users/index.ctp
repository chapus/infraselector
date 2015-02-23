<?php
	echo $this->Html->css(array('main/one_column', 'forms/admin_tables'));
	
	//debug($this->data);
?>
<script type="text/javascript">

$(function () {
        $('.item').each(function (index) {
			$(this).find("tr").mouseover(function() {
				$(this).css("backgroundColor", "#F1C49A");
			}).mouseout(function() {
				if($(this).attr('class') == "trow") {
				$(this).css("backgroundColor", "#F0F0F0");
				$(this).css("fontWeight", "normal");
				} else { $(this).css("backgroundColor", "#FFF"); }
			}).click(function() {
				$(this).css("backgroundColor", "#8DBEF3");
			});
			
		});

		
});
</script>
<div class="box-content" style="display:inline-block;">

<div class="one_box">
<div id='login_loading' style='display:none; float:right; width:45px; margin-top:8px; margin-right:25px;'></div>
<h3><?= $this->Html->image('infrasmall.png'); ?> Usuarios para Administración</h3>

<p>Tabla de Usuarios que están dados de alta para la administración del Selector.</p>


<div class="admin" align="center">
	<?= $this->Html->link("<button class='rounded' id='add'><span>Agregar Nuevo</span></button>", array('controller' => 'users', 'action' => 'add'), array('escape' => false), null); ?>
    <br />
    <?= $this->Html->link("<button class='rounded' id='add'><span>Regresar al Menu</span></button>", '/administracion', array('escape' => false), null); ?>
</div>


<table border="0" class="adm_table">
  <thead class="adm_header">
    <tr>
        <th><?php echo $this->Paginator->sort('first');?></th>
        <th><?php echo $this->Paginator->sort('last');?></th>
        <th><?php echo $this->Paginator->sort('name');?></th>
        <th><?php echo $this->Paginator->sort('email');?></th>
        <th><?php echo $this->Paginator->sort('group_id');?></th>
        <th><?php echo $this->Paginator->sort('level_id');?></th>
        <th><?php echo $this->Paginator->sort('enabled');?></th>
        <th>Acciones</th>
    </tr>
  </thead>
<tbody class="item">
<?php
$trow="";
$i =0;
foreach($users as $dat) {
	if($i==0) { $trow=""; $i=1; } else { $trow="trow"; $i=0; }
?>
        <tr class="<?= $trow; ?>" id="<?= "i".$dat['User']['id']; ?>">
          <td><?= $dat['User']['first']; ?></td>
          <td><?= $dat['User']['last']; ?></td>
          <td><?= $dat['User']['name']; ?></td>
          <td><?= $dat['User']['email']; ?></td>
          <td><?= $dat['Group']['name']; ?></td>
          <td><?= $dat['Level']['name']; ?></td>
          <td><?php 
		  if($dat['User']['enabled'] == 1) {
			  echo "Si";
		  } else {
			  echo "No";
		  }
		  ?></td>
          <td><?php 
		  //echo $this->Html->link('Ver', array('controller' => 'users', 'action' => 'view', $dat['User']['id']))."<br />"; 
		  //echo $this->Html->link('Editar', array('controller' => 'users', 'action' => 'edit', $dat['User']['id']))."<br />"; 
		  ?></td>
<?php
}
?>
</tbody>
</table>

<p class="pagging">
<?php
echo $this->Paginator->counter(array(
'format' => __('Página %page% de %pages%, mostrando %current% materiales a soldar de %count% en total, empezando del material a soldar %start%, al %end%', true)
));
?>	</p>
	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('Anterior', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('Siguiente', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>

</div>

</div>