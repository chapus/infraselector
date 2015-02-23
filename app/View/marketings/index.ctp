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
<h3><?= $this->Html->image('infrasmall.png'); ?> E-mails enviados a Clientes</h3>

<p>Tabla de todos los correos que han sido enviados a los clientes habilitados.</p>


<div class="admin" align="center">
	<?= $this->Html->link("<button class='rounded' id='add'><span>Enviar Correo</span></button>", '/marketings/send', array('escape' => false), null); ?>
    <?= $this->Html->link("<button class='rounded' id='add'><span>Regresar al Menu</span></button>", '/administracion', array('escape' => false), null); ?>
</div>


<table border="0" class="adm_table">
  <thead class="adm_header">
    <tr>
        <th><?php echo $this->Paginator->sort('Título', 'name');?></th>
        <th><?php echo $this->Paginator->sort('Mensaje', 'body');?></th>
        <th><?php echo $this->Paginator->sort('link');?></th>
        <th><?php echo $this->Paginator->sort('Generado', 'created');?></th>
        <th><?php echo $this->Paginator->sort('Enviado por', 'creator_id');?></th>
        <th>Acciones</th>
    </tr>
  </thead>
<tbody class="item">
<?php
$limit = 100;
$trow="";
$i =0;
foreach($marketings as $dat) {
	if($i==0) { $trow=""; $i=1; } else { $trow="trow"; $i=0; }
?>
        <tr class="<?= $trow; ?>" id="<?= "i".$dat['Marketing']['id']; ?>">
          <td><?= $dat['Marketing']['name']; ?></td>
          <td><?php 
		  
		  $body = strip_tags($dat['Marketing']['body']); 
			
			if(strlen($body) > $limit) {
				$body = substr($body, 0, strrpos(substr($body, 0, $limit), ' ')) . '...';
			}
			echo $body; 
			?></td>
          <td><?= $dat['Marketing']['link']; ?></td>
          <td><?= date("F j, Y", strtotime($dat['Marketing']['created'])); ?></td>
          <td><?= $dat['User']['name']; ?></td>
          <td><?php 
		  echo $this->Html->link('Ver', array('controller' => 'marketings', 'action' => 'view', $dat['Marketing']['id']))."<br />"; 
		  //echo $this->Html->link('Editar', array('controller' => 'users', 'action' => 'edit', $dat['Customer']['id']))."<br />"; 
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