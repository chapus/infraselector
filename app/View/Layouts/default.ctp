<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Script-Type" content="text/javascript" /> 
<meta name="robots" content="index, follow" />
<meta name="title" content="Selector Infra" />
<meta name="description" content="Selector INFRA, estamos conscientes que en el sector de la soldadura existen un sinfín de posibilidades, diferentes procesos, tipos de materiales y de espesores; es por ello que para atender mejor sus necesidades y expectativas lo invitamos a consultar a un asesor INFRA quien le ayudará a descubrir y aprovechar al máximo nuestra amplia gama de productos y soluciones" />
<meta name="keywords" content="INFRA,selector,maquinas,gases,material de aporte,antorchas,equipos alternativos,proceso mig, proceso tig, proceso smaw,mig,tig,smaw,articulos de proteccion,protecciones,soldar,soldadura,gases industriales,selector de procesos,infra mexico" />
<meta name="author" content="Spider Technologies Corporation" />
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon', $this->Html->url('/favicon.ico'));
		
		echo $this->Html->css(array('jquery-ui-1.8.6.custom', 'blockui/blockui', 'extruder/mbExtruder', 'main/popupcoda',
									'extruder/mbExtruder', 'colorbox/colorbox', 'clean/style', 'clean/inner', 'clean/nivo-slider', 'clean/prettyPhoto',
									'clean/color', 'clean/skins/light'
									));
		
		echo $this->Html->script(array('jquery/jquery-1.7.1.min', 'jquery/jquery-ui-1.8.9.custom.min', 
									'jplugins/colorbox/jquery.colorbox-min',
									'jplugins/blockui/jquery.blockUI', 'jplugins/simplemodal/jquery.simplemodal.1.4.1.min',
									'jplugins/flip/jquery.flip', 'jplugins/popupcoda/bubble', 'extruder/jquery.hoverIntent.min',
									'jplugins/cluetip/jquery.cluetip', 'extruder/jquery.metadata',
									'extruder/jquery.mb.flipText', 'extruder/mbExtruder', 'swfobject'
									));
									
		echo $this->Html->script(array(
			'clean/cufon-yui', 'clean/Yanone_Kaffeesatz_Regular_400-Yanone_Kaffeesatz_Bold_700.font', 'clean/Brush_Script_Std_italic_500.font',
			'clean/jqueryslidemenu', 'clean/jquery.easing.1.3', 'clean/jquery.nivo.slider_2.3'
		));

		
		echo $scripts_for_layout;
	?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-23066448-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();


jQuery(document).ready(function(){
	
	$('a.tooltip').cluetip({
	  cluetipClass: 'jtip',
	  arrows: true,
	  dropShadow: true,
	  hoverIntent: true,
	  sticky: true,
	  mouseOutClose: false,
	  activation: 'click',
	  width: 765,
	  closePosition: 'title'
	});
	
});

	 Cufon.replace ('h1, h2, h3, h4, h5, #slideshow h1, #slideshow .slider-desc, span.title', {fontFamily: 'Yanone Kaffeesatz Regular'});
	 Cufon.replace('#logo h1', {fontFamily: 'Brush Script Std'});

</script>
</head>
<body class="nojs">
<div id="wrapper">
	<div id="container">
    
			<?php echo $this->element('header'); ?>
    
    <div id="main-content">        
			<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>
    </div>
        
        
		<div id="footer" style="position:static;">
        	<?php echo $this->element('footer'); ?>
            <?php //echo $this->element('sql_dump'); ?>
		</div>
        <div class="clear"></div><!-- end clear float -->
	</div> <!-- container -->
</div> <!-- wrapper -->
<script type="text/javascript"> Cufon.now(); </script>	
</body>
</html>