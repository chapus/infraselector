<?php
	$this->viewVars['title_for_layout']="Infra - Proceso de Electrodo Revestido (SMAW)";
	
	echo $this->Html->script(array('jplugins/selectboxes/jquery.selectboxes', 'jplugins/nivoslider/jquery.nivo.slider'), false);
	
	echo $this->Html->css(array('main/selectors', 'nivo/nivo-slider'));
	
	echo $this->Html->css(array('nivo/themes/default/default',), 'stylesheet', array('type' => 'text/css', 'media' => 'screen') );
?>
<style type="text/css">

#slider .nivo-controlNav {
	bottom:0 !important;
	width:1680px !important;
	top: 200px !important;
}

</style>


<div id="header">
    <?= $this->Html->image('fotos/smaw3v2.jpg'); ?>
    <div class="header-desc">
        <h1>Proceso SMAW</h1>
        <h4>Selector de Procesos</h4>
        <p>Seleccione el material a soldar y su espesor. Puede que exista más de una posible recomendación para su selección, escoja la que más le convenga.</p>
        <a href="#" id="vsmaw" class="nmore" style="width:140px !important;">Ver video &rarr;</a>
    </div>
</div><!-- end #header -->
<h2>Proceso SMAW</h2>
<div id="content" class="full">

<div id="stp1" class="smallstep">
    <div class="left">
        <div class="paso">Selección</div><div class="number blue"><span class="text">1</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Material a Soldar</div>
    <div class="select"><?= $this->element('steps/smaw1-materials'); ?></div>
    <div class="info"><div class="preinfo">Elija el tipo de material base que soldará de acuerdo a las siguientes opciones.</div></div>
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
        <div class="paso">Selección</div><div class="number blue"><span class="text">2</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Espesor de Material</div>
    <div class="select"><?= $this->element('steps/smaw2-calibres'); ?></div>
    <div class="ovinfo"><div class="info"><div class="preinfo">Elija el calibre o espesor aproximado del material base que soldará de acuerdo a las siguientes opciones.</div></div></div>
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
        <div class="paso">Selección</div><div class="number blue"><span class="text">3</span></div>
        <div class="loader" style="display:none;"></div>
        <div class="c_holder">
        <div class="cc1">Trabajo Ligero</div>
        <div class="cc2">Trabajo Industrial</div>
        <div class="cc3">Trabajo Pesado</div>
        </div>
    </div>
    
<div class="center">
	<div class="title">Máquina de Soldar <font style="font-weight:normal; margin-left:20px; font-size:11px;">(Alimentación, Salida nominal, Ciclo de trabajo)</font></div>
    <div class="select"><?= $this->element('steps/smaw3-maquinas'); ?></div>
    <div class="info"><div class="preinfo">Elija en las siguientes opciones una máquina para soldar de acuerdo al voltaje de alimentación, especificaciones técnicas y tipo de trabajo que desempeñará. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.</div></div>
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
        <div class="paso">Selección</div><div class="number blue"><span class="text">4</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Portaelectrodo</div>
    <div class="select"><?= $this->Form->select('portaelectrodos'); ?></div>
    <div class="info"><div class="preinfo">Elija el portaelectrodo que empleará de acuerdo a la fuente de poder previamente elegida y al tipo de trabajo que desempeñara. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.</div></div>
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


<div id="stp6" class="step">
    <div class="left">
        <div class="paso">Selección</div><div class="number blue"><span class="text">5</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Juego de Cables PAS</div>
    <div class="select"><?= $this->Form->select('juegopas'); ?></div>
    <div class="info"><div class="preinfo">Elija el juego de cables PAS que empleará de acuerdo a la fuente de poder previamente elegida y al tipo de trabajo que desempeñara. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.</div></div>
</div>

    <div class="right">
    	<div class="title"></div>
        <div class="image" style="position:relative;"></div>
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
        <div class="paso">Selección</div><div class="number blue"><span class="text">6</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Material de Aporte</div>
    <div class="select"><?= $this->element('steps/smaw4-aportes'); ?></div>
    <div class="info"><div class="preinfo">Elija el material de aporte que requiere para sus procesos de soldadura de acuerdo a los diámetros recomendados. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.</div></div>
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


<div class="title"><b>Selección 5</b></div>
<div class="subtitle">Artículos de Protección (opcionales)</div>

<div id="tabs">
	<ul>
	</ul>
    
</div>

<div class="space"></div>

<div id="submit" class="btn ntrdy"></div>

<div class="clear"></div>

</div>

<div class="informations" style="display:none;">
    <div id="v_smaw"><iframe width="854" height="473" src="http://www.youtube.com/embed/ZUisBwbffA4?rel=0" frameborder="0" allowfullscreen></iframe></div>
</div>
<script type="text/javascript">
<!--
$(document).ready(function(){var path="<?php echo $this->webroot; ?>";$("a#vsmaw").colorbox({inline:true,href:"#v_smaw",maxWidth:"900px",maxHeight:"550px"});$("#materials").val("");$.fn.fClear=function(start,end){for(i=start;i<=end;i++){$("#stp"+i+" .right .title").html("");$("#stp"+i+" .right .image").html("");$("#stp"+i).find(".faright .view a").hide();$("#stp"+i).find(".faright .link a").hide();$("div#submit").removeClass("rdyblue");$("div#submit").addClass("ntrdy");if(i<=5){j=i;if(j==2){$("#calibres").removeOption(/./);
$("#stp"+i+" .center .info").html("Elija el calibre o espesor aproximado del material base que soldar\u00e1 de acuerdo a las siguientes opciones.")}if(j==3){$("#stp5 .center .info").html("Elija el portaelectrodo que emplear\u00e1 de acuerdo a la fuente de poder previamente elegida y al tipo de trabajo que desempe\u00f1ara. El sistema puede darle una sola opci\u00f3n por default de acuerdo a sus necesidades.");$("#stp6 .center .info").html("Elija el juego de cables PAS que emplear\u00e1 de acuerdo a la fuente de poder previamente elegida y al tipo de trabajo que desempe\u00f1ara. El sistema puede darle una sola opci\u00f3n por default de acuerdo a sus necesidades.");
$("#portaelectrodos").removeOption(/./);$("#juegopas").removeOption(/./);$("#maquinas").find("option").remove().end();$("#maquinas").find("optgroup").remove().end();$("#stp"+i+" .center .info").html("Elija en las siguientes opciones una m\u00e1quina para soldar de acuerdo al voltaje de alimentaci\u00f3n, especificaciones t\u00e9cnicas y tipo de trabajo que desempe\u00f1ar\u00e1. El sistema puede darle una sola opci\u00f3n por default de acuerdo a sus necesidades.")}if(j==4){$("#aportes").removeOption(/./);
$("#stp"+i+" .center .info").html("Elija el material de aporte que requiere para sus procesos de soldadura de acuerdo a los\u00a0di\u00e1metros\u00a0recomendados. El sistema puede darle una sola\u00a0opci\u00f3n\u00a0por default de acuerdo a sus\u00a0necesidades.")}if(j==5)$("#slider").hide()}}};$.fn.fNext=function(){if($("#materials option:selected").val()==""){$("#materials").focus();return false}if($("#calibres option:selected").val()==""){$("#calibres").focus();return false}if($("#maquinas option:selected").val()==
""){$("#maquinas").focus();return false}if($("#portaelectrodos option:selected").val()==""){$("#portaelectrodos").focus();return false}if($("#juegopas option:selected").val()==""){$("#juegopas").focus();return false}if($("#aportes option:selected").val()==""){$("#aportes").focus();return false}return true};$.fn.fClearInner=function(obj){$(obj).find(".right .title").html("");$(obj).find(".faright .view a").hide();$(obj).find(".faright .link a").hide();$(obj).find(".right .image").html('<img src="'+
path+"blank.png"+'" />')};$("#materials").change(function(){if($("#materials option:selected").val()!=""){$("#stp1 .left .loader").show();$.ajax({url:path+"smaws/selectorStep2",data:{"id":$("#materials option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp1 .left .loader").fadeOut(200,function(){$("#stp1 .right .title").html($("#materials option:selected").text());$("#calibres").removeOption(/./);$.fn.fClear(2,6);for(i=0;i<data.length;i++){$.each(data[i],function(){calibre=
this.name.split("-");if(data.length!=1)$("#calibres").addOption(this.id,calibre[0],false);else{$("#calibres").addOption(this.id,calibre[0]);$("#calibres").fCalibres()}});$("#calibres").focus()}})}});$("#stp1 .right .image").html("");$("#stp1 .right .loader").show();$.ajax({url:path+"smaws/interStep2",data:{"id":$("#materials option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp1 .right .loader").fadeOut(200,function(){$.each(data,function(){$("#stp1 .center .info").html(this.description);
if(this.smallimage!=null)$("#stp1 .right .image").html('<img src="'+this.smallimage+'" />');else $("#stp1 .right .image").html('<img src="'+path+'img/materials/default.png" />');if(this.infra_link!=""){$("#stp1 .faright .link a").attr("href",this.infra_link);$("#stp1 .faright .link a").fadeIn()}else $("#stp1 .faright .link a").hide();$("#stp1 .faright .view a").attr("href",path+"materials/view/"+this.id);$("#stp1 .faright .view a").show()})})}})}else{$.fn.fClearInner($("#stp1"));$.fn.fClear(2,6);
$("#stp1 .center .info").html("Elija el tipo de material base que soldar\u00e1 de acuerdo a las siguientes opciones.")}});$("#calibres").change(function(){$("#calibres").fCalibres()});$.fn.fCalibres=function(){if($("#calibres option:selected").val()!=""){$("#stp2 .left .loader").show();$.ajax({url:path+"smaws/selectorStep3",data:{"id":$("#calibres option:selected").val(),"matid":$("#materials option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp2 .left .loader").fadeOut(200,
function(){$("#stp2 .right .title").html($("#calibres option:selected").text());$("#maquinas").find("option").remove().end();$("#maquinas").find("optgroup").remove().end();$.fn.fClear(3,6);$("<option value=''></option>").prependTo($("#maquinas"));var ciclo1=0;var ciclo2=0;var ciclo3=0;for(i=0;i<data.length;i++){$.each(data[i],function(){if(this.ciclomaquina_id==3&&ciclo3==0){$("#maquinas").append('<optgroup label="'+this.Cicloname+'" id="3">');ciclo3=1}if(this.ciclomaquina_id==2&&ciclo2==0){$("#maquinas").append('<optgroup label="'+
this.Cicloname+'" id="2">');ciclo2=1}if(this.ciclomaquina_id==1&&ciclo1==0){$("#maquinas").append('<optgroup label="'+this.Cicloname+'" id="1">');ciclo1=1}if(data.length!=1){$("#maquinas").addOption(this.mid,this.name+' '+this.short,false);$("#maquinas option[value='"+this.mid+"']").appendTo($("#maquinas optgroup[id='"+this.ciclomaquina_id+"']"))}else{$("#maquinas").addOption(this.mid,this.name+' '+this.short);$("#maquinas option[value='"+this.mid+"']").appendTo($("#maquinas optgroup[id='"+this.ciclomaquina_id+"']"));$("#maquinas").fMaquinas()}});
$("#maquinas").focus()}})}});$("#stp2 .right .image").html("");$("#stp2 .right .loader").show();$.ajax({url:path+"smaws/interStep3",data:{"id":$("#calibres option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp2 .right .loader").fadeOut(200,function(){$.each(data,function(){$("#stp2 .center .info").html(this.description);if(this.smallimage!=null)$("#stp2 .right .image").html('<img src="'+this.smallimage+'" />');else $("#stp2 .right .image").html('<img src="'+path+'img/calibres/default.png" />');
if(this.infra_link!=""){$("#stp2 .faright .link a").attr("href",this.infra_link);$("#stp2 .faright .link a").fadeIn()}else $("#stp2 .faright .link a").hide()})})}})}else{$.fn.fClearInner($("#stp2"));$.fn.fClear(3,6);$("#stp2 .center .info").html("Elija el calibre o espesor aproximado del material base que soldar\u00e1 de acuerdo a las siguientes opciones.")}};$("#maquinas").change(function(){$("#maquinas").fMaquinas()});$.fn.fMaquinas=function(){if($("#maquinas option:selected").val()!=""){$("#stp3 .left .loader").show();
$.ajax({url:path+"smaws/selectorStep4",data:{"id":$("#maquinas option:selected").val(),"calibreid":$("#calibres option:selected").val(),"matid":$("#materials option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp3 .left .loader").fadeOut(200,function(){$("#aportes").removeOption(/./);$("#stp5 .center .info").empty();$("#stp6 .center .info").empty();$.fn.fClear(4,6);for(i=0;i<data.length;i++)$.each(data[i],function(){if(data.length!=1)$("#aportes").addOption(this.id,this.name,
false);else{$("#aportes").addOption(this.id,this.name);$("#aportes").fAportes()}})})}});$("#stp3 .right .image").html("");$("#stp3 .right .loader").show();$("#portaelectrodos").removeOption(/./);$("#juegopas").removeOption(/./);$.ajax({url:path+"smaws/interStep4",data:{"id":$("#maquinas option:selected").val(),"calid":$("#calibres option:selected").val(),"matid":$("#materials option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp3 .right .loader").fadeOut(500,function(){var i=
0;$.each(data,function(){if(i==0){$("#stp3 .right .title").html(this.name);$("#stp3 .center .info").html(this.description);if(this.smallimage!=null)$("#stp3 .right .image").html('<img src="'+this.smallimage+'" />');else $("#stp3 .right .image").html('<img src="'+path+'img/maquinas/default.png" />');if(this.infra_link!=""){$("#stp3 .faright .link a").attr("href",this.infra_link);$("#stp3 .faright .link a").fadeIn()}else $("#stp3 .faright .link a").hide();$("#stp3 .faright .view a").attr("href",path+
"maquinas/view/"+this.id);$("#stp3 .faright .view a").show()}i=i+1});if(data.Portaelectrodo.length==data.Juegopa.length)$("#juegopas").bind("change");else $("#juegopas").unbind("change");if(data.Portaelectrodo.length==1)$.each(data.Portaelectrodo,function(){$("#portaelectrodos").addOption(this.id,this.name);$("#stp5 .right .title").html(this.name);$("#stp5 .center .info").html(this.description);$("#stp5 .right .image").html('<img src="'+this.smallimage+'" />');$("div.pz1 div.ptitle").html(this.name);
$("div.pz1 div.pdescription").html(this.description);$("div.pz1 div.pimage").html('<img src="'+this.smallimage+'" />')});else{var i=1;$.each(data.Portaelectrodo,function(){$("#portaelectrodos").addOption(this.id,this.name,false);$("div.pz"+i+" div.ptitle").html(this.name);$("div.pz"+i+" div.pdescription").html(this.description);$("div.pz"+i+" div.pimage").html('<img src="'+this.smallimage+'" />');i=i+1});$("#portaelectrodos").change(function(){$("#stp5 .right .title").empty();$("#stp5 .center .info").empty();
$("#stp5 .right .image").empty();index=$("#portaelectrodos option:selected").index();if(data.Juegopa.length==data.Portaelectrodo.length){$("#stp6 .right .title").empty();$("#stp6 .center .info").empty();$("#stp6 .right .image").empty();$("#juegopas").prop("selectedIndex",index);$("div.jz"+index+" div.ptitle").clone().appendTo("#stp6 .right .title");$("div.jz"+index+" div.pdescription").clone().appendTo("#stp6 .center .info");$("div.jz"+index+" div.pimage").clone().appendTo("#stp6 .right .image")}$("div.pz"+
index+" div.ptitle").clone().appendTo("#stp5 .right .title");$("div.pz"+index+" div.pdescription").clone().appendTo("#stp5 .center .info");$("div.pz"+index+" div.pimage").clone().appendTo("#stp5 .right .image")})}if(data.Juegopa.length==1)$.each(data.Juegopa,function(){$("#juegopas").addOption(this.id,this.name);$("#stp6 .right .title").html(this.name);$("#stp6 .center .info").html(this.description);$("#stp6 .right .image").html('<img src="'+this.smallimage+'" />');$("div.jz1 div.ptitle").html(this.name);
$("div.jz1 div.pdescription").html(this.description);$("div.jz1 div.pimage").html('<img src="'+this.smallimage+'" />')});else{var i=1;$.each(data.Juegopa,function(){$("#juegopas").addOption(this.id,this.name,false);$("div.jz"+i+" div.ptitle").html(this.name);$("div.jz"+i+" div.pdescription").html(this.description);$("div.jz"+i+" div.pimage").html('<img src="'+this.smallimage+'" />');i=i+1});$("#juegopas").change(function(){$("#stp6 .right .title").empty();$("#stp6 .center .info").empty();$("#stp6 .right .image").empty();
index=$("#juegopas option:selected").index();if(data.Juegopa.length==data.Portaelectrodo.length){$("#stp5 .right .title").empty();$("#stp5 .center .info").empty();$("#stp5 .right .image").empty();$("#portaelectrodos").prop("selectedIndex",index);$("div.pz"+index+" div.ptitle").clone().appendTo("#stp5 .right .title");$("div.pz"+index+" div.pdescription").clone().appendTo("#stp5 .center .info");$("div.pz"+index+" div.pimage").clone().appendTo("#stp5 .right .image")}$("div.jz"+index+" div.ptitle").clone().appendTo("#stp6 .right .title");
$("div.jz"+index+" div.pdescription").clone().appendTo("#stp6 .center .info");$("div.jz"+index+" div.pimage").clone().appendTo("#stp6 .right .image")})}})}})}else{$.fn.fClearInner($("#stp3"));$.fn.fClear(4,6);$("#portaelectrodos").removeOption(/./);$("#juegopas").removeOption(/./);$("#stp5 .center .info").html("Elija el portaelectrodo que emplear\u00e1 de acuerdo a la fuente de poder previamente elegida y al tipo de trabajo que desempe\u00f1ara. El sistema puede darle una sola opci\u00f3n por default de acuerdo a sus necesidades.");
$("#stp6 .center .info").html("Elija el juego de cables PAS que emplear\u00e1 de acuerdo a la fuente de poder previamente elegida y al tipo de trabajo que desempe\u00f1ara. El sistema puede darle una sola opci\u00f3n por default de acuerdo a sus necesidades.");$("#stp3 .center .info").html("Elija en las siguientes opciones una m\u00e1quina para soldar de acuerdo al voltaje de alimentaci\u00f3n, especificaciones t\u00e9cnicas y tipo de trabajo que desempe\u00f1ar\u00e1. El sistema puede darle una sola opci\u00f3n por default de acuerdo a sus necesidades.")}};
$("#aportes").change(function(){$("#aportes").fAportes()});$.fn.fAportes=function(){if($("#aportes option:selected").val()!=""){$("#stp4 .left .loader").show();$.ajax({url:path+"smaws/seccions",data:{"id":$("#aportes option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#tabs ul").empty();$("#tabs div").remove();$("#stp4 .left .loader").fadeOut(200,function(){$("#stp4 .right .title").html($("#aportes option:selected").text());for(i=0;i<data.length;i++)$.each(data[i],function(){j=
i+1;$("#tabs").find("ul").append('<li><a href="'+path+"seccions/getSmaw/"+this.id+'">'+this.name+"</a></li>")});$("#tabs").tabs({ajaxOptions:{success:function(){},error:function(xhr,status,index,anchor){$(anchor.hash).html("No se pudo cargar esta pesta\u00f1a. Estamos mejorando para Usted.")},type:"POST"},cache:true})})}});$("#stp4 .right .image").html("");$("#stp4 .right .loader").show();$.ajax({url:path+"smaws/interStep5",data:{"id":$("#aportes option:selected").val()},type:"POST",dataType:"json",
success:function(data){$("#stp4 .right .loader").fadeOut(200,function(){$.each(data,function(){$("#stp4 .center .info").html(this.description);if(this.smallimage!=null)$("#stp4 .right .image").html('<img src="'+this.smallimage+'" />');else $("#stp4 .right .image").html('<img src="'+path+'img/aportes/default.png" />');if(this.infra_link!=""){$("#stp4 .faright .link a").attr("href",this.infra_link);$("#stp4 .faright .link a").fadeIn()}else $("#stp4 .faright .link a").hide();$("#stp4 .faright .view a").attr("href",
path+"aportes/view/"+this.id);$("#stp4 .faright .view a").show()})})}});$("div#submit").removeClass("ntrdy");$("div#submit").addClass("rdyblue")}else{$.fn.fClearInner($("#stp4"));$("#stp4 .center .info").html("Elija el material de aporte que requiere para sus procesos de soldadura de acuerdo a los\u00a0di\u00e1metros\u00a0recomendados. El sistema puede darle una sola\u00a0opci\u00f3n\u00a0por default de acuerdo a sus\u00a0necesidades.")}};$("div#submit").click(function(){valid=$.fn.fNext();if(valid==
true){var protect="";$("input[type=checkbox]").each(function(){if($(this).attr("checked")=="checked"){if(protect=="")protect="/prot/";protect=protect+$(this).attr("id")+"-"}});var cadena="/mat/"+$("#materials option:selected").val()+"/cal/"+$("#calibres option:selected").val()+"/maq/"+$("#maquinas option:selected").val()+"/apo/"+$("#aportes option:selected").val()+"/port/"+$("#portaelectrodos option:selected").val()+"/jue/"+$("#juegopas option:selected").val()+protect;document.location.href=path+
"smaw/step2"+cadena}else $.growlUI("Aviso",'<?= "<div class=\"flash_success\">Escoja las opciones faltantes para poder continuar.</div>"; ?>',3E3,"",1)});$(".cc1").mouseover(function(e){e.preventDefault();$(".cc1_info").remove();$(this).append('<div class="cc1_info">Estos productos son adecuados para el uso en talleres de herrer\u00eda, hojalater\u00eda, para el hogar, trabajos de hobby y para usuarios ocasionales. Est\u00e1n dise\u00f1ados para ser f\u00e1ciles de operar y t\u00edpicamente tienen un ciclo de trabajo hasta del 40% con una salida de corriente de 250 Amperes o menos.</div>');
$("div.cc1_info").animate({width:"474",height:"80",top:"0"},200)}).mouseout(function(){$(".cc1_info").remove()});$(".cc2").mouseover(function(e){e.preventDefault();$(".cc2_info").remove();$(this).append('<div class="cc2_info">Estos productos son adecuados para aplicaciones industriales pero que no requieren altos vol\u00famenes de producci\u00f3n y t\u00edpicamente tienen un ciclo de trabajo del 30% al 60% con una salida de corriente de 300 Amperes o menos.</div>');$("div.cc2_info").animate({width:"474",
height:"60",top:"0"},200)}).mouseout(function(){$(".cc2_info").remove()});$(".cc3").mouseover(function(e){e.preventDefault();$(".cc3_info").remove();$(this).append('<div class="cc3_info">Estos productos son adecuados para aplicaciones industriales de altos vol\u00famenes de producci\u00f3n y/o trabajos en materiales de grandes espesores. T\u00edpicamente tienen un ciclo de trabajo del 60% al 100% con una corriente de salida de por lo menos 300 Amperes, y est\u00e1n dise\u00f1ados con las caracter\u00edsticas de arco y construcci\u00f3n que demandan los soldadores profesionales.</div>');
$("div.cc3_info").animate({width:"474",height:"100",top:"0"},200)}).mouseout(function(){$(".cc3_info").remove()})});

-->
</script>   


<div class="pz1" style="display:none;">
	<div class="ptitle"></div>
    <div class="pimage"></div>
    <div class="pdescription"></div>
</div>
<div class="pz2" style="display:none;">
	<div class="ptitle"></div>
    <div class="pimage"></div>
    <div class="pdescription"></div>
</div>

<div class="jz1" style="display:none;">
	<div class="ptitle"></div>
    <div class="pimage"></div>
    <div class="pdescription"></div>
</div>
<div class="jz2" style="display:none;">
	<div class="ptitle"></div>
    <div class="pimage"></div>
    <div class="pdescription"></div>
</div>