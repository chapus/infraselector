<?php
$this->viewVars['title_for_layout']="Infra - Solicitud Enviada";
?>
<style type="text/css">
div.info {
	margin:auto;
	width:920px;
}

div.links {
	float:left;
	width:620px;
	margin-left:170px;
}

div.links a {
	margin:5px;
	padding:5px;
}
</style>
<div class="info">
	<br />
	<p style="font-size:16px;"><b>Su solicitud ha sido enviada a uno de nuestros asesores que en breve se pondrá en contacto con usted.</b><p>
    <br />
    <p style="font-size:16px;"><b>Gracias por su preferencia.</b><p>
    <br /><br />
    <div class="links">
	<?php 
	
		echo $this->Html->link($this->Html->image('fotos/smig.png'), '/proceso-mig', array('escape' => false), null ); 
		
		echo $this->Html->link($this->Html->image('fotos/stig.png'), '/proceso-tig', array('escape' => false), null ); 
		
		//echo $this->Html->image('fotos/sblank.png');
		echo "<br /><br />";
		
		echo $this->Html->link($this->Html->image('fotos/ssmaw.png'), '/proceso-smaw', array('escape' => false), null ); 
		
		echo $this->Html->link($this->Html->image('fotos/spac.png'), '/proceso-pac', array('escape' => false), null );
		
		//echo $this->Html->image('fotos/sblank.png');
	
	?>
	</div>
</div>
<div class="clear"></div>
<br /><br />