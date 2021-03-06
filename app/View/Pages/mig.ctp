<?php
	$this->viewVars['title_for_layout']="Infra - Proceso MIG";
	
	echo $this->Html->script(array('jplugins/selectboxes/jquery.selectboxes'), false);
	
	echo $this->Html->css(array('main/selectors'));

?>
<div id="header">
    <?= $this->Html->image('fotos/mig3.jpg'); ?>
    <div class="header-desc">
        <h1>Proceso MIG</h1>
        <h4>Selector de Procesos</h4>
        <p>Seleccione el material a soldar y su espesor. Puede que exista más de una posible recomendación para su selección, escoja la que más le convenga.</p>
        <a href="#" id="vmig" class="nmore" style="width:140px !important;">Ver video &rarr;</a>
    </div>
</div><!-- end #header -->
<h2>Proceso MIG</h2>
<div id="content" class="full">
<div id="stp1" class="smallstep">
    <div class="left">
        <div class="paso">Selección</div><div class="number green"><span class="text">1</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Material a Soldar</div>
    <div class="select"><?= $this->element('steps/mig1-materials'); ?></div>
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
        <div class="paso">Selección</div><div class="number green"><span class="text">2</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Espesor de Material</div>
    <div class="select"><?= $this->element('steps/mig2-calibres'); ?></div>
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
        <div class="paso">Selección</div><div class="number green"><span class="text">3</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Gas de Protección <font style="font-weight:normal; margin-left:20px; font-size:11px;">(Condición de Calidad)</font></div>
    <div class="select"><?= $this->element('steps/mig3-gases'); ?></div>
    <div class="info"><div class="preinfo">Elija la mezcla de gases ideal para sus procesos de acuerdo a las siguientes opciones. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.</div></div>
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
        <div class="paso">Selección</div><div class="number green"><span class="text">4</span></div>
        <div class="loader" style="display:none;"></div>
        <div class="c_holder">
        <div class="cc1">Trabajo Ligero</div>
        <div class="cc2">Trabajo Industrial</div>
        <div class="cc3">Trabajo Pesado</div>
        </div>
    </div>
    
<div class="center">
	<div class="title">Máquina de Soldar <font style="font-weight:normal; margin-left:20px; font-size:11px;">(Alimentación, Salida nominal, Ciclo de trabajo)</font></div>
    <div class="select"><?= $this->element('steps/mig5-maquinas'); ?></div>
    <div class="info"><div class="preinfo">Elija en las siguientes opciones una máquina para soldar de acuerdo al voltaje de alimentación, especificaciones técnicas y tipo de trabajo que desempeñará. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.</div>
    </div>
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
        <div class="paso">Selección</div><div class="number green"><span class="text">5</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Alimentador de Micro Alambre <font style="font-weight:normal; margin-left:20px; font-size:11px;">(Alimentación, Capacidad, Vel. de alimentación)</font></div>
    <div class="select"><?= $this->element('steps/mig6-microalambres'); ?></div>
    <div class="info"><div class="preinfo">Elija en las siguientes opciones el alimentador de microalambre que mejor se adapte a sus necesidades, de acuerdo a la máquina para soldar seleccionada anteriormente. El sistema NO puede ofrecerle alguna alternativa si su máquina para soldar ya tiene el alimentador integrado.</div></div>
</div>

    <div class="right">
    	<div class="title"></div>
        <div class="image"></div>
        <div class="loader" style="display:none;"></div>
    </div>
</div>

<div class="space"></div>



<div id="stp6" class="step">
    <div class="left">
        <div class="paso">Selección</div><div class="number green"><span class="text">6</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Antorcha <font style="font-weight:normal; margin-left:20px; font-size:11px;">(Capacidad de corriente)</font></div>
    <div class="select"><?= $this->element('steps/mig7-antorchas'); ?></div>
    <div class="info"><div class="preinfo">Elija el tipo de antorcha que mejor se adapte a la maquina para soldar seleccionada y a sus procesos de soldadura. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.</div></div>
</div>

    <div class="right">
    	<div class="title"></div>
        <div class="image"></div>
        <div class="loader" style="display:none;"></div>
    </div>
</div>

<div class="space"></div>




<div id="stp7" class="step">
    <div class="left">
        <div class="paso">Selección</div><div class="number green"><span class="text">7</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Material de Aporte</div>
    <div class="select"><?= $this->element('steps/mig4-aportes'); ?></div>
    <div class="info"><div class="preinfo">Elija el material de aporte que requiere para sus procesos de soldadura de acuerdo a los diámetros recomendados. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.</div></div>
</div>

    <div class="right">
    	<div class="title"></div>
        <div class="image"></div>
        <div class="loader" style="display:none;"></div>
    </div>
</div>

<div class="space"></div>




<div id="stp8" class="step">
    <div class="left">
        <div class="paso">Selección</div><div class="number green"><span class="text">8</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Regulador de Presión</div>
    <div class="select"><?= $this->element('steps/mig8-reguladores'); ?></div>
    <div class="info"><div class="preinfo">Elija el regulador de presión que requiere para el cilindro del gas de protección seleccionado. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.</div></div>
</div>

    <div class="right">
    	<div class="title"></div>
        <div class="image"></div>
        <div class="loader" style="display:none;"></div>
    </div>
</div>

<div class="space"></div>

<div class="title"><b>Selección 9</b></div>
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
	<div id="v_mig"><iframe width="854" height="473" src="http://www.youtube.com/embed/W24TueD4dHo?rel=0" frameborder="0" allowfullscreen></iframe></div>
</div>
<script type="text/javascript">
<!--
$(document).ready(function(){$.ajaxSetup({timeout:"9000"});var flag=0;$('#materials option[value=""]').attr("selected","");var path="<?php echo $this->webroot; ?>";$("a#vmig").colorbox({inline:true,href:"#v_mig",maxWidth:"900px",maxHeight:"550px"});$.fn.fClear=function(start,end){for(i=start;i<=end;i++){$("#stp"+i+" .right .title").html("");$("#stp"+i+" .right .image").html("");$("#stp"+i+" .right #ccalidad").remove();$("#stp"+i).find(".faright .view a").hide();$("#stp"+i).find(".faright .link a").hide();
$("div#submit").removeClass("rdy");$("div#submit").addClass("ntrdy");if(i<=8){j=i;if(j==2){$("#calibres").removeOption(/./);$("#stp"+i+" .center .info").html("Elija el calibre o espesor aproximado del material base que soldar\u00e1 de acuerdo a las siguientes opciones.")}if(j==3){$("#gases").removeOption(/./);$("#stp"+i+" .center .info").html("Elija la mezcla de gases ideal para sus procesos de acuerdo a las siguientes opciones. El sistema puede darle una sola opci\u00f3n por default de acuerdo a sus necesidades.")}if(j==
4){$("#maquinas").find("option").remove().end();$("#maquinas").find("optgroup").remove().end();$("#stp"+i+" .center .info").html("Elija en las siguientes opciones una m\u00e1quina para soldar de acuerdo al voltaje de alimentaci\u00f3n, especificaciones t\u00e9cnicas y tipo de trabajo que desempe\u00f1ar\u00e1. El sistema puede darle una sola opci\u00f3n por default de acuerdo a sus necesidades.")}if(j==5){$("#microalambres").removeOption(/./);$("#stp"+i+" .center .info").html("Elija en las siguientes opciones el alimentador de microalambre que mejor se adapte a sus necesidades, de acuerdo a la m\u00e1quina para soldar seleccionada anteriormente. El sistema NO puede ofrecerle alguna alternativa si su m\u00e1quina para soldar ya tiene el alimentador integrado.")}if(j==
6){$("#antorchas").removeOption(/./);$("#stp"+i+" .center .info").html("Elija el tipo de antorcha que mejor se adapte a la maquina para soldar seleccionada y a sus procesos de soldadura. El sistema puede darle una sola\u00a0opci\u00f3n\u00a0por default de acuerdo a sus\u00a0necesidades.")}if(j==7){$("#aportes").removeOption(/./);$("#stp"+i+" .center .info").html("Elija el material de aporte que requiere para sus procesos de soldadura de acuerdo a los\u00a0di\u00e1metros\u00a0recomendados. El sistema puede darle una sola\u00a0opci\u00f3n\u00a0por default de acuerdo a sus\u00a0necesidades.")}if(j==
8){$("#reguladores").removeOption(/./);$("#stp"+i+" .center .info").html("Elija el regulador de\u00a0presi\u00f3n\u00a0que requiere el cilindro del gas de\u00a0protecci\u00f3n\u00a0seleccionado. El sistema puede darle una sola\u00a0opci\u00f3n\u00a0por default de acuerdo a sus\u00a0necesidades.")}if(j==9)$("#slider").hide()}}};$.fn.fNext=function(){if($("#materials option:selected").val()==""){$("#materials").focus();return false}if($("#calibres option:selected").val()==""){$("#calibres").focus();
return false}if($("#gases option:selected").val()==""){$("#gases").focus();return false}if($("#maquinas option:selected").val()==""){$("#maquinas").focus();return false}if($("#microalambres option:selected").val()==""){$("#microalambres").focus();return false}if($("#antorchas option:selected").val()==""){$("#antorchas").focus();return false}if($("#aportes option:selected").val()==""){$("#aportes").focus();return false}if($("#reguladores option:selected").val()==""){$("#reguladores").focus();return false}return true};
$.fn.fClearInner=function(obj){$(obj).find(".right .title").html("");$(obj).find(".right #ccalidad").remove();$(obj).find(".faright .view a").hide();$(obj).find(".faright .link a").hide();$(obj).find(".right .image").html('<img src="'+path+"blank.png"+'" />')};$("#materials").change(function(){flag=0;$("#materials").fMateriales()});$.fn.fMateriales=function(){if($("#materials option:selected").val()!=""){$("#stp1 .left .loader").show();var ax_mat=$.ajax({url:path+"migs/selectorStep2",data:{"id":$("#materials option:selected").val()},
type:"POST",dataType:"json",success:function(data){$("#stp1 .left .loader").fadeOut(200,function(){$("#stp1 .right .title").html($("#materials option:selected").text());$("#calibres").removeOption(/./);$.fn.fClear(2,9);for(i=0;i<data.length;i++){$.each(data[i],function(){calibre=this.name.split("-");if(data.length!=1)$("#calibres").addOption(this.id,calibre[0],false);else{$("#calibres").addOption(this.id,calibre[0]);$("#calibres").fCalibres()}});$("#calibres").focus()}})},error:function(jqXHR,textStatus,
errorThrown){ax_mat.abort();flag=flag+1;if(flag<5)$.fn.fMateriales();else{$('#materials option[value=""]').attr("selected","");$("#stp1 .left .loader").fadeOut(200);$("#stp1 .right .loader").fadeOut(200);$("#stp1 .center .info").html('<font style="color:red;">La aplicaci\u00f3n se demor\u00f3 en mostrar los resultados. Por favor intente de nuevo su selecci\u00f3n. Si el problema persiste, cont\u00e1ctenos.</font>')}}});$("#stp1 .right .image").html("");$("#stp1 .right .loader").show();var ax_mat2=
$.ajax({url:path+"migs/interStep2",data:{"id":$("#materials option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp1 .right .loader").fadeOut(200,function(){$.each(data,function(){$("#stp1 .center .info").html(this.description);$("#stp1 .right .image").html('<img src="'+this.smallimage+'" />');if(this.infra_link!=""){$("#stp1 .faright .link a").attr("href",this.infra_link);$("#stp1 .faright .link a").fadeIn()}else $("#stp1 .faright .link a").hide();$("#stp1 .faright .view a").attr("href",
path+"materials/view/"+this.id);$("#stp1 .faright .view a").show()})})},error:function(jqXHR,textStatus,errorThrown){ax_mat2.abort();flag=flag+1;if(flag<5)$.fn.fMateriales();else{$('#materials option[value=""]').attr("selected","");$("#stp1 .left .loader").fadeOut(200);$("#stp1 .right .loader").fadeOut(200);$("#stp1 .center .info").html('<font style="color:red;">La aplicaci\u00f3n se demor\u00f3 en mostrar los resultados. Por favor intente de nuevo su selecci\u00f3n. Si el problema persiste, cont\u00e1ctenos.</font>')}}})}else{$.fn.fClearInner($("#stp1"));
$.fn.fClear(2,9);$("#stp1 .center .info").html("Elija el tipo de material base que soldar\u00e1 de acuerdo a las siguientes opciones.")}};$("#calibres").change(function(){flag=0;$("#calibres").fCalibres()});$.fn.fCalibres=function(){if($("#calibres option:selected").val()!=""){$("#stp2 .left .loader").show();var ax_cal=$.ajax({url:path+"migs/selectorStep3",data:{"id":$("#calibres option:selected").val(),"matid":$("#materials option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp2 .left .loader").fadeOut(200,
function(){$("#stp2 .right .title").html($("#calibres option:selected").text());$("#gases").removeOption(/./);$.fn.fClear(3,9);for(i=0;i<data.length;i++){$.each(data[i],function(){if(data.length!=1)$("#gases").addOption(this.id,this.name+" ("+this.ccalidad.Calidadgase.name+")",false);else{$("#gases").addOption(this.id,this.name+" ("+this.ccalidad.Calidadgase.name+")");$("#gases").fGases()}});$("#gases").focus()}})},error:function(jqXHR,textStatus,errorThrown){ax_cal.abort();flag=flag+1;if(flag<5)$.fn.fCalibres();
else{$('#calibres option[value=""]').attr("selected","");$("#stp2 .left .loader").fadeOut(200);$("#stp2 .right .loader").fadeOut(200);$("#stp2 .center .info").html('<font style="color:red;">La aplicaci\u00f3n se demor\u00f3 en mostrar los resultados. Por favor intente de nuevo su selecci\u00f3n. Si el problema persiste, cont\u00e1ctenos.</font>')}}});$("#stp2 .right .image").html("");$("#stp2 .right .loader").show();var ax_cal2=$.ajax({url:path+"migs/interStep3",data:{"id":$("#calibres option:selected").val()},
type:"POST",dataType:"json",success:function(data){$("#stp2 .right .loader").fadeOut(200,function(){$.each(data,function(){$("#stp2 .center .info").html(this.description);if(this.smallimage!=null)$("#stp2 .right .image").html('<img src="'+this.smallimage+'" />');else $("#stp2 .right .image").html('<img src="'+path+'img/calibres/default.png" />');if(this.infra_link!=""){$("#stp2 .faright .link a").attr("href",this.infra_link);$("#stp2 .faright .link a").fadeIn()}else $("#stp2 .faright .link a").hide()})})},
error:function(jqXHR,textStatus,errorThrown){ax_cal2.abort();flag=flag+1;if(flag<5)$.fn.fCalibres();else{$('#calibres option[value=""]').attr("selected","");$("#stp2 .left .loader").fadeOut(200);$("#stp2 .right .loader").fadeOut(200);$("#stp2 .center .info").html('<font style="color:red;">La aplicaci\u00f3n se demor\u00f3 en mostrar los resultados. Por favor intente de nuevo su selecci\u00f3n. Si el problema persiste, cont\u00e1ctenos.</font>')}}})}else{$.fn.fClearInner($("#stp2"));$.fn.fClear(3,
9);$("#stp2 .center .info").html("Elija el calibre o espesor aproximado del material base que soldar\u00e1 de acuerdo a las siguientes opciones.")}};$("#gases").change(function(){flag=0;$("#gases").fGases()});$.fn.fGases=function(){if($("#gases option:selected").val()!=""){$("#stp3 .left .loader").show();var ax_gas=$.ajax({url:path+"migs/selectorStep4",data:{"id":$("#gases option:selected").val(),"calibreid":$("#calibres option:selected").val(),"matid":$("#materials option:selected").val()},type:"POST",
dataType:"json",success:function(data){$("#stp3 .left .loader").fadeOut(200,function(){$("#maquinas").find("option").remove().end();$("#maquinas").find("optgroup").remove().end();$.fn.fClear(4,9);$("<option value=''></option>").prependTo($("#maquinas"));var ciclo1=0;var ciclo2=0;var ciclo3=0;for(i=0;i<data.length;i++){$.each(data[i],function(){if(this.ciclomaquina_id==3&&ciclo3==0){$("#maquinas").append('<optgroup label="'+this.Cicloname+'" id="3">');ciclo3=1}if(this.ciclomaquina_id==2&&ciclo2==0){$("#maquinas").append('<optgroup label="'+
this.Cicloname+'" id="2">');ciclo2=1}if(this.ciclomaquina_id==1&&ciclo1==0){$("#maquinas").append('<optgroup label="'+this.Cicloname+'" id="1">');ciclo1=1}if(data.length!=1){$("#maquinas").addOption(this.mid,this.name+' '+this.short,false);$("#maquinas option[value='"+this.mid+"']").appendTo($("#maquinas optgroup[id='"+this.ciclomaquina_id+"']"))}else{$("#maquinas").addOption(this.mid,this.name+' '+this.short);$("#maquinas option[value='"+this.mid+"']").appendTo($("#maquinas optgroup[id='"+this.ciclomaquina_id+"']"));$("#maquinas").fMaquinas()}});
$("#maquinas").focus()}})},error:function(jqXHR,textStatus,errorThrown){ax_gas.abort();$("#gases").fGases()}});$("div#ccalidad").remove();var ax_gas2=$.ajax({url:path+"migs/ccalidad",data:{"gasid":$("#gases option:selected").val(),"calibreid":$("#calibres option:selected").val(),"matid":$("#materials option:selected").val()},type:"POST",dataType:"json",success:function(data){$("div#stp3 div.right").append('<div id="ccalidad"><b>Condici\u00f3n de Calidad</b>:<br />'+data["Calidadgase"]["name"]+"</div>")},
error:function(jqXHR,textStatus,errorThrown){ax_gas2.abort();flag=flag+1;if(flag<5)$.fn.fGases();else{$('#gases option[value=""]').attr("selected","");$("#stp3 .left .loader").fadeOut(200);$("#stp3 .right .loader").fadeOut(200);$("#stp3 .center .info").html('<font style="color:red;">La aplicaci\u00f3n se demor\u00f3 en mostrar los resultados. Por favor intente de nuevo su selecci\u00f3n. Si el problema persiste, cont\u00e1ctenos.</font>')}}});$("#stp3 .right .image").html("");$("#stp3 .right .loader").show();
var ax_gas3=$.ajax({url:path+"migs/interStep4",data:{"id":$("#gases option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp3 .right .loader").fadeOut(200,function(){$.each(data,function(){$("#stp3 .right .title").html(this.name);$("#stp3 .center .info").html(this.description);if(this.smallimage!=null)$("#stp3 .right .image").html('<img src="'+this.smallimage+'" />');else $("#stp3 .right .image").html('<img src="'+path+'img/gases/default.png" />');if(this.infra_link!=""){$("#stp3 .faright .link a").attr("href",
this.infra_link);$("#stp3 .faright .link a").fadeIn()}else $("#stp3 .faright .link a").hide();$("#stp3 .faright .view a").attr("href",path+"gases/view/"+this.id);$("#stp3 .faright .view a").show()})})},error:function(jqXHR,textStatus,errorThrown){ax_gas3.abort();flag=flag+1;if(flag<5)$.fn.fGases();else{$('#gases option[value=""]').attr("selected","");$("#stp3 .left .loader").fadeOut(200);$("#stp3 .right .loader").fadeOut(200);$("#stp3 .center .info").html('<font style="color:red;">La aplicaci\u00f3n se demor\u00f3 en mostrar los resultados. Por favor intente de nuevo su selecci\u00f3n. Si el problema persiste, cont\u00e1ctenos.</font>')}}})}else{$.fn.fClearInner($("#stp3"));
$.fn.fClear(4,9);$("#stp3 .center .info").html("Elija la mezcla de gases ideal para sus procesos de acuerdo a las siguientes opciones. El sistema puede darle una sola opci\u00f3n por default de acuerdo a sus necesidades.")}};$("#maquinas").change(function(){flag=0;$("#maquinas").fMaquinas()});$.fn.fMaquinas=function(){if($("#maquinas option:selected").val()!=""){$("#stp4 .left .loader").show();var ax_maq=$.ajax({url:path+"migs/selectorStep5",data:{"id":$("#maquinas option:selected").val(),"gasid":$("#gases option:selected").val(),
"calibreid":$("#calibres option:selected").val(),"matid":$("#materials option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp4 .left .loader").fadeOut(200,function(){$("#microalambres").removeOption(/./);$.fn.fClear(5,9);for(i=0;i<data.length;i++){$.each(data[i],function(){if(data.length!=1)$("#microalambres").addOption(this.id,this.name+' '+this.short,false);else{$("#microalambres").addOption(this.id,this.name+' '+this.short);$("#microalambres").fMicroalambres()}});$("#microalambres").focus()}})},
error:function(jqXHR,textStatus,errorThrown){ax_maq.abort();flag=flag+1;if(flag<5)$.fn.fMaquinas();else{$('#maquinas option[value=""]').attr("selected","");$("#stp4 .left .loader").fadeOut(200);$("#stp4 .right .loader").fadeOut(200);$("#stp4 .center .info").html('<font style="color:red;">La aplicaci\u00f3n se demor\u00f3 en mostrar los resultados. Por favor intente de nuevo su selecci\u00f3n. Si el problema persiste, cont\u00e1ctenos.</font>')}}});$("#stp4 .right .image").html("");$("#stp4 .right .loader").show();
var ax_maq2=$.ajax({url:path+"migs/interStep5",data:{"id":$("#maquinas option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp4 .right .loader").fadeOut(200,function(){$.each(data,function(){$("#stp4 .right .title").html(this.name);$("#stp4 .center .info").html(this.description);$("#stp4 .right .image").html('<img src="'+this.smallimage+'" />');if(this.infra_link!=""){$("#stp4 .faright .link a").attr("href",this.infra_link);$("#stp4 .faright .link a").fadeIn()}else $("#stp4 .faright .link a").hide();
$("#stp4 .faright .view a").attr("href",path+"maquinas/view/"+this.id);$("#stp4 .faright .view a").show()})})},error:function(jqXHR,textStatus,errorThrown){ax_maq2.abort();flag=flag+1;if(flag<5)$.fn.fMaquinas();else{$('#maquinas option[value=""]').attr("selected","");$("#stp4 .left .loader").fadeOut(200);$("#stp4 .right .loader").fadeOut(200);$("#stp4 .center .info").html('<font style="color:red;">La aplicaci\u00f3n se demor\u00f3 en mostrar los resultados. Por favor intente de nuevo su selecci\u00f3n. Si el problema persiste, cont\u00e1ctenos.</font>')}}})}else{$.fn.fClearInner($("#stp4"));
$.fn.fClear(5,9);$("#stp4 .center .info").html("Elija en las siguientes opciones una m\u00e1quina para soldar de acuerdo al voltaje de alimentaci\u00f3n, especificaciones t\u00e9cnicas y tipo de trabajo que desempe\u00f1ar\u00e1. El sistema puede darle una sola opci\u00f3n por default de acuerdo a sus necesidades.")}};$("#microalambres").change(function(){flag=0;$("#microalambres").fMicroalambres()});$.fn.fMicroalambres=function(){if($("#microalambres option:selected").val()!=""){$("#stp5 .left .loader").show();
var ax_micro=$.ajax({url:path+"migs/selectorStep6",data:{"id":$("#microalambres option:selected").val(),"maqid":$("#maquinas option:selected").val(),"gasid":$("#gases option:selected").val(),"calibreid":$("#calibres option:selected").val(),"matid":$("#materials option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp5 .left .loader").fadeOut(200,function(){$.fn.fClear(6,9);$("#antorchas").removeOption(/./);for(i=0;i<data.length;i++){$.each(data[i],function(){if(data.length!=
1)$("#antorchas").addOption(this.id,this.name,false);else{$("#antorchas").addOption(this.id,this.name);$("#antorchas").fAntorchas()}});$("#antorchas").focus()}})},error:function(jqXHR,textStatus,errorThrown){ax_micro.abort();flag=flag+1;if(flag<5)$.fn.fMicroalambres();else{$('#microalambres option[value=""]').attr("selected","");$("#stp5 .left .loader").fadeOut(200);$("#stp5 .right .loader").fadeOut(200);$("#stp5 .center .info").html('<font style="color:red;">La aplicaci\u00f3n se demor\u00f3 en mostrar los resultados. Por favor intente de nuevo su selecci\u00f3n. Si el problema persiste, cont\u00e1ctenos.</font>')}}});
$("#stp5 .right .image").html("");$("#stp5 .right .loader").show();var ax_micro2=$.ajax({url:path+"migs/interStep6",data:{"id":$("#microalambres option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp5 .right .loader").fadeOut(200,function(){$.each(data,function(){$("#stp5 .right .title").html(this.name);$("#stp5 .center .info").html(this.description);$("#stp5 .right .image").html('<img src="'+this.smallimage+'" />')})})},error:function(jqXHR,textStatus,errorThrown){ax_micro2.abort();
flag=flag+1;if(flag<5)$.fn.fMicroalambres();else{$('#microalambres option[value=""]').attr("selected","");$("#stp5 .left .loader").fadeOut(200);$("#stp5 .right .loader").fadeOut(200);$("#stp5 .center .info").html('<font style="color:red;">La aplicaci\u00f3n se demor\u00f3 en mostrar los resultados. Por favor intente de nuevo su selecci\u00f3n. Si el problema persiste, cont\u00e1ctenos.</font>')}}})}else{$.fn.fClearInner($("#stp5"));$.fn.fClear(6,9);$("#stp5 .center .info").html("Elija en las siguientes opciones el alimentador de microalambre que mejor se adapte a sus necesidades, de acuerdo a la m\u00e1quina para soldar seleccionada anteriormente. El sistema NO puede ofrecerle alguna alternativa si su m\u00e1quina para soldar ya tiene el alimentador integrado.")}};
$("#antorchas").change(function(){flag=0;$("#antorchas").fAntorchas()});$.fn.fAntorchas=function(){if($("#antorchas option:selected").val()!=""){$("#stp6 .left .loader").show();var ax_ant=$.ajax({url:path+"migs/selectorStep7",data:{"id":$("#antorchas option:selected").val(),"microid":$("#microalambres option:selected").val(),"maqid":$("#maquinas option:selected").val(),"gasid":$("#gases option:selected").val(),"calibreid":$("#calibres option:selected").val(),"matid":$("#materials option:selected").val()},
type:"POST",dataType:"json",success:function(data){$("#stp6 .left .loader").fadeOut(200,function(){$.fn.fClear(7,9);$("#stp6 .right .title").html($("#antorchas option:selected").text());$("#aportes").removeOption(/./);for(i=0;i<data.length;i++){$.each(data[i],function(){if(data.length!=1)$("#aportes").addOption(this.id,this.name,false);else{$("#aportes").addOption(this.id,this.name);$("#aportes").fAportes()}});$("#aportes").focus()}})},error:function(jqXHR,textStatus,errorThrown){ax_ant.abort();flag=
flag+1;if(flag<5)$.fn.fAntorchas();else{$('#antorchas option[value=""]').attr("selected","");$("#stp6 .left .loader").fadeOut(200);$("#stp6 .right .loader").fadeOut(200);$("#stp6 .center .info").html('<font style="color:red;">La aplicaci\u00f3n se demor\u00f3 en mostrar los resultados. Por favor intente de nuevo su selecci\u00f3n. Si el problema persiste, cont\u00e1ctenos.</font>')}}});$("#stp6 .right .image").html("");$("#stp6 .right .loader").show();var ax_ant2=$.ajax({url:path+"migs/interStep7",
data:{"id":$("#antorchas option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp6 .right .loader").fadeOut(200,function(){$.each(data,function(){$("#stp6 .center .info").html(this.description);$("#stp6 .right .image").html('<img src="'+this.smallimage+'" />')})})},error:function(jqXHR,textStatus,errorThrown){ax_ant.abort();flag=flag+1;if(flag<5)$.fn.fAntorchas();else{$('#antorchas option[value=""]').attr("selected","");$("#stp6 .left .loader").fadeOut(200);$("#stp6 .right .loader").fadeOut(200);
$("#stp6 .center .info").html('<font style="color:red;">La aplicaci\u00f3n se demor\u00f3 en mostrar los resultados. Por favor intente de nuevo su selecci\u00f3n. Si el problema persiste, cont\u00e1ctenos.</font>')}}})}else{$.fn.fClearInner($("#stp6"));$.fn.fClear(7,9);$("#stp6 .center .info").html("Elija el tipo de antorcha que mejor se adapte a la maquina para soldar seleccionada y a sus procesos de soldadura. El sistema puede darle una sola\u00a0opci\u00f3n\u00a0por default de acuerdo a sus\u00a0necesidades.")}};
$("#aportes").change(function(){flag=0;$("#aportes").fAportes()});$.fn.fAportes=function(){if($("#aportes option:selected").val()!=""){$("#stp7 .left .loader").show();var ax_apo=$.ajax({url:path+"migs/selectorStep8",data:{"id":$("#aportes option:selected").val(),"antoid":$("#antorchas option:selected").val(),"microid":$("#microalambres option:selected").val(),"maqid":$("#maquinas option:selected").val(),"gasid":$("#gases option:selected").val(),"calibreid":$("#calibres option:selected").val(),"matid":$("#materials option:selected").val()},
type:"POST",dataType:"json",success:function(data){$("#stp7 .left .loader").fadeOut(200,function(){$.fn.fClear(8,9);$("#stp7 .right .title").html($("#aportes option:selected").text());$("#reguladores").removeOption(/./);for(i=0;i<data.length;i++){$.each(data[i],function(){if(data.length!=1)$("#reguladores").addOption(this.id,this.name,false);else{$("#reguladores").addOption(this.id,this.name);$("#reguladores").fReguladores()}});$("#reguladores").focus()}})},error:function(jqXHR,textStatus,errorThrown){ax_apo.abort();
flag=flag+1;if(flag<5)$.fn.fAportes();else{$('#aportes option[value=""]').attr("selected","");$("#stp7 .left .loader").fadeOut(200);$("#stp7 .right .loader").fadeOut(200);$("#stp7 .center .info").html('<font style="color:red;">La aplicaci\u00f3n se demor\u00f3 en mostrar los resultados. Por favor intente de nuevo su selecci\u00f3n. Si el problema persiste, cont\u00e1ctenos.</font>')}}});$("#stp7 .right .image").html("");$("#stp7 .right .loader").show();var ax_apo2=$.ajax({url:path+"migs/interStep8",
data:{"id":$("#aportes option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp7 .right .loader").fadeOut(200,function(){$.each(data,function(){$("#stp7 .center .info").html(this.description);$("#stp7 .right .image").html('<img src="'+this.smallimage+'" />')})})},error:function(jqXHR,textStatus,errorThrown){ax_apo2.abort();flag=flag+1;if(flag<5)$.fn.fAportes();else{$('#aportes option[value=""]').attr("selected","");$("#stp7 .left .loader").fadeOut(200);$("#stp7 .right .loader").fadeOut(200);
$("#stp7 .center .info").html('<font style="color:red;">La aplicaci\u00f3n se demor\u00f3 en mostrar los resultados. Por favor intente de nuevo su selecci\u00f3n. Si el problema persiste, cont\u00e1ctenos.</font>')}}})}else{$.fn.fClearInner($("#stp7"));$.fn.fClear(8,9);$("#stp7 .center .info").html("Elija el material de aporte que requiere para sus procesos de soldadura de acuerdo a los\u00a0di\u00e1metros\u00a0recomendados. El sistema puede darle una sola\u00a0opci\u00f3n\u00a0por default de acuerdo a sus\u00a0necesidades.")}};
$("#reguladores").change(function(){flag=0;$("#reguladores").fReguladores()});$.fn.fReguladores=function(){if($("#reguladores option:selected").val()!=""){$("#stp8 .left .loader").show();var ax_reg=$.ajax({url:path+"migs/seccions",data:{"id":$("#reguladores option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#tabs ul").empty();$("#tabs div").remove();$("#stp8 .left .loader").fadeOut(200,function(){$("#stp8 .right .title").html($("#reguladores option:selected").text());for(i=
0;i<data.length;i++)$.each(data[i],function(){j=i+1;$("#tabs").find("ul").append('<li><a href="'+path+"seccions/getMig/"+this.id+'">'+this.name+"</a></li>")});$("#tabs").tabs({ajaxOptions:{success:function(){},error:function(xhr,status,index,anchor){$(anchor.hash).html("No se pudo cargar esta pesta\u00f1a. Estamos mejorando para Usted.")},type:"POST"},cache:true})})},error:function(jqXHR,textStatus,errorThrown){ax_reg.abort();flag=flag+1;if(flag<5)$.fn.fReguladores();else{$('#reguladores option[value=""]').attr("selected",
"");$("#stp8 .left .loader").fadeOut(200);$("#stp8 .right .loader").fadeOut(200);$("#stp8 .center .info").html('<font style="color:red;">La aplicaci\u00f3n se demor\u00f3 en mostrar los resultados. Por favor intente de nuevo su selecci\u00f3n. Si el problema persiste, cont\u00e1ctenos.</font>')}}});$("#stp8 .right .image").html("");$("#stp8 .right .loader").show();var ax_reg2=$.ajax({url:path+"migs/interStep9",data:{"id":$("#reguladores option:selected").val()},type:"POST",dataType:"json",success:function(data){$("#stp8 .right .loader").fadeOut(200,
function(){$.each(data,function(){$("#stp8 .center .info").html(this.description);$("#stp8 .right .image").html('<img src="'+this.smallimage+'" />')})})},error:function(jqXHR,textStatus,errorThrown){ax_reg2.abort();flag=flag+1;if(flag<5)$.fn.fReguladores();else{$('#reguladores option[value=""]').attr("selected","");$("#stp8 .left .loader").fadeOut(200);$("#stp8 .right .loader").fadeOut(200);$("#stp8 .center .info").html('<font style="color:red;">La aplicaci\u00f3n se demor\u00f3 en mostrar los resultados. Por favor intente de nuevo su selecci\u00f3n. Si el problema persiste, cont\u00e1ctenos.</font>')}}});
$("div#submit").removeClass("ntrdy");$("div#submit").addClass("rdy")}else{$.fn.fClearInner($("#stp8"));$("#stp8 .center .info").html("Elija el regulador de\u00a0presi\u00f3n\u00a0que requiere el cilindro del gas de\u00a0protecci\u00f3n\u00a0seleccionado. El sistema puede darle una sola\u00a0opci\u00f3n\u00a0por default de acuerdo a sus\u00a0necesidades.")}};$("div#submit").click(function(){valid=$.fn.fNext();if(valid==true){var protect="";$("input[type=checkbox]").each(function(){if($(this).attr("checked")==
"checked"){if(protect=="")protect="/prot/";protect=protect+$(this).attr("id")+"-"}});var cadena="/mat/"+$("#materials option:selected").val()+"/cal/"+$("#calibres option:selected").val()+"/gas/"+$("#gases option:selected").val()+"/maq/"+$("#maquinas option:selected").val()+"/micro/"+$("#microalambres option:selected").val()+"/ant/"+$("#antorchas option:selected").val()+"/apo/"+$("#aportes option:selected").val()+"/reg/"+$("#reguladores option:selected").val()+protect;document.location.href=path+"mig/step2"+
cadena}else $.growlUI("Aviso",'<?= "<div class=\"flash_success\">Escoja las opciones faltantes para poder continuar.</div>"; ?>',3E3,"",1)});$(".cc1").mouseover(function(e){e.preventDefault();$(".cc1_info").remove();$(this).append('<div class="cc1_info">Estos productos son adecuados para el uso en talleres de herrer\u00eda, hojalater\u00eda, para el hogar, trabajos de hobby y para usuarios ocasionales. Est\u00e1n dise\u00f1ados para ser f\u00e1ciles de operar y t\u00edpicamente tienen un ciclo de trabajo hasta del 40% con una salida de corriente de 250 Amperes o menos.</div>');
$("div.cc1_info").animate({width:"474",height:"80",top:"0"},200)}).mouseout(function(){$(".cc1_info").remove()});$(".cc2").mouseover(function(e){e.preventDefault();$(".cc2_info").remove();$(this).append('<div class="cc2_info">Estos productos son adecuados para aplicaciones industriales pero que no requieren altos vol\u00famenes de producci\u00f3n y t\u00edpicamente tienen un ciclo de trabajo del 30% al 60% con una salida de corriente de 300 Amperes o menos.</div>');$("div.cc2_info").animate({width:"474",
height:"60",top:"0"},200)}).mouseout(function(){$(".cc2_info").remove()});$(".cc3").mouseover(function(e){e.preventDefault();$(".cc3_info").remove();$(this).append('<div class="cc3_info">Estos productos son adecuados para aplicaciones industriales de altos vol\u00famenes de producci\u00f3n y/o trabajos en materiales de grandes espesores. T\u00edpicamente tienen un ciclo de trabajo del 60% al 100% con una corriente de salida de por lo menos 300 Amperes, y est\u00e1n dise\u00f1ados con las caracter\u00edsticas de arco y construcci\u00f3n que demandan los soldadores profesionales.</div>');
$("div.cc3_info").animate({width:"474",height:"100",top:"0"},200)}).mouseout(function(){$(".cc3_info").remove()})});
-->
</script>   