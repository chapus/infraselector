<?php
	echo $this->Html->css(array('main/one_column', 'forms/admin_tables'));
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
<h3><?= $this->Html->image('infrasmall.png'); ?> Material/Calibre - Accesorios para Ensamblaje</h3>
<p>&nbsp;</p>
<div class="search">
<span class="stitle">Buscador
<?php
if(isset($this->data)) {
	echo $this->Paginator->counter(array('format' => __(' - Se encontraron %count% resultados', true)));
}
?>
</span>
<?php
$limit = 200;
//debug($data);
//debug($this->data);
	echo $this->Form->create('Accesorio', array(
		'url' => array_merge(array('action' => 'view'), $this->params['pass'])
		));
	echo $this->Form->input('ceramica', array('label' => 'Ceramica'));
	echo $this->Form->input('portamordaza', array('label' => 'Porta Mordaza'));
	echo $this->Form->input('mordaza', array('label' => 'Mordaza'));
	echo $this->Form->input('tapa', array('label' => 'Tapa'));
	echo $this->Form->input('tungsteno', array('label' => 'Tungsteno'));
	
	echo $this->Html->tag('div', "<button class='rounded' id='submit'><span>Buscar</span></button>", array('id' => 'submit') );
	echo $this->Form->end();
	
?>
</div>
<div class="admin" align="center">
	<?= $this->Html->link("<button class='rounded' id='add'><span>Agregar Nuevo</span></button>", array('controller' => 'accesorios', 'action' => 'add'), array('escape' => false), null); ?>
    <br />
    <?= $this->Html->link("<button class='rounded' id='add'><span>Regresar al Menu</span></button>", '/administracion', array('escape' => false), null); ?>
</div>
<table border="0" class="adm_table">
  <thead class="adm_header">
    <tr>
      <th><?php echo $this->Paginator->sort('Ceramica', 'ceramica');?></th>
      <th><?php echo $this->Paginator->sort('Porta Mordaza', 'portamordaza');?></th>
      <th><?php echo $this->Paginator->sort('Mordaza', 'mordaza');?></th>
      <th><?php echo $this->Paginator->sort('Tapa', 'tapa');?></th>
      <th><?php echo $this->Paginator->sort('Tungsteno', 'tungsteno');?></th>
      <th><?php echo $this->Paginator->sort('Creado', 'created');?></th>
      <th>Acciones</th>
    </tr>
  </thead>
<tbody class="item">
<?php
$trow="";
$i =0;
foreach($data as $dat) {
	if($i==0) { $trow=""; $i=1; } else { $trow="trow"; $i=0; }
?>
        <tr class="<?= $trow; ?>" id="<?= "i".$dat['Accesorio']['id']; ?>">
          <td><?= $dat['Accesorio']['ceramica']; ?></td>
          <td><?= $dat['Accesorio']['portamordaza']; ?></td>
          <td><?= $dat['Accesorio']['mordaza']; ?></td>
          <td><?= $dat['Accesorio']['tapa']; ?></td>
          <td><?= $dat['Accesorio']['tungsteno']; ?></td>
          
          <td><?= date("F j, Y", strtotime($dat['Accesorio']['created'])); ?></td>
          
          <td><?php 
		  echo $this->Html->link('Ver', array('controller' => 'accesorios', 'action' => 'viewby', $dat['Accesorio']['id']))."<br />"; 
		  echo $this->Html->link('Editar', array('controller' => 'accesorios', 'action' => 'edit', $dat['Accesorio']['id'] ))."<br />"; 
		  ?></td>
        </tr>
<?php
}
?>
</tbody>
</table>

<p class="pagging">
<?php
echo $this->Paginator->counter(array(
'format' => __('Página %page% de %pages%, mostrando %current% maquinas de lámina de %count% en total, empezando del calibre de lámina %start%, al %end%')
));
?>	</p>
	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('Anterior'), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('Siguiente') . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>

</div>
<?php
	echo $this->Html->css(array('cluetip/jquery.cluetip'));
?>

</div>