<?php
	echo $this->Html->css(array('main/one_column', 'forms/admin_tables'));
	
	//debug($customers);
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
<h3><?= $this->Html->image('infrasmall.png'); ?> Clientes que han solicitado a un Asesor</h3>

<p>Tabla de Clientes que han mandando una selección ha un asesor.</p>


<div class="admin" align="center">
	<?= $this->Html->link("<button class='rounded' id='add'><span>Agregar Cliente Manual</span></button>", '/customers/manual', array('escape' => false), null); ?>
    <?= $this->Html->link("<button class='rounded' id='add'><span>Regresar al Menu</span></button>", '/administracion', array('escape' => false), null); ?>
</div>


<table border="0" class="adm_table">
  <thead class="adm_header">
    <tr>
        <th><?php echo $this->Paginator->sort('name');?></th>
        <th><?php echo $this->Paginator->sort('apeidos');?></th>
        <th><?php echo $this->Paginator->sort('telefono');?></th>
        <th><?php echo $this->Paginator->sort('correo');?></th>
        <th><?php echo $this->Paginator->sort('empresa');?></th>
        <th><?php echo $this->Paginator->sort('Ciudad', 'ciudade_id');?></th>
        <th><?php echo $this->Paginator->sort('selector');?></th>
        <th><?php echo $this->Paginator->sort('page');?></th>
        <th><?php echo $this->Paginator->sort('comments');?></th>
        <th><?php echo $this->Paginator->sort('Generado', 'created');?></th>
        <th>Acciones</th>
    </tr>
  </thead>
<tbody class="item">
<?php
$limit = 100;
$trow="";
$i =0;
foreach($customers as $dat) {
	if($i==0) { $trow=""; $i=1; } else { $trow="trow"; $i=0; }
?>
        <tr class="<?= $trow; ?>" id="<?= "i".$dat['Customer']['id']; ?>">
          <td><?= $dat['Customer']['name']; ?></td>
          <td><?= $dat['Customer']['apeidos']; ?></td>
          <td><?= $dat['Customer']['telefono']; ?></td>
          <td><?= $dat['Customer']['correo']; ?></td>
          <td><?= $dat['Customer']['empresa']; ?></td>
          <td><?= $dat['Ciudade']['name']; ?></td>
          <td><?php 
		  if($dat['Customer']['selector'] == '1') {
			 echo 'MIG'; 
		  }
		  if($dat['Customer']['selector'] == '2') {
			 echo 'TIG'; 
		  }
		  if($dat['Customer']['selector'] == '3') {
			 echo 'SMAW'; 
		  }
		  if($dat['Customer']['selector'] == '4') {
			 echo 'PAC'; 
		  }
		  ?></td>
          <td><?php 
		  	echo $this->Html->link('Selección', $dat['Customer']['page'], array('target' => 'blank') ); ?></td>
          <td><?php 
		  
		  $body = strip_tags($dat['Customer']['comments']); 
			
			if(strlen($body) > $limit) {
				$body = substr($body, 0, strrpos(substr($body, 0, $limit), ' ')) . '...';
			}
			echo $body; 
			?></td>
          <td><?= date("F j, Y", strtotime($dat['Customer']['created'])); ?></td>
          <td><?php 
		  echo $this->Html->link('Ver', array('controller' => 'customers', 'action' => 'view', $dat['Customer']['id']))."<br />"; 
		  echo $this->Html->link('Editar', array('controller' => 'customers', 'action' => 'edit', $dat['Customer']['id']))."<br />"; 
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