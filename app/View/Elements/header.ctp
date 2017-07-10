<?php

?>
<script type="text/javascript">
jQuery(document).ready(function(){
	
	var path = "<?php echo $this->webroot; ?>";
	var cache = [];
  // Arguments are image paths relative to the current page.
  $.preLoadImages = function() {
    var args_len = arguments.length;
    for (var i = args_len; i--;) {
      var cacheImage = document.createElement('img');
      cacheImage.src = arguments[i];
      cache.push(cacheImage);
    }
  }

var BrowserDetect = {
	init: function () {
		this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
		this.version = this.searchVersion(navigator.userAgent)
			|| this.searchVersion(navigator.appVersion)
			|| "an unknown version";
		this.OS = this.searchString(this.dataOS) || "an unknown OS";
	},
	searchString: function (data) {
		for (var i=0;i<data.length;i++)	{
			var dataString = data[i].string;
			var dataProp = data[i].prop;
			this.versionSearchString = data[i].versionSearch || data[i].identity;
			if (dataString) {
				if (dataString.indexOf(data[i].subString) != -1)
					return data[i].identity;
			}
			else if (dataProp)
				return data[i].identity;
		}
	},
	searchVersion: function (dataString) {
		var index = dataString.indexOf(this.versionSearchString);
		if (index == -1) return;
		return parseFloat(dataString.substring(index+this.versionSearchString.length+1));
	},
	dataBrowser: [
		{
			string: navigator.userAgent,
			subString: "Chrome",
			identity: "Chrome"
		},
		{ 	string: navigator.userAgent,
			subString: "OmniWeb",
			versionSearch: "OmniWeb/",
			identity: "OmniWeb"
		},
		{
			string: navigator.vendor,
			subString: "Apple",
			identity: "Safari",
			versionSearch: "Version"
		},
		{
			prop: window.opera,
			identity: "Opera"
		},
		{
			string: navigator.vendor,
			subString: "iCab",
			identity: "iCab"
		},
		{
			string: navigator.vendor,
			subString: "KDE",
			identity: "Konqueror"
		},
		{
			string: navigator.userAgent,
			subString: "Firefox",
			identity: "Firefox"
		},
		{
			string: navigator.vendor,
			subString: "Camino",
			identity: "Camino"
		},
		{		// for newer Netscapes (6+)
			string: navigator.userAgent,
			subString: "Netscape",
			identity: "Netscape"
		},
		{
			string: navigator.userAgent,
			subString: "MSIE",
			identity: "Explorer",
			versionSearch: "MSIE"
		},
		{
			string: navigator.userAgent,
			subString: "Gecko",
			identity: "Mozilla",
			versionSearch: "rv"
		},
		{ 		// for older Netscapes (4-)
			string: navigator.userAgent,
			subString: "Mozilla",
			identity: "Netscape",
			versionSearch: "Mozilla"
		}
	],
	dataOS : [
		{
			string: navigator.platform,
			subString: "Win",
			identity: "Windows"
		},
		{
			string: navigator.platform,
			subString: "Mac",
			identity: "Mac"
		},
		{
			   string: navigator.userAgent,
			   subString: "iPhone",
			   identity: "iPhone/iPod"
	    },
		{
			string: navigator.platform,
			subString: "Linux",
			identity: "Linux"
		}
	]

};
BrowserDetect.init();  
	
});

</script>


<div id="top">
    <div id="logo">
        <h1>
        <?php
                echo $this->Html->link(
                $this->Html->image('header/logo.jpg', array('title' => 'Infra', 'alt' => 'INFRA')), '/',
                array('escape' => false),
                null);
        ?></h1>
        <span class="desc"><?= $this->Html->link('Selector de Procesos', '/'); ?></span>
    </div><!-- end #logo -->
    <div class="information"><!-- Para comentarios y/o sugerencias sobre esta herramienta por favor escríbanos al correo: <span class="no-phone"><a href="mailto:rcampos@infra.com.mx">rcampos@infra.com.mx</a></span> --></div>
    <br /> 
    <div class="information"><!-- O comuníquese al teléfono: <span class="no-phone">(55) 5329.3007 con el Ing. Rubí Campos</span> --></div>

    <div class="info">
    <?php
	if(isset($session_info) ) {
		echo "Bienvenido ".$session_info['name']." ".$this->Html->link('Home', '/' )." - ".$this->Html->link('Administración', '/administracion' )." - ".$this->Html->link('Salir', '/logout' );
	}
	?>
    </div>
</div><!-- end #top -->

<div id="topnav">
    <div id="myslidemenu" class="jqueryslidemenu">
    <ul>
        <li><?= $this->Html->link('Inicio', '/' ); ?></li>
        <li><?= $this->Html->link('Proceso MIG', '/proceso-mig', array('escape' => false) ); ?></li>
        <li><?= $this->Html->link('Proceso TIG', '/proceso-tig', array('escape' => false) ); ?></li>
        <li><?= $this->Html->link('Proceso SMAW', '/proceso-smaw', array('escape' => false) ); ?></li>
        <li><?= $this->Html->link('Proceso PAC', '/proceso-pac', array('escape' => false) ); ?></li>
        <li><?= $this->Html->link('   Grupo INFRA', 'http://www.infra.com.mx/', array('escape' => false, 'target' => '_blank') ); ?></li>
    </ul>
    </div>
</div><!-- end #topnav -->
        
