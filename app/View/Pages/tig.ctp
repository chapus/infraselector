<?php
	$this->viewVars['title_for_layout']="Infra - Proceso TIG";
	
	echo $this->Html->script(array('jplugins/selectboxes/jquery.selectboxes', 'jplugins/nivoslider/jquery.nivo.slider'), false);
	
	echo $this->Html->css(array('main/selectors', 'nivo/nivo-slider'));
?>
<div id="header">
    <?= $this->Html->image('fotos/tig3v2.jpg'); ?>
    <div class="header-desc">
        <h1>Proceso TIG</h1>
        <h4>Selector de Procesos</h4>
        <p>Seleccione el material a soldar y su espesor. Puede que exista más de una posible recomendación para su selección, escoja la que más le convenga.</p>
        <a href="#" id="vtig" class="nmore" style="width:140px !important;">Ver video &rarr;</a>
    </div>
</div><!-- end #header -->
<h2>Proceso TIG</h2>

<div id="content" class="full">
<div id="stp1" class="smallstep">
    <div class="left">
        <div class="paso">Selección</div><div class="number red"><span class="text">1</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Material a Soldar</div>
    <div class="select"><?= $this->element('steps/tig1-materials'); ?></div>
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
        <div class="paso">Selección</div><div class="number red"><span class="text">2</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Espesor de Material</div>
    <div class="select"><?= $this->element('steps/tig2-calibres'); ?></div>
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


<div id="stp21" class="smallstep">
    <div class="left">
        <div class="paso">Selección</div><div class="number red"><span class="text">2.1</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
    <div class="title">Condición de Calidad</div>
    <div class="select"><?= $this->element('steps/tig31-ccalidad'); ?></div>
    <div class="ovinfo"><div class="info"><div class="preinfo">Elija la condición de calidad que necesita deacuerdo a las siguientes opciones.</div></div></div>
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
        <div class="paso">Selección</div><div class="number red"><span class="text">3</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Gas de Protección <font style="font-weight:normal; margin-left:20px; font-size:11px;">(Condición de Calidad)</font></div>
    <div class="select"><?= $this->element('steps/tig3-gases'); ?></div>
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
        <div class="paso">Selección</div><div class="number red"><span class="text">4</span></div>
        <div class="loader" style="display:none;"></div>
        <div class="c_holder">
        <div class="cc1">Trabajo Ligero</div>
        <div class="cc2">Trabajo Industrial</div>
        <div class="cc3">Trabajo Pesado</div>
        </div>
    </div>
    
<div class="center">
	<div class="title">Máquina de Soldar <font style="font-weight:normal; margin-left:20px; font-size:11px;">(Alimentación, Salida nominal, Ciclo de trabajo)</font></div>
    <div class="select"><?= $this->element('steps/tig4-maquinas'); ?></div>
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
        <div class="paso">Selección</div><div class="number red"><span class="text">5</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Antorcha <font style="font-weight:normal; margin-left:20px; font-size:11px;">(Capacidad de corriente)</font></div>
    <div class="select"><?= $this->element('steps/tig5-antorchas'); ?></div>
    <div class="info"><div class="preinfo">Elija el tipo de antorcha que mejor se adapte a la maquina para soldar seleccionada y a sus procesos de soldadura. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.</div></div>
</div>

    <div class="right">
    	<div class="title"></div>
        <div class="image"></div>
        <div class="loader" style="display:none;"></div>
    </div>
</div>

<div class="space"></div>




<div id="stp61" class="step">
    <div class="left">
        <div class="paso">Selección</div><div class="number red"><span class="text">5.1</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
    <div class="title">Tungsteno</div>
    <div class="select"><?= $this->element('steps/tig61-tungstenos'); ?></div>
    <div class="info"><div class="preinfo">Elija el tungsteno para la antorcha seleccionada. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.</div></div>
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
        <div class="paso">Selección</div><div class="number red"><span class="text">6</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Material de Aporte</div>
    <div class="select"><?= $this->element('steps/tig6-aportes'); ?></div>
    <div class="info"><div class="preinfo">Elija el material de aporte que requiere para sus procesos de soldadura de acuerdo a los diámetros recomendados. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.</div></div>
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
        <div class="paso">Selección</div><div class="number red"><span class="text">7</span></div>
        <div class="loader" style="display:none;"></div>
    </div>
    
<div class="center">
	<div class="title">Regulador de Presión</div>
    <div class="select"><?= $this->element('steps/tig7-reguladores'); ?></div>
    <div class="info"><div class="preinfo">Elija el regulador de presión que requiere para el cilindro del gas de protección seleccionado. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.</div></div>
</div>

    <div class="right">
    	<div class="title"></div>
        <div class="image"></div>
        <div class="loader" style="display:none;"></div>
    </div>
</div>

<div class="space"></div>


<div class="title"><b>Selección 8</b></div>
<div class="subtitle">Equipos Alternativos (opcionales)</div>


<div id="tab_alternativos">
	<ul>
    	<li><a href="#tab_alt1">Equipos Alternativos</a></li>
	</ul>
    <div id="tab_alt1"></div>
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

<div id="holdalt" style="display:none;"></div>


</div>

<div class="informations" style="display:none;">
    <div id="v_tig"><iframe width="854" height="473" src="http://www.youtube.com/embed/EZnQmRApxRU?rel=0" frameborder="0" allowfullscreen></iframe></div>
</div>
<script type="text/javascript">
<!--
$(document).ready(function() { 

$.ajaxSetup({
  timeout: '9000'
});
var flag = 0;

$('#materials option[value=""]').attr('selected', '');
    
    var path = "<?php echo $this->webroot; ?>";

      $("#tab_alternativos").tabs();
      
$.fn.fClear = function(start, end) {
    for(i = start; i <= end; i++) {
        $('#stp'+i+' .right .title').html('');
        $('#stp'+i+' .right .image').html('');
        $('#stp'+i+' .right #ccalidad').remove();
        $('#stp'+i+' .right #accesorio').remove();
        $('#stp'+i+' .right #amperaje').remove();
        $('#stp'+i).find('.faright .view a').hide();
        $('#stp'+i).find('.faright .link a').hide();
        $('div#submit').removeClass('rdyred');
        $('div#submit').addClass('ntrdy');  
        if(i <= 8) {
            j = i;
            if(j == 2) { $("#calibres").removeOption(/./); $('#stp'+i+' .center .info').html('Elija el calibre o espesor aproximado del material base que soldará de acuerdo a las siguientes opciones.'); }
            if(j == 3) { $("#gases").removeOption(/./); $('#stp'+i+' .center .info').html('Elija la mezcla de gases ideal para sus procesos de acuerdo a las siguientes opciones. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.'); }
            if(j == 4) { $("#maquinas").removeOption(/./); $('#stp'+i+' .center .info').html('Elija en las siguientes opciones una máquina para soldar de acuerdo al voltaje de alimentación, especificaciones técnicas y tipo de trabajo que desempeñará. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.'); }
            if(j == 5) { $("#antorchas").removeOption(/./); $('#stp'+i+' .center .info').html('Elija el tipo de antorcha que mejor se adapte a la maquina para soldar seleccionada y a sus procesos de soldadura. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.'); }
            if(j == 6) { $("#aportes").removeOption(/./); $('#stp'+i+' .center .info').html('Elija el material de aporte que requiere para sus procesos de soldadura de acuerdo a los diámetros recomendados. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.'); }
            if(j == 7) { $("#reguladores").removeOption(/./); $('#stp'+i+' .center .info').html('Elija el regulador de presión que requiere el cilindro del gas de protección seleccionado.El sistema puede darle una sola opción por default de acuerdo a sus necesidades.'); }
            if(j == 8) { $("#alternativos").removeOption(/./); }
            if(j == 9) { $("#slider").hide(); }
        }
    }
        
}

$.fn.fNext = function() {
    if($('#materials option:selected').val() == "") {
        $('#materials').focus();
        return false;
    } 
    if($('#calibres option:selected').val() == "") {
        $('#calibres').focus();
        return false;
    } 
    if($('#gases option:selected').val() == "") {
        $('#gases').focus();
        return false;
    } 
    if($('#maquinas option:selected').val() == "") {
        $('#maquinas').focus();
        return false;
    } 
    if($('#antorchas option:selected').val() == "") {
        $('#antorchas').focus();
        return false;
    } 
    if($('#aportes option:selected').val() == "") {
        $('#aportes').focus();
        return false;
    } 
    if($('#reguladores option:selected').val() == "") {
        $('#reguladores').focus();
        return false;
    } 
    if($('#alternativos option:selected').val() == "") {
        $('#alternativos').focus();
        return false;
    } 
    return true;
}

$.fn.fClearInner = function(obj) {
    $(obj).find('.right .title').html('');
    $(obj).find('.right #ccalidad').remove();
    $(obj).find('.right #amperaje').remove();
    $(obj).find('.right #accesorio').remove();
    $(obj).find('.faright .view a').hide();
    $(obj).find('.faright .link a').hide();
    $(obj).find('.right .image').html('<img src="'+path+'blank.png'+'" />');
}

$("#materials").change(function() {
    flag = 0;
    $("#materials").fMateriales();
}); 
$.fn.fMateriales = function() {   
    if($('#materials option:selected').val() != "") {
       $('#stp1 .left .loader').show();
       
            var ax_mat = $.ajax({
                url: path+'tigs/selectorStep2',
                data: {'id' : $('#materials option:selected').val()},
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('#stp1 .left .loader').fadeOut(200, function () {
                        //alert(data.length);
                        $('#stp1 .right .title').html($('#materials option:selected').text());
                        $("#calibres").removeOption(/./);
                        $.fn.fClear(2, 9);
                        for(i = 0; i < data.length; i++) {
                            $.each(data[i], function() {
                            //alert(this.name);
                                calibre = this.name.split("-");
                                if(data.length != 1) {
                                    $("#calibres").addOption(this.id, calibre[0], false);
                                } else {
                                    $("#calibres").addOption(this.id, calibre[0]);
                                    $("#calibres").fCalibres();
                                }
                            });
                            $("#calibres").focus();
                        }
                        
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("AJAX - error() "+ textStatus);
                    ax_mat.abort();
                    flag = flag + 1;
                    if(flag < 5) {
                        $.fn.fMateriales();
                    } else {
                        $('#materials option[value=""]').attr('selected', '');
                        $('#stp1 .left .loader').fadeOut(200);
                        $('#stp1 .right .loader').fadeOut(200);
                        $('#stp1 .center .info').html('<font style="color:red;">La aplicación se demoró en mostrar los resultados. Por favor intente de nuevo su selección. Si el problema persiste, contáctenos.</font>');
                    }
                }
            });
            $('#stp1 .right .image').html('');
            $('#stp1 .right .loader').show();
            $.ajax({
                url: path+'tigs/interStep2',
                data: {'id' : $('#materials option:selected').val()},
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('#stp1 .right .loader').fadeOut(200, function () {
                        $.each(data, function() {
                            $('#stp1 .center .info').html(this.description);
                            if(this.smallimage != null) {
                                $('#stp1 .right .image').html('<img src="'+this.smallimage+'" />');
                            } else {
                                $('#stp1 .right .image').html('<img src="'+path+'img/materials/default.png" />');
                            }
                            
                            if(this.infra_link != "") {
                                $('#stp1 .faright .link a').attr('href', this.infra_link);
                                $('#stp1 .faright .link a').fadeIn();
                            } else {
                                $('#stp1 .faright .link a').hide();
                            }
                            $('#stp1 .faright .view a').attr('href', path+'materials/view/'+this.id);
                            $('#stp1 .faright .view a').show();
                            });
                        
                    });
                }
            });
    } else { $.fn.fClearInner( $('#stp1') ); $.fn.fClear(2, 9); $('#stp1 .center .info').html('Elija el tipo de material base que soldará de acuerdo a las siguientes opciones.'); }
}
   

$("#calibres").change(function() {
    flag = 0;
    $("#calibres").fCalibres();
});
$.fn.fCalibres = function() {   
    if($('#calibres option:selected').val() != "") {
       $('#stp2 .left .loader').show();
       /*
            $.ajax({
                url: path+'tigs/selectorStep3',
                data: {'id' : $('#calibres option:selected').val(),
                'matid' : $('#materials option:selected').val()},
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('#stp2 .left .loader').fadeOut(200, function () {
                        $('#stp2 .right .title').html($('#calibres option:selected').text());
                        $("#gases").removeOption(/./);
                        $.fn.fClear(3, 9);
                        for(i = 0; i < data.length; i++) {
                            $.each(data[i], function() {
                                if(data.length != 1) {
                                    $("#gases").addOption(this.id, this.name+' ('+this.ccalidad.Calidadgase.name+')', false);
                                } else {
                                    $("#gases").addOption(this.id, this.name+' ('+this.ccalidad.Calidadgase.name+')');
                                    $("#gases").fGases();
                                }
                            });
                            $("#gases").focus();
                        }
                        
                    });
                }
            }); 
        */
            $.ajax({
                url: path+'tigs/selectorStep31',
                data: {'id' : $('#calibres option:selected').val(),
                'matid' : $('#materials option:selected').val()},
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('#stp2 .left .loader').fadeOut(200, function () {
                        $('#stp2 .right .title').html($('#calibres option:selected').text());
                        $("#ccalidades").removeOption(/./);
                        $.fn.fClear(3, 9);
                        for(i = 0; i < data.length; i++) {
                            $.each(data[i], function() {
                                if(data.length != 1) {
                                    $("#ccalidades").addOption(this.id, this.name, false);
                                } else {
                                    $("#ccalidades").addOption(this.id, this.name);
                                    $("#ccalidades").fCcalidades();
                                }
                            });
                            $("#ccalidades").focus();
                        }
                        
                    });
                }
            }); 
            
            /*
            RANGO DE AMPERAJE
            */
            $('div#amperaje').remove();
            var ax_amp = $.ajax({
                    url: path+'tigs/rangoamperaje',
                    data: {'matid' : $('#materials option:selected').val(),
                        'calibreid' : $('#calibres option:selected').val()
                        },
                    type: 'POST',
                    dataType: 'json',
                    success: function (data) {
                        $('div#stp2 div.right').append('<div id="amperaje"><b>Rango de Amperaje recomendado</b>:<br />'+data['Amperaje']['name']+'</div>');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("AJAX - error() "+ textStatus);
                        ax_amp.abort();
                        flag = flag + 1;
                        if(flag < 5) {
                            $.fn.fCalibres();
                        } else {
                            $('#calibres option[value=""]').attr('selected', '');
                            $('#stp2 .left .loader').fadeOut(200);
                            $('#stp2 .right .loader').fadeOut(200);
                            $('#stp2 .center .info').html('<font style="color:red;">La aplicación se demoró en mostrar los resultados. Por favor intente de nuevo su selección. Si el problema persiste, contáctenos.</font>');
                        }
                    }
            }); 
            /*
            RANGO DE AMPERAJE
            */
            
            $('#stp2 .right .image').html('');
            $('#stp2 .right .loader').show();
            $.ajax({
                url: path+'tigs/interStep3',
                data: {'id' : $('#calibres option:selected').val()},
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('#stp2 .right .loader').fadeOut(200, function () {
                        $.each(data, function() {
                            $('#stp2 .center .info').html(this.description);
                            if(this.smallimage != null) {
                                $('#stp2 .right .image').html('<img src="'+this.smallimage+'" />');
                            } else {
                                $('#stp2 .right .image').html('<img src="'+path+'img/calibres/default.png" />');
                            }
                            
                            if(this.infra_link != "") {
                                $('#stp2 .faright .link a').attr('href', this.infra_link);
                                $('#stp2 .faright .link a').fadeIn();
                            } else {
                                $('#stp2 .faright .link a').hide();
                            }
                            
                            });
                        
                    });
                }
            });
            
    } else { $.fn.fClearInner( $('#stp2') ); $.fn.fClear(3, 9); $('#stp2 .center .info').html('Elija el calibre o espesor aproximado del material base que soldará de acuerdo a las siguientes opciones.'); }
}



$("#ccalidades").change(function() {
    flag = 0;
    $("#ccalidades").fCcalidades();
});
$.fn.fCcalidades = function() {   
    if($('#ccalidades option:selected').val() != "") {
       $('#stp21 .left .loader').show();
       
            $.ajax({
                url: path+'tigs/selectorStep3',
                data: {'id' : $('#calibres option:selected').val(),
                'matid' : $('#materials option:selected').val()},
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('#stp2 .left .loader').fadeOut(200, function () {
                        $('#stp2 .right .title').html($('#calibres option:selected').text());
                        $("#gases").removeOption(/./);
                        $.fn.fClear(3, 9);
                        for(i = 0; i < data.length; i++) {
                            $.each(data[i], function() {
                                if(data.length != 1) {
                                    $("#gases").addOption(this.id, this.name+' ('+this.ccalidad.Calidadgase.name+')', false);
                                } else {
                                    $("#gases").addOption(this.id, this.name+' ('+this.ccalidad.Calidadgase.name+')');
                                    $("#gases").fGases();
                                }
                            });
                            $("#gases").focus();
                        }
                        
                    });
                }
            }); 
        
            
            $('#stp21 .right .image').html('');
            $('#stp21 .right .loader').show();
            $.ajax({
                url: path+'tigs/interStep31',
                data: {'id' : $('#ccalidades option:selected').val()},
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('#stp21 .right .loader').fadeOut(200, function () {
                        $.each(data, function() {
                            $('#stp21 .center .info').html(this.description);
                            if(this.smallimage != null) {
                                $('#stp21 .right .image').html('<img src="'+this.smallimage+'" />');
                            } else {
                                $('#stp21 .right .image').html('<img src="'+path+'img/ccalidades/default.png" />');
                            }
                            
                            if(this.infra_link != "") {
                                $('#stp21 .faright .link a').attr('href', this.infra_link);
                                $('#stp21 .faright .link a').fadeIn();
                            } else {
                                $('#stp21 .faright .link a').hide();
                            }
                            
                            });
                        
                    });
                }
            });
            
    } else { $.fn.fClearInner( $('#stp2') ); $.fn.fClear(3, 9); $('#stp2 .center .info').html('Elija el calibre o espesor aproximado del material base que soldará de acuerdo a las siguientes opciones.'); }
}



$("#gases").change(function() {
    flag = 0;
    $("#gases").fGases();
});   
$.fn.fGases = function() {
    if($('#gases option:selected').val() != "") {
       $('#stp3 .left .loader').show();
            $.ajax({
                url: path+'tigs/selectorStep4',
                data: {'id' : $('#gases option:selected').val(),
                    'calibreid' : $('#calibres option:selected').val(),
                    'matid' : $('#materials option:selected').val()
                    },
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('#stp3 .left .loader').fadeOut(200, function () {
                        //$('#stp3 .right .title').html($('#gases option:selected').text());
                        //$("#maquinas").removeOption(/./);
                        $("#maquinas").empty();
                        $.fn.fClear(4, 9);
                        $("<option value=''></option>").prependTo( $("#maquinas") );
                        var ciclo1 = 0;
                        var ciclo2 = 0;
                        var ciclo3 = 0;
                        
                        $("#maquinas").append('<optgroup label="Trabajo Industrial Ligero" id="3">');
                        $("#maquinas").append('<optgroup label="Trabajo Industrial" id="2">');
                        $("#maquinas").append('<optgroup label="Trabajo Industrial Pesado" id="1">');
                        for(i = 0; i < data.length; i++) {
                            $.each(data[i], function() {
                                /*
                                if(this.ciclomaquina_id == 3 && ciclo3 == 0) {
                                    $("#maquinas").append('<optgroup label="'+this.Cicloname+'" id="3">');
                                    ciclo3 = 1;
                                }
                                if(this.ciclomaquina_id == 2 && ciclo2 == 0) {
                                    $("#maquinas").append('<optgroup label="'+this.Cicloname+'" id="2">');
                                    ciclo2 = 1;
                                }
                                if(this.ciclomaquina_id == 1 && ciclo1 == 0) {
                                    $("#maquinas").append('<optgroup label="'+this.Cicloname+'" id="1">');
                                    ciclo1 = 1;
                                }
                                */
                                
                                if(data.length != 1) {
                                    $("#maquinas").addOption(this.mid, this.name+' '+this.short, false);
                                    $("#maquinas option[value='"+this.mid+"']").appendTo( $("#maquinas optgroup[id='"+this.ciclomaquina_id+"']") );
                                } else {
                                    $("#maquinas").addOption(this.mid, this.name+' '+this.short);
                                    $("#maquinas option[value='"+this.mid+"']").appendTo( $("#maquinas optgroup[id='"+this.ciclomaquina_id+"']") );
                                    $("#maquinas").fMaquinas();
                                }

                            });
                            $("#maquinas").focus();
                        }
                        
                    });
                }
            }); 
            
            /*
            CONDICION DE CALIDAD
            */
            $('div#ccalidad').remove();
            var ax_gas2 = $.ajax({
                    url: path+'tigs/ccalidad',
                    data: {'gasid' : $('#gases option:selected').val(),
                        'calibreid' : $('#calibres option:selected').val(),
                        'matid' : $('#materials option:selected').val()
                        },
                    type: 'POST',
                    dataType: 'json',
                    success: function (data) {
                        $('div#stp3 div.right').append('<div id="ccalidad"><b>Condición de Calidad</b>:<br />'+data['Calidadgase']['name']+'</div>');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("AJAX - error() "+ textStatus);
                        ax_gas2.abort();
                        flag = flag + 1;
                        if(flag < 5) {
                            $.fn.fGases();
                        } else {
                            $('#gases option[value=""]').attr('selected', '');
                            $('#stp3 .left .loader').fadeOut(200);
                            $('#stp3 .right .loader').fadeOut(200);
                            $('#stp3 .center .info').html('<font style="color:red;">La aplicación se demoró en mostrar los resultados. Por favor intente de nuevo su selección. Si el problema persiste, contáctenos.</font>');
                        }
                    }
            }); 
            /*
            CONDICION DE CALIDAD
            */
            $('#stp3 .right .image').html('');
            $('#stp3 .right .loader').show();
            $.ajax({
                url: path+'tigs/interStep4',
                data: {'id' : $('#gases option:selected').val()},
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('#stp3 .right .loader').fadeOut(200, function () {
                        $.each(data, function() {
                            $('#stp3 .right .title').html(this.name);
                            $('#stp3 .center .info').html(this.description);
                            if(this.smallimage != null) {
                                $('#stp3 .right .image').html('<img src="'+this.smallimage+'" />');
                            } else {
                                $('#stp3 .right .image').html('<img src="'+path+'img/gases/default.png" />');
                            }
                            
                            if(this.infra_link != "") {
                                $('#stp3 .faright .link a').attr('href', this.infra_link);
                                $('#stp3 .faright .link a').fadeIn();
                            } else {
                                $('#stp3 .faright .link a').hide();
                            }
                            $('#stp3 .faright .view a').attr('href', path+'gases/view/'+this.id);
                            $('#stp3 .faright .view a').show();
                            });
                        
                    });
                }
            }); 
    } else { $.fn.fClearInner( $('#stp3') ); $.fn.fClear(4, 9); $('#stp3 .center .info').html('Elija la mezcla de gases ideal para sus procesos de acuerdo a las siguientes opciones. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.'); }
}
   
   
$("#maquinas").change(function() {
    flag = 0;
    $("#maquinas").fMaquinas();
});   
$.fn.fMaquinas = function() {
    if($('#maquinas option:selected').val() != "") {
       $('#stp4 .left .loader').show();
            $.ajax({
                url: path+'tigs/selectorStep5',
                data: {'id' : $('#maquinas option:selected').val(),
                'gasid' : $('#gases option:selected').val(),
                'calibreid' : $('#calibres option:selected').val(),
                'matid' : $('#materials option:selected').val()},
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('#stp4 .left .loader').fadeOut(200, function () {
                        //$('#stp4 .right .title').html($('#maquinas option:selected').text());
                        $("#antorchas").removeOption(/./);
                        $.fn.fClear(5, 9);
                        for(i = 0; i < data.length; i++) {
                            $.each(data[i], function() {
                                if(data.length != 1) {
                                    $("#antorchas").addOption(this.id, this.name, false);
                                } else {
                                    $("#antorchas").addOption(this.id, this.name);
                                    $("#antorchas").fAntorchas();
                                }
                            });
                            $("#antorchas").focus();
                        }
                        
                    });
                }
            }); 
            $('#stp4 .right .image').html('');
            $('#stp4 .right .loader').show();
            $.ajax({
                url: path+'tigs/interStep5',
                data: {'id' : $('#maquinas option:selected').val()},
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('#stp4 .right .loader').fadeOut(200, function () {
                        $.each(data, function() {
                            $('#stp4 .right .title').html(this.name);
                            $('#stp4 .center .info').html(this.description);
                            if(this.smallimage != null) {
                                $('#stp4 .right .image').html('<img src="'+this.smallimage+'" />');
                            } else {
                                $('#stp4 .right .image').html('<img src="'+path+'img/maquinas/default.png" />');
                            }
                            
                            if(this.infra_link != "") {
                                $('#stp4 .faright .link a').attr('href', this.infra_link);
                                $('#stp4 .faright .link a').fadeIn();
                            } else {
                                $('#stp4 .faright .link a').hide();
                            }
                            $('#stp4 .faright .view a').attr('href', path+'maquinas/view/'+this.id);
                            $('#stp4 .faright .view a').show();
                            
                            });
                        
                    });
                }
            }); 
    } else { $.fn.fClearInner( $('#stp4') ); $.fn.fClear(5, 9);$('#stp4 .center .info').html('Elija en las siguientes opciones una máquina para soldar de acuerdo al voltaje de alimentación, especificaciones técnicas y tipo de trabajo que desempeñará. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.'); }
} 
 
 
 
   
$("#antorchas").change(function() {
    flag = 0;
    $("#antorchas").fAntorchas();
});   
$.fn.fAntorchas = function() {
    if($('#antorchas option:selected').val() != "") {
       $('#stp5 .left .loader').show();
            $.ajax({
                url: path+'tigs/selectorStep6',
                data: {'id' : $('#antorchas option:selected').val(),
                'maqid' : $('#maquinas option:selected').val(),
                'gasid' : $('#gases option:selected').val(),
                'calibreid' : $('#calibres option:selected').val(),
                'matid' : $('#materials option:selected').val()},
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('#stp5 .left .loader').fadeOut(200, function () {
                        $.fn.fClear(6, 9);
                        $('#stp5 .right .title').html($('#antorchas option:selected').text());
                        $("#aportes").removeOption(/./);
                        for(i = 0; i < data.length; i++) {
                            $.each(data[i], function() {
                                if(data.length != 1) {
                                    $("#aportes").addOption(this.id, this.name, false);
                                } else {
                                    $("#aportes").addOption(this.id, this.name);
                                    $("#aportes").fAportes();
                                }
                            });
                            $("#aportes").focus();
                        }
                        
                    });
                }
            }); 
            
            /*
            ACCESORIO
            */
            $('div#accesorio').remove();
            var ax_amp = $.ajax({
                    url: path+'tigs/accesorio',
                    data: {'matid' : $('#materials option:selected').val(),
                        'calibreid' : $('#calibres option:selected').val()
                        },
                    type: 'POST',
                    dataType: 'json',
                    success: function (data) {
                        $('div#stp5 div.right').append('<div id="accesorio"><b>Accesorios necesarios para ensamble de la antorcha</b>:<br /><b>&bull; Cerámica</b>: '+data['Accesorio']['ceramica']+'<br /><b>&bull; Porta Mordaza</b>:'+data['Accesorio']['portamordaza']+'<br /><b>&bull; Mordaza</b>: '+data['Accesorio']['mordaza']+'<br /><b>&bull; Tapa</b>: '+data['Accesorio']['tapa']+'<br /><b>&bull; Tungsteno</b>: '+data['Accesorio']['tungsteno']+'</div>');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("AJAX - error() "+ textStatus);
                        ax_amp.abort();
                        flag = flag + 1;
                        if(flag < 5) {
                            $.fn.fAntorchas();
                        } else {
                            $('#antorchas option[value=""]').attr('selected', '');
                            $('#stp5 .left .loader').fadeOut(200);
                            $('#stp5 .right .loader').fadeOut(200);
                            $('#stp5 .center .info').html('<font style="color:red;">La aplicación se demoró en mostrar los resultados. Por favor intente de nuevo su selección. Si el problema persiste, contáctenos.</font>');
                        }
                    }
            }); 
            /*
            ACCESORIO
            */
            
            $('#stp5 .right .image').html('');
            $('#stp5 .right .loader').show();
            $.ajax({
                url: path+'tigs/interStep6',
                data: {'id' : $('#antorchas option:selected').val()},
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('#stp5 .right .loader').fadeOut(200, function () {
                        $.each(data, function() {
                            $('#stp5 .center .info').html(this.description);
                            if(this.smallimage != null) {
                                $('#stp5 .right .image').html('<img src="'+this.smallimage+'" />');
                            } else {
                                $('#stp5 .right .image').html('<img src="'+path+'img/antorchas/default.png" />');
                            }
                            });
                        
                    });
                }
            }); 
    } else { $.fn.fClearInner( $('#stp5') ); $.fn.fClear(6, 9); $('#stp5 .center .info').html('Elija el tipo de antorcha que mejor se adapte a la maquina para soldar seleccionada y a sus procesos de soldadura. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.'); }
}


$("#tungstenos").change(function() {
    flag = 0;
    $("#tungstenos").fAntorchas();
});   
$.fn.fTungstenos = function() {
    if($('#tungstenos option:selected').val() != "") {
       $('#stp5 .left .loader').show();
            $.ajax({
                url: path+'tigs/selectorStep61',
                data: {'id' : $('#tungstenos option:selected').val(),
                'maqid' : $('#maquinas option:selected').val(),
                'gasid' : $('#gases option:selected').val(),
                'calibreid' : $('#calibres option:selected').val(),
                'matid' : $('#materials option:selected').val()},
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('#stp5 .left .loader').fadeOut(200, function () {
                        $.fn.fClear(6, 9);
                        $('#stp5 .right .title').html($('#tungstenos option:selected').text());
                        $("#aportes").removeOption(/./);
                        for(i = 0; i < data.length; i++) {
                            $.each(data[i], function() {
                                if(data.length != 1) {
                                    $("#aportes").addOption(this.id, this.name, false);
                                } else {
                                    $("#aportes").addOption(this.id, this.name);
                                    $("#aportes").fAportes();
                                }
                            });
                            $("#aportes").focus();
                        }
                        
                    });
                }
            }); 
            
            
            $('#stp5 .right .image').html('');
            $('#stp5 .right .loader').show();
            $.ajax({
                url: path+'tigs/interStep61',
                data: {'id' : $('#tungstenos option:selected').val()},
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('#stp5 .right .loader').fadeOut(200, function () {
                        $.each(data, function() {
                            $('#stp5 .center .info').html(this.description);
                            if(this.smallimage != null) {
                                $('#stp5 .right .image').html('<img src="'+this.smallimage+'" />');
                            } else {
                                $('#stp5 .right .image').html('<img src="'+path+'img/tungstenos/default.png" />');
                            }
                            });
                        
                    });
                }
            }); 
    } else { $.fn.fClearInner( $('#stp5') ); $.fn.fClear(6, 9); $('#stp5 .center .info').html('Elija el tipo de antorcha que mejor se adapte a la maquina para soldar seleccionada y a sus procesos de soldadura. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.'); }
}

   
$("#aportes").change(function() {
    flag = 0;
    $("#aportes").fAportes();
});   
$.fn.fAportes = function() {
    if($('#aportes option:selected').val() != "") {
       $('#stp6 .left .loader').show();
            $.ajax({
                url: path+'tigs/selectorStep7',
                data: {'id' : $('#aportes option:selected').val(),
                'antid' : $('#antorchas option:selected').val(),
                'maqid' : $('#maquinas option:selected').val(),
                'gasid' : $('#gases option:selected').val(),
                'calibreid' : $('#calibres option:selected').val(),
                'matid' : $('#materials option:selected').val()},
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('#stp6 .left .loader').fadeOut(200, function () {
                        $.fn.fClear(7, 9);
                        $('#stp6 .right .title').html($('#aportes option:selected').text());
                        $("#reguladores").removeOption(/./);
                        for(i = 0; i < data.length; i++) {
                            $.each(data[i], function() {
                                if(data.length != 1) {
                                    $("#reguladores").addOption(this.id, this.name, false);
                                } else {
                                    $("#reguladores").addOption(this.id, this.name);
                                    $("#reguladores").fReguladores();
                                }
                            });
                            $("#reguladores").focus();
                        }
                        
                    });
                }
            });
            $('#stp6 .right .image').html('');
            $('#stp6 .right .loader').show();
            $.ajax({
                url: path+'tigs/interStep7',
                data: {'id' : $('#aportes option:selected').val()},
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('#stp6 .right .loader').fadeOut(200, function () {
                        $.each(data, function() {
                            $('#stp6 .center .info').html(this.description);
                            if(this.smallimage != null) {
                                $('#stp6 .right .image').html('<img src="'+this.smallimage+'" />');
                            } else {
                                $('#stp6 .right .image').html('<img src="'+path+'blank.png" />');
                            }
                            });
                        
                    });
                }
            });     
    } else { $.fn.fClearInner( $('#stp6') ); $.fn.fClear(7, 9); $('#stp6 .center .info').html('Elija el material de aporte que requiere para sus procesos de soldadura de acuerdo a los diámetros recomendados. El sistema puede darle una sola opción por default de acuerdo a sus necesidades.'); }
}
   
   
$("#reguladores").change(function() {
    flag = 0;
    $("#reguladores").fReguladores();
});   
$.fn.fReguladores = function() {
    if($('#reguladores option:selected').val() != "") {
       $('#stp7 .left .loader').show();
            $.ajax({
                url: path+'tigs/selectorStep8',
                data: {'id' : $('#reguladores option:selected').val(),
                'antoid' : $('#antorchas option:selected').val(),
                'apoid' : $('#aportes option:selected').val(),
                'maqid' : $('#maquinas option:selected').val(),
                'gasid' : $('#gases option:selected').val(),
                'calibreid' : $('#calibres option:selected').val(),
                'matid' : $('#materials option:selected').val()},
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('#tab_alt1').empty();
                    $('#stp7 .left .loader').fadeOut(200, function () {
                        //$.fn.fClear(8, 9);
                        $('#stp7 .right .title').html($('#reguladores option:selected').text());
                        for(i = 0; i < data.length; i++) {
                            $.each(data[i], function() {
                                if(this.name != "N/A") {
                                    $('#tab_alt1').append("<div class='objclear'><div class='tabobj'><div class='divimg'><img src='"+path+this.smallimage+"' class='imgobj' /></div><span><b>"+this.name+"</b></span><span><a href='#' id='aver"+this.id+"'>+ Ver descripción</a></span><span><input type='checkbox' name='alts"+this.id+"' id='alts"+this.id+"' class='alt' /> Agregar a la selección</span><span>"+this.shortdescription+"</span></div><div class='objclear'></div></div>");
                                    $('#holdalt').append("<div id='altdescription"+this.id+"'><img src='"+path+this.smallimage+"' />"+this.description+"</div>");
                                    $('a#aver'+this.id).colorbox({inline: true, href:"#altdescription"+this.id, maxWidth: "500px"});
                                } else {
                                    $('#tab_alt1').append('No existen equipos alternativos para esta seleccion');
                                }
                                
                            });
                        }
                        $("#tab_alternativos").tabs();
                    });
                }
            }); 
            $('#stp7 .right .image').html('');
            $('#stp7 .right .loader').show();
            $.ajax({
                url: path+'tigs/interStep8',
                data: {'id' : $('#reguladores option:selected').val()},
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('#stp7 .right .loader').fadeOut(200, function () {
                        $.each(data, function() {
                            $('#stp7 .center .info').html(this.description);
                            $('#stp7 .right .image').html('<img src="'+this.smallimage+'" />');
                            });
                        $.fn.fAlternativos();
                    });
                }
            }); 
    } else { $.fn.fClearInner( $('#stp7') ); $.fn.fClear(8, 9); $('#stp7 .center .info').html('Elija el regulador de presión que requiere el cilindro del gas de protección seleccionado.El sistema puede darle una sola opción por default de acuerdo a sus necesidades.'); }
}
   
     
$.fn.fAlternativos = function() {

            $.ajax({
                url: path+'tigs/seccions',
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                        $('#tabs ul').empty();
                        $('#tabs div').remove();
                        $('#stp8 .right .title').html($('#alternativos option:selected').text());
                        for(i = 0; i < data.length; i++) {
                            $.each(data[i], function() {
                                j = i + 1;
                                $('#tabs').find('ul').append('<li><a href="'+path+'seccions/getTig/'+this.id+'">'+this.name+'</a></li>');
                                //$('#slider').append('<img src="'+path+this.image+'" rel="'+path+this.smallimage+'" title="'+this.name+'" />');
                            });
                        }
                            $('#tabs').tabs({
                                ajaxOptions: {
                                    success: function() {
                                        
                                    },
                                    error: function( xhr, status, index, anchor ) {
                                        $(anchor.hash).html("No se pudo cargar esta pestaña. Estamos mejorando para Usted.");
                                    },
                                    type: 'POST'
                                },
                                cache: true
                            });
                }
            }); 

            
            $('div#submit').removeClass('ntrdy');
            $('div#submit').addClass('rdyred'); 

}


$('div#submit').click(function () {
    valid = $.fn.fNext();
    if(valid == true) {
        var protect = "";
        $('input[type=checkbox][class=pro]').each(function() {
            if( $(this).attr('checked') == "checked" ) {
                if(protect == "") { protect = "/prot/"; }
                protect = protect+$(this).attr('id')+"-";
            }
        });
        
        var alterns = "/alt/-";
        $('input[type=checkbox][class=alt]').each(function() {
            if( $(this).attr('checked') == "checked" ) {
                if(alterns == "/alt/-") { alterns = "/alt/"; }
                alterns = alterns+$(this).attr('id')+"-";
            }
        });
        
        var cadena = "/mat/"+$('#materials option:selected').val()+"/cal/"+$('#calibres option:selected').val()+"/gas/"+$('#gases option:selected').val()+"/maq/"+$('#maquinas option:selected').val()+"/ant/"+$('#antorchas option:selected').val()+"/apo/"+$('#aportes option:selected').val()+"/reg/"+$('#reguladores option:selected').val()+alterns+protect;
        document.location.href= path+'tig/step2'+cadena;
    } else {
        $.growlUI('Aviso', '<?= "<div class=\"flash_success\">Escoja las opciones faltantes para poder continuar.</div>"; ?>', 3000, '', 1); 
    }
});
   
   
$('.cc1').mouseover(function(e) {
    e.preventDefault();
    $('.cc1_info').remove();
    $(this).append('<div class="cc1_info">Estos productos son adecuados para el uso en talleres de herrería, hojalatería, para el hogar, trabajos de hobby y para usuarios ocasionales. Están diseñados para ser fáciles de operar y típicamente tienen un ciclo de trabajo hasta del 40% con una salida de corriente de 250 Amperes o menos.</div>');
    $('div.cc1_info').animate({
        width: '474',
        height: '80',
        top: '0'
        }, 200);
}).mouseout(function() {
    $('.cc1_info').remove();
});

$('.cc2').mouseover(function(e) {
    e.preventDefault();
    $('.cc2_info').remove();
    $(this).append('<div class="cc2_info">Estos productos son adecuados para aplicaciones industriales pero que no requieren altos volúmenes de producción y típicamente tienen un ciclo de trabajo del 30% al 60% con una salida de corriente de 300 Amperes o menos.</div>');
    $('div.cc2_info').animate({
        width: '474',
        height: '60',
        top: '0'
        }, 200);
}).mouseout(function() {
    $('.cc2_info').remove();
});


$('.cc3').mouseover(function(e) {
    e.preventDefault();
    $('.cc3_info').remove();
    $(this).append('<div class="cc3_info">Estos productos son adecuados para aplicaciones industriales de altos volúmenes de producción y/o trabajos en materiales de grandes espesores. Típicamente tienen un ciclo de trabajo del 60% al 100% con una corriente de salida de por lo menos 300 Amperes, y están diseñados con las características de arco y construcción que demandan los soldadores profesionales.</div>');
    $('div.cc3_info').animate({
        width: '474',
        height: '100',
        top: '0'
        }, 200);
}).mouseout(function() {
    $('.cc3_info').remove();
});
   

   
});

-->
</script>   
