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
<h3><?= $this->Html->image('infrasmall.png'); ?> Materiales a Soldar</h3>
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
//debug($this->params);
	echo $this->Form->create('Material', array(
		'url' => array_merge(array('action' => 'viewall'), $this->params['pass'])
		));
	echo $this->Form->input('name', array('label' => 'Por Nombre Completo'));
	echo $this->Form->input('short', array('label' => 'Por Nombre corto'));
	echo $this->Form->input('description', array('type' => 'text', 'label' => 'Por Descripción'));
	//debug($this->params);
	
	$pmig = false; $ptig = false; $psmaw = false; $ppac = false;
		//debug($this->params['named']['p-mig']);
		if(isset($this->params['named']['pmig']) && $this->params['named']['pmig'] == 1) { $pmig = true; } else { $pmig = false; }
		if(isset($this->params['named']['ptig']) && $this->params['named']['ptig'] == 1) { $ptig = true; } else { $ptig = false; }
		if(isset($this->params['named']['psmaw']) && $this->params['named']['psmaw'] == 1) { $psmaw = true; } else { $psmaw = false; }
		if(isset($this->params['named']['ppac']) && $this->params['named']['ppac'] == 1) { $ppac = true; } else { $ppac = false; }

	echo $this->Form->input('pmig', array('type' => 'checkbox', 'hiddenField' => false, 'label' => 'Proceso MIG', 'checked' => $pmig));
	echo $this->Form->input('ptig', array('type' => 'checkbox', 'hiddenField' => false, 'label' => 'Proceso TIG', 'checked' => $ptig));
	echo $this->Form->input('psmaw', array('type' => 'checkbox', 'hiddenField' => false, 'label' => 'Proceso SMAW', 'checked' => $psmaw));
	echo $this->Form->input('ppac', array('type' => 'checkbox', 'hiddenField' => false, 'label' => 'Proceso PAC', 'checked' => $ppac));
	
	echo $this->Html->tag('div', "<button class='rounded' id='submit'><span>Buscar</span></button>", 'submit');
	echo $this->Form->end();
	
?>
</div>
<div class="admin" align="center">
	<?= $this->Html->link("<button class='rounded' id='add'><span>Agregar Nuevo</span></button>", array('controller' => 'materials', 'action' => 'add'), array('escape' => false), null); ?>
    <br />
    <?= $this->Html->link("<button class='rounded' id='add'><span>Regresar al Menu</span></button>", '/administracion', array('escape' => false), null); ?>
</div>
<table border="0" class="adm_table">
  <thead class="adm_header">
    <tr>
      <th><?php echo $this->Paginator->sort('Imagen', 'image');?></th>
      <th><?php echo $this->Paginator->sort('Nombre', 'name');?></th>
      <th><?php echo $this->Paginator->sort('Nombre corto', 'short');?></th>
      <th><?php echo $this->Paginator->sort('Descripción', 'description');?></th>
      <th><?php echo $this->Paginator->sort('Infra Link', 'infra_link');?></th>
      <th class="mig"><?php echo $this->Paginator->sort('MIG', 'pmig');?></th>
      <th class="tig"><?php echo $this->Paginator->sort('TIG', 'ptig');?></th>
      <th class="smaw"><?php echo $this->Paginator->sort('SMAW', 'psmaw');?></th>
      <th class="pac"><?php echo $this->Paginator->sort('PAC', 'ppac');?></th>
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
        <tr class="<?= $trow; ?>" id="<?= "i".$dat['Material']['id']; ?>">
          <td><?php 
		  if($dat['Material']['image'] != "") {
		  	echo $this->Html->image('/'.$dat['Material']['image'], array('class' => 'imagen'));
		  } else {
			echo $this->Html->image('fotos/no_image.png', array('class' => 'imagen'));
		  }
		  ?></td>
          <td><?= $dat['Material']['name']; ?></td>
          <td><?= $dat['Material']['short']; ?></td>
          <td><?php 
		  
			$body = strip_tags($dat['Material']['description']); 
			
			if(strlen($body) > $limit) {
				$body = substr($body, 0, strrpos(substr($body, 0, $limit), ' ')) . '...';
			}
			echo $body; 
		  
		  ?></td>
          <td><?php 
		  if($dat['Material']['infra_link'] != "") {
		  echo $this->Html->link(
		  $this->Html->image('icons/attach.png', array('class' => 'icons')), 
		  $dat['Material']['infra_link'], array('escape' => false, 'target' => '_blank'), null);
		  } else {
			  echo "-";
		  }
		  ?>
          </td>
          
          <td class="mig"><?php 
		  if($dat['Material']['pmig'] != 0) {
		  echo $this->Html->image('icons/tick.png', array('class' => 'icons', 'title' => 'Proceso MIG'));
		  } else { echo "-"; }
		  ?>
          </td>
          <td class="tig"><?php 
		  if($dat['Material']['ptig'] != 0) {
		  echo $this->Html->image('icons/tick.png', array('class' => 'icons', 'title' => 'Proceso TIG'));
		  } else { echo "-"; }
		  ?>
          </td>
          <td class="smaw"><?php 
		  if($dat['Material']['psmaw'] != 0) {
		  echo $this->Html->image('icons/tick.png', array('class' => 'icons', 'title' => 'Proceso Electrodo Revestido'));
		  } else { echo "-"; }
		  ?>
          </td>
          <td class="pac"><?php 
		  if($dat['Material']['ppac'] != 0) {
		  echo $this->Html->image('icons/tick.png', array('class' => 'icons', 'title' => 'Proceso Corte a Plasma'));
		  } else { echo "-"; }
		  ?>
          </td>
          
          <td><?= date("F j, Y", strtotime($dat['Material']['created'])); ?></td>
          
          <td><?php 
		  echo $this->Html->link('Ver', array('controller' => '', 'action' => 'materialesasoldar', $dat['Material']['id']))."<br />"; 
		  echo $this->Html->link('Editar', array('controller' => 'materials', 'action' => 'edit', $dat['Material']['id']))."<br />"; 
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
'format' => __('Página %page% de %pages%, mostrando %current% materiales a soldar de %count% en total, empezando del material a soldar %start%, al %end%')
));
?>	</p>
	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('Anterior'), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('Siguiente') . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>

</div>

</div>