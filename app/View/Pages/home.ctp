<?php
	$this->viewVars['title_for_layout']="Infra Selector - Procesos de Soldadura";
	
	echo $this->Html->css(array('tooltip/home') );
?>
    <div class="clear"></div>
    <div class="box-gray"><p>Con solo tres pasos, usted sabrá que equipos y consumibles son los más adecuados para su proceso de corte o soldadura antes de ser adquiridos. </p><p>Solo seleccione: (1) El tipo de proceso de corte o soldadura que utilizará, (2) El tipo de material base y (3) El espesor del mismo.</p></div>
    <br />
    <div class="clear"></div>
                
<div class="one_third" id="step1">
    <span class="circle">1</span><h3>Tipo de Proceso</h3>
    <p>El sistema cuenta con cuatro procesos para soldadura y corte de metales, elija el de su preferencia. (Proceso MIG, TIG, SMAW y PAC).</p>
</div>
<div class="tooltip1">
<div class="box"><?= $this->Html->image('fotos/mig.png', array('width' => '70', 'height' => '70') ); ?></div>
<div class="box"><?= $this->Html->image('fotos/tig.png', array('width' => '70', 'height' => '70') ); ?></div>
<div class="box"><?= $this->Html->image('fotos/revestido.png', array('width' => '70', 'height' => '70') ); ?></div>
<div class="box"><?= $this->Html->image('fotos/pac2.jpg', array('width' => '70', 'height' => '70') ); ?></div>
</div>

<div class="one_third" id="step2">
    <span class="circle">2</span><h3>Material base</h3>
    <p>El sistema cuenta con varios tipos de materiales base, elija el de su conveniencia de acuerdo al trabajo que desempeñará.</p>
</div>
<div class="tooltip2">
<div><?= $this->Html->image('fotos/step22-3.jpg'); ?></div>
</div>

<div class="one_third last" id="step3">
    <span class="circle">3</span><h3>Espesor de Material</h3>
    <p>De acuerdo al espesor seleccionado el sistema le brindará la recomendación de los productos ideales para su proceso.</p>
</div>
<div class="tooltip3">
<div><?= $this->Html->image('fotos/step33.jpg'); ?></div>
</div>

<div class="clear"></div>
<br /> 
<div id="header">
<div id="slideshow">
        <div id="slider" class="nivoSlider">
            <?= $this->Html->image('fotos/migv2.jpg', array('title' => '#htmlcaption1') ); ?>
            <?= $this->Html->image('fotos/tigv2.jpg', array('title' => '#htmlcaption2') ); ?>
            <?= $this->Html->image('fotos/smawv2.jpg', array('title' => '#htmlcaption3') ); ?>   
            <?php echo $this->Html->image('fotos/pacv1.jpg', array('title' => '#htmlcaption4') ); ?>               
        </div><!-- end #slide -->
        <div class="desc-slide">
        
            <div id="htmlcaption4" class="nivo-html-caption">
                <h1>Proceso PAC </h1>
                <span class="slider-desc">Corte por Arco de Plasma</span>
                <p>El proceso de corte plasma PAC (Plasma Arc Cutting por sus siglas en inglés) usa un arco abierto que se concentra y se hace pasar a través de un pequeño orificio (hecho en una tobera) desde el electrodo hasta la pieza a cortar. 
Es un proceso que se ocupa donde se requieren cortes limpios y rápidos en metales como el Acero al Carbono, Acero Inoxidable y Aluminio principalmente.</p> 
                <?php echo $this->Html->link('entrar →', '/proceso-pac'); ?> 
            </div>
        
            <div id="htmlcaption3" class="nivo-html-caption">
                <h1>Proceso SMAW </h1>
                <span class="slider-desc">Soldadura de Arco Manual</span>
                <p>El proceso de soldadura eléctrica con electrodo revestido SMAW (Shielded Metal Arc Welding por sus siglas en inglés), se caracteriza por la creación y mantenimiento de un arco eléctrico entre una varilla metálica llamada electrodo y el material base a soldar.</p> 
                <?= $this->Html->link('entrar →', '/proceso-smaw'); ?> 
            </div>
            
            <div id="htmlcaption2" class="nivo-html-caption">
                <h1>Proceso TIG </h1>
                <span class="slider-desc">Soldadura en una atmósfera con gas <br />inerte y electrodo de tungsteno</span>
                <p>El proceso GTAW (Gas Tungsten Arc Welding por sus siglas en inglés) establece el arco eléctrico entre un electrodo de tungsteno y la pieza de trabajo a unir, se requiere la protección de un gas o mezcla de gases, normalmente las fuentes de poder incluyen una unidad de Alta Frecuencia que ayuda a iniciar el arco sin tocar la pieza base y estabilizarlo.</p> 
                <?= $this->Html->link('entrar →', '/proceso-tig'); ?> 
            </div>
            
            <div id="htmlcaption1" class="nivo-html-caption">
                <h1>Proceso MIG </h1>
                <span class="slider-desc">Soldadura Gas, Arco y metal</span>
                <p>El proceso semiautomático GMAW (Gas Metal Arc Welding por sus siglas en inglés) establece un arco eléctrico entre la pieza de trabajo y el alambre electrodo que se alimenta continuamente. Utiliza una máquina de voltaje constante, antorcha y un mecanismo que alimenta el alambre hacia la unión de los metales, es requerida la protección de un gas o mezcla de gases. </p> 
                <?= $this->Html->link('entrar →', '/proceso-mig'); ?>                      
            </div>
        </div><!-- end .desc-slide -->
</div><!-- end slideshow -->
</div>   <!-- end header -->         

<div id="content" class="full">        
     
    <div class="clear"></div>
    <h1 style="display:none;">Selector de Procesos INFRA</h1>
<div class="clear"></div>

<div class="one_fifth">
<a href="proceso-mig"><?= $this->Html->image('fotos/mig2.jpg', array('class' => 'aligncenter') ); ?><h2>Proceso MIG</h2></a>
<a href="proceso-mig" class="more" style="width:100px !important;">Ir Ahora &rarr;</a>
<a href="#" id="vmig" class="more" style="width:100px !important;">Ver video &rarr;</a>
</div>
<div class="one_fifth">
<a href="proceso-tig"><?= $this->Html->image('fotos/tig2.jpg', array('class' => 'aligncenter') ); ?><h2>Proceso TIG</h2></a>
<a href="proceso-tig" class="more" style="width:100px !important;">Ir Ahora &rarr;</a>
<a href="#" id="vtig" class="more" style="width:100px !important;">Ver video &rarr;</a>
</div>
<div class="one_fifth">
<a href="proceso-smaw"><?= $this->Html->image('fotos/smaw2.jpg', array('class' => 'aligncenter') ); ?><h2>Proceso SMAW</h2></a>
<a href="proceso-smaw" class="more" style="width:100px !important;">Ir Ahora &rarr;</a>
<a href="#" id="vsmaw" class="more" style="width:100px !important;">Ver video &rarr;</a>
</div>

<div class="one_fifth">
<a href="proceso-pac"><?= $this->Html->image('fotos/pac2.jpg', array('class' => 'aligncenter') ); ?><h2>Proceso PAC</h2></a>
<a href="proceso-pac" class="more" style="width:100px !important;">Ir Ahora &rarr;</a>
<a href="#" id="vpac" class="more" style="width:100px !important;">Ver video &rarr;</a>
</div>

<div class="one_fifth" style="width:20% !important;">
<a href="catalogo"><?= $this->Html->image('fotos/catalogosmall.jpg', array('class' => 'aligncenter') ); ?><h2>Catálogo de Productos</h2></a>
<a href="catalogo" class="more">Ir Ahora &rarr;</a>
</div>
<div class="clear"></div>
<p>&nbsp;</p>

<p>Como usted, en INFRA estamos conscientes que en el sector de la soldadura existen un sinfín de posibilidades, diferentes procesos, tipos de materiales y de espesores; es por ello que para atender mejor sus necesidades y expectativas lo invitamos a consultar a un asesor INFRA quien le ayudará a descubrir y aprovechar al máximo nuestra amplia gama de productos y soluciones.</p>
    <br />
    
    <p><b>IMPORTANTE: </b>La información ofrecida en esta herramienta ha sido obtenida por medio de nuestro equipo de asesores técnicos especializados y de diversas fuentes de información empleadas para brindarle una recomendación óptima y personalizada al trabajo que usted desempeña. No asumimos responsabilidad alguna por la funcionalidad de algún equipo o producto que haya sido adquirido o utilizado en condiciones inadecuadas. Para asegurar su entera satisfacción, ponemos a su disposición a nuestro equipo de especialistas quienes con gusto lo atenderán para ayudarle a elegir el equipo que mejor se adapte a sus necesidades.</p>

<div class="hidder">
    <div class="attention" style="overflow:hidden; ">
        <?= $this->Html->image('fotos/popupprincipal.jpg'); ?>
    </div>
    
    <div class="xattentionx">
        <p><b>ATENCIÓN: </b>La información sugerida en esta aplicación es exclusivamente de carácter informativo y para brindarle una recomendación personalizada al trabajo que usted desempeña. Para asegurar su entera satisfacción, ponemos a su disposición a nuestro gran equipo de especialistas quienes con gusto lo atenderán para ayudarle a elegir el equipo que mejor se adapte a sus necesidades.</p>
    </div>
</div>
                                    
</div>   <!-- end content -->     
                          

<div class="informations" style="display:none;">
	<div id="v_mig"><iframe width="854" height="473" src="http://www.youtube.com/embed/W24TueD4dHo?rel=0" frameborder="0" allowfullscreen></iframe></div>
    <div id="v_tig"><iframe width="854" height="473" src="http://www.youtube.com/embed/EZnQmRApxRU?rel=0" frameborder="0" allowfullscreen></iframe></div>
    <div id="v_smaw"><iframe width="854" height="473" src="http://www.youtube.com/embed/ZUisBwbffA4?rel=0" frameborder="0" allowfullscreen></iframe></div>
    <div id="v_pac"><iframe width="854" height="473" src="http://www.youtube.com/embed/5Fgyw8zzRcw?rel=0" frameborder="0" allowfullscreen></iframe></div>
</div>

<script src="http://cdn.jquerytools.org/1.2.6/tiny/jquery.tools.min.js"></script>
<script type="text/javascript">

jQuery(window).load(function() {
	jQuery('#slider').nivoSlider({
		effect:'sliceDownLeft', //Specify sets like: 'sliceDownRight,sliceDownLeft,fold,fade'
		slices:20,
		animSpeed:600, //Slide transition speed
		pauseTime:9000,
		directionNav:true, //Next &amp; Prev
		startSlide:0, //Set starting Slide (0 index)
		customChange: function(){
		Cufon.replace('#slideshow h1, #slideshow .slider-desc', {fontFamily: 'Yanone Kaffeesatz Regular'});
		}
	});
	 Cufon.refresh();
	 
	 jQuery("#step1").mouseover(function() {
		 jQuery(this).addClass('shover');
	 }).mouseout(function() {
		 jQuery(this).removeClass('shover');
	 }).tooltip({ position : 'bottom center' });
	 
	 jQuery("#step2").mouseover(function() {
		 jQuery(this).addClass('shover');
	 }).mouseout(function() {
		 jQuery(this).removeClass('shover');
	 }).tooltip({ position : 'bottom center' });
	 
	 jQuery("#step3").mouseover(function() {
		 jQuery(this).addClass('shover');
	 }).mouseout(function() {
		 jQuery(this).removeClass('shover');
	 }).tooltip({ position : 'bottom center' });
	 
	 $('div.attention').colorbox({inline: true, href:"div.attention", open: true});
	 
	 $('a#vmig').colorbox({inline: true, href:"#v_mig", maxWidth: "900px", maxHeight: "550px"});
	 $('a#vtig').colorbox({inline: true, href:"#v_tig", maxWidth: "900px", maxHeight: "550px"});
	 $('a#vsmaw').colorbox({inline: true, href:"#v_smaw", maxWidth: "900px", maxHeight: "550px"});
	 $('a#vpac').colorbox({inline: true, href:"#v_pac", maxWidth: "900px", maxHeight: "550px"});
	 
});

Cufon.replace ('h1, h2, h3, h4, h5, .title, .box-gray, h6:not(.clean)', {fontFamily: 'Yanone Kaffeesatz Regular'});
Cufon.replace('#logo h1, h6:not(.clean)', {fontFamily: 'Brush Script Std'});
</script>
