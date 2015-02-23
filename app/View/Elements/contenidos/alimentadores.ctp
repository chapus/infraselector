<?php 
$data = $this->requestAction('/microalambres/getlist');
//debug($data);
?>	
<div class="right_box">
<h3>Alimentadores de Micro Alambre</h3>
<ul class="list">
<?php foreach($data as $dat) { ?>
<?php if($dat['Microalambre']['name'] != "N/A") { ?>
<li><?= $this->Html->link($dat['Microalambre']['name'], '/alimentadores/'.$dat['Microalambre']['id']); ?></li>
<?php } } ?>
</ul>
<div class="footer_all"><?= $this->Html->link('Ver todo el Catálogo', '/catalogo/alimentadores'); ?></div>
</div>