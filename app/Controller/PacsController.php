<?php
class PacsController extends AppController {

	var $name = 'Pacs';
	
	var $components = array('RequestHandler', 'Email');
	
	
	var $uses = array('Pac', 'Material', 'Calibre', 'Gase', 'Maquina', 'Regulador', 'Proteccione', 'Seccion', 'Ciudade');
	
	function s1() {
		$result = array();
		
		$mats = $this->Pac->find('all', array(
			'fields' => array('DISTINCT Pac.material_id'),
			'order' => array('Pac.material_id ASC')
		));
		
		$this->Material->recursive = -1;
		
		foreach($mats as $mat) {
			$hold = $this->Material->find('first', array(
				'conditions' => array('Material.ppac' => 1, 'Material.id' => $mat['Pac']['material_id']),
				'fields' => array('Material.id', 'Material.name'),
				'order' => 'Material.name ASC'
			));
			array_push($result,$hold);
		}
		
		return $result;
		/*
		return $this->Material->find('list', array(
		'conditions' => array('Material.ppac' => 1),
		'fields' => array('Material.id', 'Material.name'),
		'order' => 'Material.name ASC'));
		*/
	}
	
	function s1_info() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
	
				$this->Material->recursive = -1;
				
				$this->Material->Behaviors->attach('Containable');
				
				$result = $this->Material->find('all', array(
				'contain' => array('PacCalibre.name', 'PacCalibre.id'),
				'fields' => array('Material.short', 'Material.description', 'Material.infra_link'),
				'conditions' => array('Material.ppac' => 1, 'Material.id' => $_POST['id']),
				'order' => 'Material.name ASC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	function s2() {
		$this->Calibre->recursive = -1;
		
		return $this->Calibre->find('list', array(
		'conditions' => array('Calibre.ppac' => 1),
		'fields' => array('Calibre.id', 'Calibre.name'),
		'order' => 'Calibre.name ASC'));
	}
	
	function s2_info() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Calibre->recursive = -1;
				
				$this->Calibre->Behaviors->attach('Containable');
				
				$result = $this->Calibre->find('all', array(
				'contain' => array('PacMaquina.name', 'PacMaquina.id'),
				'fields' => array('Calibre.name', 'Calibre.short', 'Calibre.description', 'Calibre.infra_link'),
				'conditions' => array('Calibre.ppac' => 1, 'Calibre.id' => $_POST['id']),
				'order' => 'Calibre.name DESC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	function s3() {
		$this->Maquina->recursive = -1;
		
		return $this->Maquina->find('list', array(
		'conditions' => array('Maquina.ppac' => 1),
		'fields' => array('Maquina.id', 'Maquina.name'),
		'order' => 'Maquina.name ASC'));
	}
	
	function s3_info() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Maquina->recursive = -1;
				
				$this->Maquina->Behaviors->attach('Containable');
				
				$result = $this->Maquina->find('all', array(
				'contain' => array('PacGase.name', 'PacGase.id'),
				'fields' => array('Maquina.name', 'Maquina.short', 'Maquina.description', 'Maquina.infra_link'),
				'conditions' => array('Maquina.ppac' => 1, 'Maquina.id' => $_POST['id']),
				'order' => 'Maquina.name DESC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	
	
	function s4() {
		$this->Gase->recursive = -1;
		
		return $this->Gase->find('list', array(
		'conditions' => array('Gase.ppac' => 1),
		'fields' => array('Gase.id', 'Gase.name'),
		'order' => 'Gase.name ASC'));
	}
	
	function s4_info() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Gase->recursive = -1;
				
				$this->Gase->Behaviors->attach('Containable');
				
				$result = $this->Gase->find('all', array(
				'contain' => array('PacRegulador.name', 'PacRegulador.id'),
				'fields' => array('Gase.short', 'Gase.description', 'Gase.infra_link'),
				'conditions' => array('Gase.ppac' => 1, 'Gase.id' => $_POST['id']),
				'order' => 'Gase.name ASC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	
	
	function s5() {
		$this->Regulador->recursive = -1;
		
		return $this->Regulador->find('list', array(
		'conditions' => array('Regulador.ppac' => 1),
		'fields' => array('Regulador.id', 'Regulador.name'),
		'order' => 'Regulador.name ASC'));
	}
	
	
	/*
	*	SELECTOR FUNCTIONS
	*	SELECTOR FUNCTIONS
	*	SELECTOR FUNCTIONS
	*/
	
	function selectorStep2() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$result = array();
				
				$calibres = $this->Pac->find('all', array(
					'fields' => array('DISTINCT Pac.calibre_id'),
					'conditions' => array('Pac.material_id' => $_POST['id']),
					'order' => array('Pac.calibre_id ASC')
				));
				
				$this->Calibre->recursive = -1;
				
				foreach($calibres as $calibre) {
					$hold = $this->Calibre->find('first', array(
						'conditions' => array('Calibre.ppac' => 1, 'Calibre.id' => $calibre['Pac']['calibre_id']),
						'fields' => array('Calibre.short', 'Calibre.id', 'Calibre.name')
					));
					array_push($result,$hold);
				}
				
				array_multisort(array_values($result), SORT_DESC, array_keys($result), SORT_DESC, $result);
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	function interStep2() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Material->recursive = -1;
				$result = $this->Material->find('first', array(
						'conditions' => array('Material.ppac' => 1, 'Material.id' => $_POST['id']),
						'fields' => array('Material.id', 'Material.name', 'Material.short', 'Material.description', 'Material.smallimage', 'Material.infra_link')
					));
				return(json_encode($result));
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	function selectorStep3() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$result = array();
				
				$maquinas = $this->Pac->find('all', array(
					'fields' => array('DISTINCT Pac.maquina_id'),
					'conditions' => array('Pac.material_id' => $_POST['matid'], 'Pac.calibre_id' => $_POST['id']),
					'order' => array('Pac.maquina_id ASC')
				));
				
				$this->Maquina->recursive = -1;
				
				foreach($maquinas as $maquina) {
					$hold = $this->Maquina->find('first', array(
						'conditions' => array('Maquina.ppac' => 1, 'Maquina.id' => $maquina['Pac']['maquina_id']),
						'fields' => array('Maquina.id', 'Maquina.name', 'Maquina.short')
					));
					array_push($result,$hold);
				}
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	function interStep3() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Calibre->recursive = -1;
				$result = $this->Calibre->find('first', array(
						'conditions' => array('Calibre.ppac' => 1, 'Calibre.id' => $_POST['id']),
						'fields' => array('Calibre.id', 'Calibre.name', 'Calibre.short', 'Calibre.description', 'Calibre.smallimage', 'Calibre.infra_link')
					));
				return(json_encode($result));
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	
	function selectorStep4() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$result = array();
				
				$gases = $this->Pac->find('all', array(
					'fields' => array('DISTINCT Pac.gase_id'),
					'conditions' => array('Pac.material_id' => $_POST['matid'], 'Pac.calibre_id' => $_POST['calibreid'], 'Pac.maquina_id' => $_POST['id']),
					'order' => array('Pac.gase_id ASC')
				));
				
				$this->Gase->recursive = -1;
				
				foreach($gases as $gas) {
					$hold = $this->Gase->find('first', array(
						'conditions' => array('Gase.ppac' => 1, 'Gase.id' => $gas['Pac']['gase_id']),
						'fields' => array('Gase.id', 'Gase.name', 'Gase.short')
					));
					array_push($result,$hold);
				}
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	function interStep4() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Maquina->recursive = -1;
				$result = $this->Maquina->find('first', array(
						'conditions' => array('Maquina.ppac' => 1, 'Maquina.id' => $_POST['id']),
						'fields' => array('Maquina.id', 'Maquina.name', 'Maquina.short', 'Maquina.description', 'Maquina.smallimage', 'Maquina.infra_link')
					));
				return(json_encode($result));
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	
	function selectorStep5() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$result = array();
				
				$reguladores = $this->Pac->find('all', array(
					'fields' => array('DISTINCT Pac.regulador_id'),
					'conditions' => array('Pac.material_id' => $_POST['matid'], 'Pac.calibre_id' => $_POST['calibreid'], 'Pac.maquina_id' => $_POST['maqid'],
					'Pac.gase_id' => $_POST['id']),
					'order' => array('Pac.regulador_id ASC')
				));
				
				$this->Regulador->recursive = -1;
				
				foreach($reguladores as $regulador) {
					$hold = $this->Regulador->find('first', array(
						'conditions' => array('Regulador.ppac' => 1, 'Regulador.id' => $regulador['Pac']['regulador_id']),
						'fields' => array('Regulador.id', 'Regulador.name')
					));
					array_push($result,$hold);
				}
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	function interStep5() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Gase->recursive = -1;
				$result = $this->Gase->find('first', array(
						'conditions' => array('Gase.ppac' => 1, 'Gase.id' => $_POST['id']),
						'fields' => array('Gase.id', 'Gase.name', 'Gase.short', 'Gase.description', 'Gase.smallimage', 'Gase.infra_link')
					));
				return(json_encode($result));
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	
	
	
	
	
	
	
	function selectorStep6() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$result = array();
				
				$this->Proteccione->recursive = 1;
				
				$this->Proteccione->unbindModel( array('belongsTo' => array('Fullitem', 'User') ) );
				
				$result = $this->Proteccione->find('all', array(
					'conditions' => array('Proteccione.ppac' => 1),
					'order' => array('Proteccione.name ASC')
				));
				
				//debug($result);
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	
	
	function interStep6() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Regulador->recursive = -1;
				$result = $this->Regulador->find('first', array(
						'conditions' => array('Regulador.ppac' => 1, 'Regulador.id' => $_POST['id']),
						'fields' => array('Regulador.id', 'Regulador.name', 'Regulador.short', 'Regulador.description', 'Regulador.smallimage', 'Regulador.infra_link')
					));
				return(json_encode($result));
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	
	function seccions() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$result = array();
				$this->Seccion->recursive = -1;
				//$this->Seccion->unbindModel( array('belongsTo' => array('User') ) );
				
				$result = $this->Seccion->find('all', array(
					'order' => array('Seccion.order ASC')
				));
				
				//debug($result);
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
		
	
function diagram() {
	$admin = parent::checkSession($_SERVER['REQUEST_URI']);
	$this->set('title_for_layout','INFRA - PAC Diagramas');
	if($admin['admin'] == 1) {
		
		
		
	}
}


function add() {
	$admin = parent::checkSession($_SERVER['REQUEST_URI']);
	$this->set('title_for_layout','INFRA - PAC Nueva Selección');
	if($admin['admin'] == 1) {
		
		$this->Material->recursive = -1;
		
		$materials = $this->Material->find('list', array(
		'conditions' => array('Material.ppac' => 1),
		'order' => 'Material.name ASC'));
		
		
		$this->set(compact('materials'));
		
	}
}



function saveSelection() {
	$admin = parent::checkSession($_SERVER['REQUEST_URI']);
	if($admin['admin'] == 1) {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$msg = '';
				
					$search = $this->Pac->find('first', array(
						'conditions' => array(
						'material_id' => $_POST['st1'],
						'calibre_id' => $_POST['st2'],
						'maquina_id' => $_POST['st3'],
						'gase_id' => $_POST['st4'],
						'regulador_id' => $_POST['st5']
						)
					));
					
					if(!$search) {
					
						$this->data = array('Pac' => array(
							'material_id' => $_POST['st1'],
							'calibre_id' => $_POST['st2'],
							'maquina_id' => $_POST['st3'],
							'gase_id' => $_POST['st4'],
							'regulador_id' => $_POST['st5'],
							'creator_id' => $admin['iduser'],
						));
						$this->Pac->create();
						if ($this->Pac->save($this->data)) {
							echo 'Se guardo con exito la seleccion nueva.';
						} else {
							echo 'No se pudo guardar la seleccion que escogiste.';
						}
					
					} else {
						echo 'La seleccion ya existe en el selector';
					}
				
			}
		}
	Configure::write('debug', 0);
	exit();	
	}
}


function selector2($step = null, $mat = null, $matid = null, $cal = null, $calid = null, $maq = null, $maqid = null, $gas = null, $gasid = null, $reg = null, $regid = null, $prot = null, $protids = null) {
	
	$valid = $this->Pac->find('first', array(
					'fields' => array('Pac.id'),
					'conditions' => array('Pac.material_id' => $matid, 'Pac.calibre_id' => $calid, 'Pac.maquina_id' => $maqid,
					'Pac.gase_id' => $gasid, 'Pac.regulador_id' => $regid)
					));
	
	if($valid > 0) {
	
		$protecciones = array();
		
		$protids = str_replace('prot', '', $protids);
		$protid = explode('-', $protids);
		
		$this->Proteccione->recursive = -1;
		foreach($protid as $id) {
			if($id >= 1) {
				$hold = $this->Proteccione->find('first', array('conditions' => array('Proteccione.id' => $id) ) );
				array_push($protecciones,$hold);
			}
		}
		
		$this->Material->recursive = -1;				
		$material = $this->Material->find('first', array(
						'conditions' => array('Material.id' => $matid)
					));
					
		$this->Calibre->recursive = -1;				
		$calibre = $this->Calibre->find('first', array(
						'conditions' => array('Calibre.id' => $calid)
					));
					
		$this->Maquina->recursive = -1;				
		$maquina = $this->Maquina->find('first', array(
						'conditions' => array('Maquina.id' => $maqid)
					));
					
		$this->Gase->recursive = -1;				
		$gas = $this->Gase->find('first', array(
						'conditions' => array('Gase.id' => $gasid)
					));
					
		$this->Regulador->recursive = -1;				
		$regulador = $this->Regulador->find('first', array(
						'conditions' => array('Regulador.id' => $regid)
					));
					
		$this->set('title_for_layout','Proceso PAC - '.$maquina['Maquina']['name']);
		
		$ciudades = $this->Ciudade->find('list', array('conditions' => array('Ciudade.hidden' => 0), 'order' => array('Ciudade.name ASC') ) );
		
		$key = array_search("Internacional", $ciudades);
		unset($ciudades[$key]);
		$ciudades[$key] = 'Internacional';
		
		$this->set(compact('material', 'calibre', 'gas', 'maquina', 'regulador', 'protecciones', 'ciudades'));
	
	} else {
		$this->Session->setFlash(__('La selección que buscas no existe. Busca de nuevo.', true), 'flash_failure');
		$this->redirect('/proceso-pac');
	}
}
	

function steppdf($mat = null, $matid = null, $cal = null, $calid = null, $maq = null, $maqid = null, $gas = null, $gasid = null, $reg = null, $regid = null, $prot = null, $protids = null) {
	
	App::import('Vendor', 'tcpdf/mytcpdf');
	
	$valid = $this->Pac->find('first', array(
					'fields' => array('Pac.id'),
					'conditions' => array('Pac.material_id' => $matid, 'Pac.calibre_id' => $calid, 'Pac.gase_id' => $gasid,
					'Pac.maquina_id' => $maqid, 'Pac.regulador_id' => $regid)
					));
	
	if($valid > 0) {
		
		// BUSCA PROTECCIONES
		$protecciones = array();
		
		$protids = str_replace('prot', '', $protids);
		$protid = explode('-', $protids);
		$prots = 'Ninguno';
		
		$this->Proteccione->recursive = -1;
		$i = 0;
		foreach($protid as $id) {
			if($id >= 1) {
				$hold = $this->Proteccione->find('first', array('conditions' => array('Proteccione.id' => $id) ) );
				if($i == 0) { 
					$prots = $hold['Proteccione']['name'].', '; $i++; 
				} else {
					$prots .= $hold['Proteccione']['name'].', ';
				}
				array_push($protecciones,$hold);
			}
		}
		
		$this->Material->recursive = -1;				
		$material = $this->Material->find('first', array(
						'conditions' => array('Material.id' => $matid)
					));
					
		$this->Calibre->recursive = -1;				
		$calibre = $this->Calibre->find('first', array(
						'conditions' => array('Calibre.id' => $calid)
					));
					
		$this->Gase->recursive = -1;				
		$gas = $this->Gase->find('first', array(
						'conditions' => array('Gase.id' => $gasid)
					));
					
		$this->Maquina->recursive = -1;				
		$maquina = $this->Maquina->find('first', array(
						'conditions' => array('Maquina.id' => $maqid)
					));
					
		$this->Regulador->recursive = -1;				
		$regulador = $this->Regulador->find('first', array(
						'conditions' => array('Regulador.id' => $regid)
					));
		
		/*
		*	DATA TO FILL IN PDF
		*/			
		$calibrename = explode("-", $calibre['Calibre']['name']);
		
		
		$allow = '<p><ul><li><b><strong>';
		//Clean the inside of the tags
		function clean_inside_tags($txt,$tags){
			$txt =removeemptytags($txt);
			preg_match_all("/<([^>]+)>/i",$tags,$allTags,PREG_PATTERN_ORDER);
		
			foreach ($allTags[1] as $tag){
				$txt = preg_replace("/<".$tag."[^>]*>/i","<".$tag.">",$txt);
			}
			return $txt;
		}
		
		function removeemptytags($html_replace) { 
			$pattern = "#<p[^>]*(?:/>|>(?:\s|&nbsp;)*</p>)#im"; 
			return preg_replace($pattern, '', $html_replace); 
		}
		
		
		$pdf = new MYPDF("L", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		
		// set document information
		$pdf->SetCreator('Spider Technologies Corporation');
		$pdf->SetAuthor('Infra S.A. de C.V.');
		$pdf->SetTitle('Selector PAC');
		$pdf->SetSubject('Información PAC');
		$pdf->SetKeywords('INFRA, PAC, selector, cotización');
		
		$pdf->SetInfra(PDF_FOOTER_PAC);
		
		// set default header data
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'SELECTOR DE PROCESOS - PAC      Para consultas técnicas, aclaraciones y sugerencias llame sin costo al:    01 800 712 25 25', PDF_HEADER_STRING);
		
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		
		//set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		
		//set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		
		//set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		
		// set default font subsetting mode
		$pdf->setFontSubsetting(true);
		
		// Set font
		// dejavusans is a UTF-8 Unicode font, if you only need to
		// print standard ASCII chars, you can use core fonts like
		// helvetica or times to reduce file size.
		$pdf->SetFont('dejavusans', '', 10, '', true);
		
		// Add a page
		// This method has several options, check the source code documentation for more information.
		$pdf->AddPage();
		
		//$pdf->SetFillColor(255, 255, 127);
		//$pdf->MultiCell(55, 5, '<i>Material base: '.$material['Material']['name'].' - '.$calibrename[0].'</i>', 1, 'L', 1, 0, '', '', true);
		// Set some content to print
		$html = '
		<h1>Información de productos para Proceso PAC</h1>
		<p><font style="color:#666666;">Material base: </font>'.$material['Material']['name'].' - '.$calibrename[0].'</p>
		<p><font style="color:#666666;">Máquina de Soldar: </font>'.$maquina['Maquina']['name'].'</p>
		<p><font style="color:#666666;">Gas de Protección: </font>'.$gas['Gase']['name'].'</p>
		<p><font style="color:#666666;">Regulador: </font>'.$regulador['Regulador']['name'].'</p>
		<p><font style="color:#666666;">Artículos de Protección: </font>'.$prots.'</p>
		';
		// Print text using writeHTMLCell()
		$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
		
		
		// PAGE 2
		$pdf->AddPage();
	
		$content = strip_tags($maquina['Maquina']['description'], $allow); 
		$content = clean_inside_tags($content,$allow);
		$html = '
		<h1>Máquina de Soldar</h1>
		<p><img src="'.$maquina['Maquina']['smallimage'].'" /></p>
		<p>'.$maquina['Maquina']['name'].'</p>
		<p>'.$content.'</p>
		';
		$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
		
		// PAGE 3
		$pdf->AddPage();
	
		$content = strip_tags($gas['Gase']['description'], $allow); 
		$content = clean_inside_tags($content,$allow);
		$html = '
		<h1>Gas de Protección</h1>
		<p><img src="'.$gas['Gase']['smallimage'].'" /></p>
		<p>'.$gas['Gase']['name'].'</p>
		<p>'.$content.'</p>
		';
		$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
		
		// PAGE 4
		$pdf->AddPage();
	
		$content = strip_tags($regulador['Regulador']['description'], $allow); 
		$content = clean_inside_tags($content,$allow);
		$html = '
		<h1>Regulador de Presión</h1>
		<p><img src="'.$regulador['Regulador']['smallimage'].'" /></p>
		<p>'.$regulador['Regulador']['name'].'</p>
		<p>'.$content.'</p>
		';
		$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
		
		
		foreach ($protecciones as $proteccion) {
			$pdf->AddPage();
		
			$content = strip_tags($proteccion['Proteccione']['description'], $allow); 
			$content = clean_inside_tags($content,$allow);
			$html = '
			<h1>Artículo de Protección</h1>
			<p><img src="'.$proteccion['Proteccione']['smallimage'].'" /></p>
			<p>'.$proteccion['Proteccione']['name'].'</p>
			<p>'.$content.'</p>
			';
			$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
		}
		
		// ---------------------------------------------------------
		
		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.	
		$pdf->Output("Selector_PAC.pdf",'I');
		
		$this->layout = 'pdf'; //this will use the pdf.ctp layout 
        $this->render(); 
		
	} else {
		$this->Session->setFlash(__('La selección que buscas no existe. Busca de nuevo.', true), 'flash_failure');
		$this->redirect('/proceso-tig');
	}
	
	
}	
	
}

?>