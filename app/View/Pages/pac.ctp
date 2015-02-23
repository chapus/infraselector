<?php
	$this->viewVars['title_for_layout']="Infra - Proceso PAC";
	
	echo $this->Html->script(array('jplugins/selectboxes/jquery.selectboxes', 'jplugins/nivoslider/jquery.nivo.slider'), false);
	
	echo $this->Html->css(array('main/selectors', 'nivo/nivo-slider'));
	
	echo $this->Html->css(array('nivo/themes/default/default',), 'stylesheet', array('type' => 'text/css', 'media' => 'screen') );
?>

<div id="header">
    <?= $this->Html->image('fotos/pac_selector.jpg'); ?>
    <div class="header-desc">
        <h1>Proceso PAC</h1>
        <h4>Selector de Procesos</h4>
        <p>Seleccione el material a cortar y su espesor. Puede que exista más de una posible recomendación para su selección, escoja la que más le convenga.</p>
        <a href="#" id="vpac" class="nmore" style="width:140px !important;">Ver video &rarr;</a>
    </div>
</div><!-- end #header -->
<h2>Proceso PAC</h2>

<div id="content" class="full">
<div id="stp1" class="smallstep">
    <div class="left">
        <div class="paso">Selección</div><div class="number orange"><span class="text">1</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Material a Cortar</div>
    <div class="select"><?= $this->element('steps/pac1-materials'); ?></div>
    <div class="info"><div class="preinfo">Elija el tipo de material base que cortará de acuerdo a las siguientes opciones.</div></div>
</div>

    <div class="right">
    	<div class="title"></div>
        <div class="image"></div>
        <div class="loader" style="display:none;"></div>
    </div>
    <div class="faright">
    	<div class="link"><?= $this->Html->link($this->Html->image('icons/link.png'), '#', array('escape' => false, 'target' => '_blank'), null); ?></div>
        <div class="view"><?= $this->Html->link($this->Html->image('icons/view.png'), '#', array('escape' => false, 'target' => '_blank'), null); ?></div>
    </div>
</div>

<div class="space"></div>



<div id="stp2" class="smallstep">
    <div class="left">
        <div class="paso">Selección</div><div class="number orange"><span class="text">2</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Espesor de Material</div>
    <div class="select"><?= $this->element('steps/pac2-calibres'); ?></div>
    <div class="ovinfo"><div class="info"><div class="preinfo">Elija el espesor aproximado del material base que cortará de acuerdo a las siguientes opciones.</div></div></div>
</div>

    <div class="right">
    	<div class="title"></div>
        <div class="image"></div>
        <div class="loader" style="display:none;"></div>
    </div>
    <div class="faright">
    	<div class="link"><?= $this->Html->link($this->Html->image('icons/link.png'), '#', array('escape' => false, 'target' => '_blank'), null); ?></div>
    </div>
</div>

<div class="space"></div>



<div id="stp3" class="step">
    <div class="left">
        <div class="paso">Selección</div><div class="number orange"><span class="text">3</span></div>
        <div class="loader" style="display:none;"></div>
        <div class="c_holder">
        <div class="cc1">Trabajo Ligero</div>
        <div class="cc2">Trabajo Industrial</div>
        <div class="cc3">Trabajo Pesado</div>
        </div>
    </div>
    
<div class="center">
	<div class="title">Fuente de poder para corte plasma <font style="font-weight:normal; margin-left:20px; font-size:11px;">(Alimentación, Salida nominal, Ciclo de trabajo)</font></div>
    <div class="select"><?= $this->element('steps/pac3-maquinas'); ?></div>
    <div class="info"><div class="preinfo">Elija en las siguientes opciones una máquina para cortar de acuerdo al voltaje de alimentación, especificaciones técnicas y tipo de trabajo que desempeñará. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.</div></div>
</div>

    <div class="right">
    	<div class="title"></div>
        <div class="image"></div>
        <div class="loader" style="display:none;"></div>
    </div>
    <div class="faright">
    	<div class="link"><?= $this->Html->link($this->Html->image('icons/link.png'), '#', array('escape' => false, 'target' => '_blank'), null); ?></div>
        <div class="view"><?= $this->Html->link($this->Html->image('icons/view.png'), '#', array('escape' => false, 'target' => '_blank'), null); ?></div>
    </div>
</div>

<div class="space"></div>



<div id="stp4" class="step">
    <div class="left">
        <div class="paso">Selección</div><div class="number orange"><span class="text">4</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Gas Plasma <font style="font-weight:normal; margin-left:20px; font-size:11px;">(Principales beneficios)</font></div>
    <div class="select"><?= $this->element('steps/pac4-gases'); ?></div>
    <div class="info"><div class="preinfo">Elija el gas plasma ideal para su proceso de corte de acuerdo a las siguientes opciones.</div></div>
</div>

    <div class="right">
    	<div class="title"></div>
        <div class="image"></div>
        <div class="loader" style="display:none;"></div>
    </div>
    <div class="faright">
    	<div class="link"><?= $this->Html->link($this->Html->image('icons/link.png'), '#', array('escape' => false, 'target' => '_blank'), null); ?></div>
        <div class="view"><?= $this->Html->link($this->Html->image('icons/view.png'), '#', array('escape' => false, 'target' => '_blank'), null); ?></div>
    </div>
</div>

<div class="space"></div>




<div id="stp5" class="step">
    <div class="left">
        <div class="paso">Selección</div><div class="number orange"><span class="text">5</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Regulador de Presión</div>
    <div class="select"><?= $this->element('steps/pac5-reguladores'); ?></div>
    <div class="info"><div class="preinfo">Elija el regulador de presión que requiere para el cilindro del gas plasma seleccionado. Es importante considerar el tipo de tuerca que deberá ocupar de acuerdo al tipo de entrada en cada cilindro.</div></div>
</div>

    <div class="right">
    	<div class="title"></div>
        <div class="image"></div>
        <div class="loader" style="display:none;"></div>
    </div>
</div>

<div class="space"></div>


<div class="title"><b>Selección 6</b></div>
<div class="subtitle">Artículos de Protección (opcionales)</div>

<div id="tabs">
	<ul>
	</ul>
    
</div>

<div class="space"></div>

<div id="submit" class="btn ntrdy"></div>

<div class="clear"></div>

<div id="holdalt" style="display:none;"></div>


</div>


<div class="informations" style="display:none;">
    <div id="v_pac"><iframe width="854" height="473" src="http://www.youtube.com/embed/5Fgyw8zzRcw?rel=0" frameborder="0" allowfullscreen></iframe></div>
</div>
<script type="text/javascript">
<!--
$(document).ready(function(){var path="<?php echo $this->webroot; ?>";$("a#vpac").colorbox({inline:true,href:"#v_pac",maxWidth:"900px",maxHeight:"550px"});$.fn.fClear=function(start,end){for(i=start;i<=end;i++){$("#stp"+i+" .right .title").html("");$("#stp"+i+" .right .image").html("");$("#stp"+i).find(".faright .view a").hide();$("#stp"+i).find(".faright .link a").hide();$("div#submit").removeClass("rdyyellow");$("div#submit").addClass("ntrdy");if(i<=6){j=i;if(j==2){$("#calibres").removeOption(/./);
$("#stp"+i+" .center .info").html("Elija el espesor aproximado del material base que cortar\u00e1 de acuerdo a las siguientes opciones.")}if(j==3){$("#maquinas").removeOption(/./);$("#stp"+i+" .center .info").html("Elija en las siguientes opciones una m\u00e1quina para cortar de acuerdo al voltaje de alimentaci\u00f3n, especificaciones t\u00e9cnicas y tipo de trabajo que desempe\u00f1ar\u00e1. El sistema puede darle una sola opci\u00f3n por default de acuerdo a sus necesidades.")}if(j==4){$("#gases").removeOption(/./);
$("#stp"+i+" .center .info").html("Elija el gas plasma ideal para su proceso de corte de acuerdo a las siguientes opciones.")}if(j==5){$("#reguladores").removeOption(/./);$("#stp"+i+" .center .info").html("Elija el regulador de presi\u00f3n que requiere para el cilindro del gas plasma seleccionado. Es importante considerar el tipo de tuerca que deber\u00e1 ocupar de acuerdo al tipo de entrada en cada cilindro.")}if(j==6)$("#slider").hide()}}};$.fn.fNext=function(){if($("#materials option:selected").val()==
""){$("#materials").focus();return false}if($("#calibres option:selected").val()==""){$("#calibres").focus();return false}if($("#maquinas option:selected").val()==""){$("#maquinas").focus();return false}if($("#gases option:selected").val()==""){$("#gases").focus();return false}if($("#reguladores option:selected").val()==""){$("#reguladores").focus();return false}return true};$.fn.fClearInner=function(obj){$(obj).find(".right .title").html("");$(obj).find(".faright .view a").hide();$(obj).find(".faright .link a").hide();
$(obj).find(".right .image").html('<img src="'+path+"blank.jpg"+'" />')};$("#materials").change(function(){if($("#materials option:selected").val()!=""){$("#stp1 .left .loader").show();$.ajax({url:path+"pacs/selectorStep2",data:{"id":$("#materials option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp1 .left .loader").fadeOut(200,function(){$("#stp1 .right .title").html($("#materials option:selected").text());$("#calibres").removeOption(/./);$.fn.fClear(2,6);for(i=0;i<
data.length;i++){$.each(data[i],function(){calibre=this.name.split("-");if(data.length!=1)$("#calibres").addOption(this.id,calibre[0],false);else{$("#calibres").addOption(this.id,calibre[0]);$("#calibres").fCalibres()}});$("#calibres").focus()}})}});$("#stp1 .right .image").html("");$("#stp1 .right .loader").show();$.ajax({url:path+"pacs/interStep2",data:{"id":$("#materials option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp1 .right .loader").fadeOut(200,function(){$.each(data,
function(){$("#stp1 .center .info").html(this.description);if(this.smallimage!=null)$("#stp1 .right .image").html('<img src="'+this.smallimage+'" />');else $("#stp1 .right .image").html('<img src="'+path+'img/materials/default.png" />');if(this.infra_link!=""){$("#stp1 .faright .link a").attr("href",this.infra_link);$("#stp1 .faright .link a").fadeIn()}else $("#stp1 .faright .link a").hide();$("#stp1 .faright .view a").attr("href",path+"materials/view/"+this.id);$("#stp1 .faright .view a").show()})})}})}else{$.fn.fClearInner($("#stp1"));
$.fn.fClear(2,9);$("#stp1 .center .info").html("Elija el tipo de material base que cortar\u00e1 de acuerdo a las siguientes opciones.")}});$("#calibres").change(function(){$("#calibres").fCalibres()});$.fn.fCalibres=function(){if($("#calibres option:selected").val()!=""){$("#stp2 .left .loader").show();$.ajax({url:path+"pacs/selectorStep3",data:{"id":$("#calibres option:selected").val(),"matid":$("#materials option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp2 .left .loader").fadeOut(200,
function(){$("#stp2 .right .title").html($("#calibres option:selected").text());$("#maquinas").removeOption(/./);$.fn.fClear(3,6);console.log("DATA LENGTH: "+data.length);for(i=0;i<data.length;i++){$.each(data[i],function(){if(data.length!=1)$("#maquinas").addOption(this.id,this.name+' '+this.short,false);else{$("#maquinas").addOption(this.id,this.name+' '+this.short);$("#maquinas").fMaquinas()}});$("#maquinas").focus()}})}});$("#stp2 .right .image").html("");$("#stp2 .right .loader").show();$.ajax({url:path+"pacs/interStep3",
data:{"id":$("#calibres option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp2 .right .loader").fadeOut(200,function(){$.each(data,function(){$("#stp2 .center .info").html(this.description);if(this.smallimage!=null)$("#stp2 .right .image").html('<img src="'+this.smallimage+'" />');else $("#stp2 .right .image").html('<img src="'+path+'img/calibres/default.png" />');if(this.infra_link!=""){$("#stp2 .faright .link a").attr("href",this.infra_link);$("#stp2 .faright .link a").fadeIn()}else $("#stp2 .faright .link a").hide()})})}})}else{$.fn.fClearInner($("#stp2"));
$.fn.fClear(3,6);$("#stp2 .center .info").html("Elija el espesor aproximado del material base que cortar\u00e1 de acuerdo a las siguientes opciones.")}};$("#maquinas").change(function(){$("#maquinas").fMaquinas()});$.fn.fMaquinas=function(){if($("#maquinas option:selected").val()!=""){$("#stp3 .left .loader").show();$.ajax({url:path+"pacs/selectorStep4",data:{"id":$("#maquinas option:selected").val(),"calibreid":$("#calibres option:selected").val(),"matid":$("#materials option:selected").val()},type:"POST",
dataType:"json",success:function(data){$("#stp3 .left .loader").fadeOut(200,function(){$("#gases").removeOption(/./);$.fn.fClear(4,6);for(i=0;i<data.length;i++){$.each(data[i],function(){if(data.length!=1)$("#gases").addOption(this.id,this.name+' '+this.short,false);else{$("#gases").addOption(this.id,this.name+' '+this.short);$("#gases").fGases()}});$("#gases").focus()}})}});$("#stp3 .right .image").html("");$("#stp3 .right .loader").show();$.ajax({url:path+"pacs/interStep4",data:{"id":$("#maquinas option:selected").val()},type:"POST",
dataType:"json",success:function(data){$("#stp3 .right .loader").fadeOut(200,function(){$.each(data,function(){$("#stp3 .right .title").html(this.name);$("#stp3 .center .info").html(this.description);if(this.smallimage!=null)$("#stp3 .right .image").html('<img src="'+this.smallimage+'" />');else $("#stp3 .right .image").html('<img src="'+path+'img/maquinas/default.png" />');if(this.infra_link!=""){$("#stp3 .faright .link a").attr("href",this.infra_link);$("#stp3 .faright .link a").fadeIn()}else $("#stp3 .faright .link a").hide();
$("#stp3 .faright .view a").attr("href",path+"maquinas/view/"+this.id);$("#stp3 .faright .view a").show()})})}})}else{$.fn.fClearInner($("#stp3"));$.fn.fClear(4,6);$("#stp3 .center .info").html("Elija en las siguientes opciones una m\u00e1quina para cortar de acuerdo al voltaje de alimentaci\u00f3n, especificaciones t\u00e9cnicas y tipo de trabajo que desempe\u00f1ar\u00e1. El sistema puede darle una sola opci\u00f3n por default de acuerdo a sus necesidades.")}};$("#gases").change(function(){$("#gases").fGases()});
$.fn.fGases=function(){if($("#gases option:selected").val()!=""){$("#stp4 .left .loader").show();$.ajax({url:path+"pacs/selectorStep5",data:{"id":$("#gases option:selected").val(),"maqid":$("#maquinas option:selected").val(),"calibreid":$("#calibres option:selected").val(),"matid":$("#materials option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp4 .left .loader").fadeOut(200,function(){$("#reguladores").removeOption(/./);$.fn.fClear(5,6);for(i=0;i<data.length;i++){$.each(data[i],
function(){if(data.length!=1)$("#reguladores").addOption(this.id,this.name,false);else{$("#reguladores").addOption(this.id,this.name);$("#reguladores").fReguladores()}});$("#maquinas").focus()}})}});$("#stp4 .right .image").html("");$("#stp4 .right .loader").show();$.ajax({url:path+"pacs/interStep5",data:{"id":$("#gases option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp4 .right .loader").fadeOut(200,function(){$.each(data,function(){$("#stp4 .right .title").html(this.name);
$("#stp4 .center .info").html(this.description);if(this.smallimage!=null)$("#stp4 .right .image").html('<img src="'+this.smallimage+'" />');else $("#stp4 .right .image").html('<img src="'+path+'img/gases/default.png" />');if(this.infra_link!=""){$("#stp4 .faright .link a").attr("href",this.infra_link);$("#stp4 .faright .link a").fadeIn()}else $("#stp4 .faright .link a").hide();$("#stp4 .faright .view a").attr("href",path+"gases/view/"+this.id);$("#stp4 .faright .view a").show()})})}})}else{$.fn.fClearInner($("#stp4"));
$.fn.fClear(5,6);$("#stp4 .center .info").html("Elija el gas plasma ideal para su proceso de corte de acuerdo a las siguientes opciones.")}};$("#reguladores").change(function(){$("#reguladores").fReguladores()});$.fn.fReguladores=function(){if($("#reguladores option:selected").val()!=""){$("#stp5 .left .loader").show();$.ajax({url:path+"pacs/seccions",data:{"id":$("#reguladores option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#tabs ul").empty();$("#tabs div").remove();
$("#stp5 .left .loader").fadeOut(200,function(){$("#stp5 .right .title").html($("#reguladores option:selected").text());for(i=0;i<data.length;i++)$.each(data[i],function(){j=i+1;$("#tabs").find("ul").append('<li><a href="'+path+"seccions/getPac/"+this.id+'">'+this.name+"</a></li>")});$("#tabs").tabs({ajaxOptions:{success:function(){},error:function(xhr,status,index,anchor){$(anchor.hash).html("No se pudo cargar esta pesta\u00f1a. Estamos mejorando para Usted.")},type:"POST"},cache:true})})}});$("#stp5 .right .image").html("");
$("#stp5 .right .loader").show();$.ajax({url:path+"pacs/interStep6",data:{"id":$("#reguladores option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp5 .right .loader").fadeOut(200,function(){$.each(data,function(){$("#stp5 .center .info").html(this.description);$("#stp5 .right .image").html('<img src="'+this.smallimage+'" />')})})}});$("div#submit").removeClass("ntrdy");$("div#submit").addClass("rdyyellow")}else{$.fn.fClearInner($("#stp5"));$("#stp5 .center .info").html("Elija el regulador de presi\u00f3n que requiere para el cilindro del gas plasma seleccionado. Es importante considerar el tipo de tuerca que deber\u00e1 ocupar de acuerdo al tipo de entrada en cada cilindro.")}};
$("div#submit").click(function(){valid=$.fn.fNext();if(valid==true){var protect="";$("input[type=checkbox][class=pro]").each(function(){if($(this).attr("checked")=="checked"){if(protect=="")protect="/prot/";protect=protect+$(this).attr("id")+"-"}});var cadena="/mat/"+$("#materials option:selected").val()+"/cal/"+$("#calibres option:selected").val()+"/maq/"+$("#maquinas option:selected").val()+"/gas/"+$("#gases option:selected").val()+"/reg/"+$("#reguladores option:selected").val()+protect;document.location.href=
path+"pac/step2"+cadena}else $.growlUI("Aviso",'<?= "<div class=\"flash_success\">Escoja las opciones faltantes para poder continuar.</div>"; ?>',3E3,"",1)});$(".cc1").mouseover(function(e){e.preventDefault();$(".cc1_info").remove();$(this).append('<div class="cc1_info">Estos productos son adecuados para el uso en talleres de herrer\u00eda, hojalater\u00eda, para el hogar, trabajos de hobby y para usuarios ocasionales. Est\u00e1n dise\u00f1ados para ser f\u00e1ciles de operar y t\u00edpicamente tienen un ciclo de trabajo hasta del 40% con una salida de corriente de 250 Amperes o menos.</div>');
$("div.cc1_info").animate({width:"474",height:"80",top:"0"},200)}).mouseout(function(){$(".cc1_info").remove()});$(".cc2").mouseover(function(e){e.preventDefault();$(".cc2_info").remove();$(this).append('<div class="cc2_info">Estos productos son adecuados para aplicaciones industriales pero que no requieren altos vol\u00famenes de producci\u00f3n y t\u00edpicamente tienen un ciclo de trabajo del 30% al 60% con una salida de corriente de 300 Amperes o menos.</div>');$("div.cc2_info").animate({width:"474",
height:"60",top:"0"},200)}).mouseout(function(){$(".cc2_info").remove()});$(".cc3").mouseover(function(e){e.preventDefault();$(".cc3_info").remove();$(this).append('<div class="cc3_info">Estos productos son adecuados para aplicaciones industriales de altos vol\u00famenes de producci\u00f3n y/o trabajos en materiales de grandes espesores. T\u00edpicamente tienen un ciclo de trabajo del 60% al 100% con una corriente de salida de por lo menos 300 Amperes, y est\u00e1n dise\u00f1ados con las caracter\u00edsticas de arco y construcci\u00f3n que demandan los soldadores profesionales.</div>');
$("div.cc3_info").animate({width:"474",height:"100",top:"0"},200)}).mouseout(function(){$(".cc3_info").remove()})});

-->
</script>   