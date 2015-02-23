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
<h3><?= $this->Html->image('infrasmall.png'); ?> Ciudades / Áreas</h3>

<p>Tabla de todas las ciudades que aparecerán para enviar la petición.</p>


<div class="admin" align="center">
	<?= $this->Html->link("<button class='rounded' id='add'><span>Agregar Ciudad/Área</span></button>", '/ciudades/add', array('escape' => false), null); ?>
    <?= $this->Html->link("<button class='rounded' id='add'><span>Regresar al Menu</span></button>", '/administracion', array('escape' => false), null); ?>
</div>


<table border="0" class="adm_table">
  <thead class="adm_header">
    <tr>
        <th><?php echo $this->Paginator->sort('Ciudad', 'name');?></th>
        <th><?php echo $this->Paginator->sort('Área', 'area');?></th>
        <th><?php echo $this->Paginator->sort('Gerente', 'gerente');?></th>
        <th><?php echo $this->Paginator->sort('Técnico', 'tecnico');?></th>
        <th><?php echo $this->Paginator->sort('Sucursal', 'sucursal');?></th>
        <th><?php echo $this->Paginator->sort('Creado', 'created');?></th>
        <th><?php echo $this->Paginator->sort('Creador', 'creator_id');?></th>
        <th>Acciones</th>
    </tr>
  </thead>
<tbody class="item">
<?php
$limit = 100;
$trow="";
$i =0;
foreach($ciudades as $dat) {
	if($i==0) { $trow=""; $i=1; } else { $trow="trow"; $i=0; }
?>
        <tr class="<?= $trow; ?>" id="<?= "i".$dat['Ciudade']['id']; ?>">
          <td><?= $dat['Ciudade']['name']; ?></td>
          <td><?= $dat['Ciudade']['area']; ?></td>
          <td><?= $dat['Ciudade']['gerente']; ?></td>
          <td><?= $dat['Ciudade']['tecnico']; ?></td>
          <td><?= $dat['Ciudade']['sucursal']; ?></td>
          <td><?= date("F j, Y", strtotime($dat['Ciudade']['created'])); ?></td>
          <td><?= $dat['User']['name']; ?></td>
          <td><?php 
		  echo $this->Html->link('Ver', array('controller' => 'ciudades', 'action' => 'view', $dat['Ciudade']['id']))."<br />"; 
		  echo $this->Html->link('Editar', array('controller' => 'ciudades', 'action' => 'edit', $dat['Ciudade']['id']))."<br />"; 
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