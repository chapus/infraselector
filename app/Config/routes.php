<?php
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

	Router::connect('/administracion/*', array('controller' => 'users', 'action' => 'admin'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
	
	Router::connect('/catalogo', array('controller' => 'fullitems', 'action' => 'catalogo'));
	Router::connect('/informacion/*', array('controller' => 'pages', 'action' => 'display', 'informacion'));
	
	Router::connect('/proceso-mig/*', array('controller' => 'pages', 'action' => 'display', 'mig'));
	Router::connect('/proceso-tig/*', array('controller' => 'pages', 'action' => 'display', 'tig'));
	Router::connect('/proceso-smaw/*', array('controller' => 'pages', 'action' => 'display', 'smaw'));
	Router::connect('/proceso-pac/*', array('controller' => 'pages', 'action' => 'display', 'pac'));
	
	Router::connect('/solicitudenviada/*', array('controller' => 'pages', 'action' => 'display', 'sent'));
	
	Router::connect('/login/*', array('controller' => 'users', 'action' => 'login'), array('pass' => array('url')));
	
	Router::connect('/materialesasoldar/*', array('controller' => 'materials', 'action' => 'view'));
	
	
	Router::connect('/mig/*', array('controller' => 'migs', 'action' => 'selector2'));
	Router::connect('/tig/*', array('controller' => 'tigs', 'action' => 'selector2'));
	Router::connect('/smaw/*', array('controller' => 'smaws', 'action' => 'selector2'));
	Router::connect('/pac/*', array('controller' => 'pacs', 'action' => 'selector2'));
	
	Router::connect('/pdf/mig/*', array('controller' => 'migs', 'action' => 'steppdf'));
	Router::connect('/pdf/tig/*', array('controller' => 'tigs', 'action' => 'steppdf'));
	Router::connect('/pdf/smaw/*', array('controller' => 'smaws', 'action' => 'steppdf'));
	Router::connect('/pdf/pac/*', array('controller' => 'pacs', 'action' => 'steppdf'));
	
	
	Router::connect('/calibresdelamina/*', array('controller' => 'calibres', 'action' => 'view'));
	Router::connect('/catalogo/materiales', array('controller' => 'materials', 'action' => 'index'));
	
	Router::connect('/gasesdeproteccion/*', array('controller' => 'gases', 'action' => 'view'));
	Router::connect('/catalogo/gasesdeproteccion', array('controller' => 'gases', 'action' => 'index'));
	
	Router::connect('/materialesdeaporte/*', array('controller' => 'aportes', 'action' => 'view'));
	Router::connect('/catalogo/materialesdeaporte', array('controller' => 'aportes', 'action' => 'index'));
	
	Router::connect('/portaelectrodo/*', array('controller' => 'portaelectrodos', 'action' => 'view'));
	Router::connect('/catalogo/portaelectrodos', array('controller' => 'portaelectrodos', 'action' => 'index'));
	
	Router::connect('/juegosdepas/*', array('controller' => 'juegopas', 'action' => 'view'));
	Router::connect('/catalogo/juegodepas', array('controller' => 'juegopas', 'action' => 'index'));
	
	Router::connect('/maquinasdesoldar/*', array('controller' => 'maquinas', 'action' => 'view'));
	Router::connect('/catalogo/maquinasdesoldar', array('controller' => 'maquinas', 'action' => 'index'));
	
	Router::connect('/alimentadores/*', array('controller' => 'microalambres', 'action' => 'view'));
	Router::connect('/catalogo/alimentadores', array('controller' => 'microalambres', 'action' => 'index'));
	
	
	Router::connect('/lasantorchas/*', array('controller' => 'antorchas', 'action' => 'view'));
	Router::connect('/catalogo/lasantorchas', array('controller' => 'antorchas', 'action' => 'index'));
	
	Router::connect('/reguladoresdepresion/*', array('controller' => 'reguladors', 'action' => 'view'));
	Router::connect('/catalogo/reguladoresdepresion', array('controller' => 'reguladors', 'action' => 'index'));
	
	Router::connect('/equipoalternativos/*', array('controller' => 'alternativos', 'action' => 'view'));
	Router::connect('/catalogo/equipoalternativos', array('controller' => 'alternativos', 'action' => 'index'));
	
	Router::connect('/articulosdeproteccion/*', array('controller' => 'protecciones', 'action' => 'view'));
	Router::connect('/catalogo/articulosdeproteccion', array('controller' => 'protecciones', 'action' => 'index'));
	
	Router::connect('/seccions/get/:id', array('controller' => 'seccions', 'action' => 'get'), array('pass' => array('id')));
	
	
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
