<?php
class SmawsController extends AppController {

	var $name = 'Smaws';
	
	var $components = array('RequestHandler', 'Email');
	
	var $uses = array('Smaw', 'Material', 'Calibre', 'Maquina', 'Portaelectrodo', 'Juegopa', 'Aporte', 'Proteccione', 'Seccion', 'Ciudade');
	
	function s1() {
		$result = array();
		
		$mats = $this->Smaw->find('all', array(
			'fields' => array('DISTINCT Smaw.material_id'),
			'order' => array('Smaw.material_id ASC')
		));
		
		$this->Material->recursive = -1;
		
		foreach($mats as $mat) {
			$hold = $this->Material->find('first', array(
				'conditions' => array('Material.psmaw' => 1, 'Material.id' => $mat['Smaw']['material_id']),
				'fields' => array('Material.id', 'Material.name'),
				'order' => 'Material.name ASC'
			));
			array_push($result,$hold);
		}
		
		return $result;
	}
	
	function s1_info() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
	
				$this->Material->recursive = -1;
				
				$this->Material->Behaviors->attach('Containable');
				
				$result = $this->Material->find('all', array(
				'contain' => array('SmawCalibre.name', 'SmawCalibre.id'),
				'fields' => array('Material.short', 'Material.description', 'Material.infra_link'),
				'conditions' => array('Material.psmaw' => 1, 'Material.id' => $_POST['id']),
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
		'conditions' => array('Calibre.psmaw' => 1),
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
				'contain' => array('SmawMaquina.codigo', 'SmawMaquina.name', 'SmawMaquina.id'),
				'fields' => array('Calibre.name', 'Calibre.short', 'Calibre.description', 'Calibre.infra_link'),
				'conditions' => array('Calibre.psmaw' => 1, 'Calibre.id' => $_POST['id']),
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
		'conditions' => array('Maquina.psmaw' => 1),
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
				'contain' => array('SmawAporte.codigo',  'SmawAporte.name', 'SmawAporte.id'),
				'fields' => array('Maquina.name', 'Maquina.short', 'Maquina.description', 'Maquina.infra_link'),
				'conditions' => array('Maquina.psmaw' => 1, 'Maquina.id' => $_POST['id']),
				'order' => 'Maquina.name DESC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	
	
	function s4() {
		$this->Aporte->recursive = -1;
		
		return $this->Aporte->find('list', array(
		'conditions' => array('Aporte.psmaw' => 1),
		'fields' => array('Aporte.id', 'Aporte.name'),
		'order' => 'Aporte.name ASC'));
	}

/*	
	function s4_info() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Aporte->recursive = -1;
				
				$this->Aporte->Behaviors->attach('Containable');
				
				$result = $this->Aporte->find('all', array(
				'contain' => array('SmawProteccione.name', 'SmawProteccione.id'),
				'fields' => array('Aporte.short', 'Aporte.description', 'Aporte.infra_link'),
				'conditions' => array('Aporte.psmaw' => 1, 'Aporte.id' => $_POST['id']),
				'order' => 'Aporte.name ASC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
*/	
	
	
	
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
				
				$calibres = $this->Smaw->find('all', array(
					'fields' => array('DISTINCT Smaw.calibre_id'),
					'conditions' => array('Smaw.material_id' => $_POST['id']),
					'order' => array('Smaw.calibre_id ASC')
				));
				
				$this->Calibre->recursive = -1;
				
				foreach($calibres as $calibre) {
					$hold = $this->Calibre->find('first', array(
						'conditions' => array('Calibre.psmaw' => 1, 'Calibre.id' => $calibre['Smaw']['calibre_id']),
						'fields' => array('Calibre.short', 'Calibre.id', 'Calibre.name')
					));
					array_push($result,$hold);
				}
				
				array_multisort(array_values($result), SORT_DESC, array_keys($result), SORT_DESC, $result);
				//sort($result);
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
						'conditions' => array('Material.psmaw' => 1, 'Material.id' => $_POST['id']),
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
				
				$maquinas = $this->Smaw->find('all', array(
					'fields' => array('DISTINCT Smaw.maquina_id'),
					'conditions' => array('Smaw.material_id' => $_POST['matid'], 'Smaw.calibre_id' => $_POST['id']),
					'order' => array('Smaw.maquina_id ASC'), 
					'cacher' => true
				));
				
				$this->Maquina->recursive = -1;
				$this->Maquina->Behaviors->attach('Containable');
				foreach($maquinas as $maquina) {
					$hold = $this->Maquina->find('first', array(
						'conditions' => array('Maquina.psmaw' => 1, 'Maquina.id' => $maquina['Smaw']['maquina_id']),
						'contain' => array('Ciclomaquina'),
						'fields' => array('Maquina.id AS mid', 'Maquina.name', 'Maquina.short', 'Maquina.ciclomaquina_id', 'Ciclomaquina.id AS Cicloid', 'Ciclomaquina.name AS Cicloname'), 
						'cacher' => true
					));
					$hold2['Maquina'] = array_merge($hold['Maquina'], $hold['Ciclomaquina']);
					array_push($result,$hold2);
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
						'conditions' => array('Calibre.psmaw' => 1, 'Calibre.id' => $_POST['id']),
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
				
				$aportes = $this->Smaw->find('all', array(
					'fields' => array('DISTINCT Smaw.aporte_id'),
					'conditions' => array('Smaw.material_id' => $_POST['matid'], 'Smaw.calibre_id' => $_POST['calibreid'], 'Smaw.maquina_id' => $_POST['id']),
					'order' => array('Smaw.aporte_id ASC')
				));
				
				$this->Aporte->recursive = -1;
				
				foreach($aportes as $aporte) {
					$hold = $this->Aporte->find('first', array(
						'conditions' => array('Aporte.psmaw' => 1, 'Aporte.id' => $aporte['Smaw']['aporte_id']),
						'fields' => array('Aporte.id', 'Aporte.name')
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
						'conditions' => array('Maquina.psmaw' => 1, 'Maquina.id' => $_POST['id']),
						'fields' => array('Maquina.id', 'Maquina.name', 'Maquina.short', 'Maquina.description', 'Maquina.smallimage', 'Maquina.infra_link')
					));
				
				
				$excepcion = 0;
				// Excepcion para CUT WELD
				if( ($_POST['matid'] == 36) && ($_POST['calid'] == 63 || $_POST['calid'] == 64 || $_POST['calid'] == 65) ) {
					
					$this->Portaelectrodo->recursive = -1;
					$portaelectrodo = $this->Portaelectrodo->find('all', array(
						'conditions'  => array('Portaelectrodo.id' => 2)
					));
					
					$this->Juegopa->recursive = -1;
					$juegodepas = $this->Juegopa->find('all', array(
						'conditions'  => array('Juegopa.id' => 3)
					));
				
					$excepcion = 1;
				} elseif($_POST['matid'] == 36) {
					
					$this->Portaelectrodo->recursive = -1;
					$portaelectrodo = $this->Portaelectrodo->find('all', array(
						'conditions'  => array('Portaelectrodo.id' => 3)
					));
					
					$this->Juegopa->recursive = -1;
					$juegodepas = $this->Juegopa->find('all', array(
						'conditions'  => array('Juegopa.id' => 4)
					));
					
					$excepcion = 1;
				}
				
				if($excepcion == 0) {
					$this->Maquina->SmawMaquinaPortaelectrodo->Behaviors->attach('Containable');	
					$portaelectrodo = $this->Maquina->SmawMaquinaPortaelectrodo->find('all', array(
						'contain' => array('Portaelectrodo'),
						'conditions'  => array('SmawMaquinaPortaelectrodo.maquina_id' => $_POST['id'])
					));
					unset($portaelectrodo['SmawMaquinaPortaelectrodo']);
					
					$i = 0;
					$this->Portaelectrodo->SmawJuegopaPortaelectrodo->Behaviors->attach('Containable');	
					foreach($portaelectrodo as $electrodo) {
						$tmp = $this->Portaelectrodo->SmawJuegopaPortaelectrodo->find('first', array(
							'contain' => array('Juegopa'),
							'conditions'  => array('SmawJuegopaPortaelectrodo.portaelectrodo_id' => $electrodo['Portaelectrodo']['id'])
						));
						$result['Portaelectrodo'][$i] = $electrodo['Portaelectrodo'];
						// Para las maquinas TH que tienen 1 porta y 2 juegos pas
						$j = $i;
						if($_POST['id'] == 33 || $_POST['id'] == 35 || $_POST['id'] == 16 || $_POST['id'] == 17) {
							$tmp2 = $this->Juegopa->find('first', array('conditions' => array('Juegopa.id' => 1) ) );
							$result['Juegopa'][$j] = $tmp2['Juegopa'];
							$j++;
						} else {
							$result['Juegopa'][$j] = $tmp['Juegopa'];
						}
						$i++;
					}
					/*
					$this->Portaelectrodo->SmawJuegopaPortaelectrodo->Behaviors->attach('Containable');	
					$juegodepas = $this->Portaelectrodo->SmawJuegopaPortaelectrodo->find('all', array(
						'contain' => array('Juegopa'),
						'conditions'  => array('SmawJuegopaPortaelectrodo.portaelectrodo_id' => $portaelectrodo['Portaelectrodo']['id'])
					));
					unset($portaelectrodo['SmawJuegopaPortaelectrodo']);
					*/
				} else {
					$result['Portaelectrodo'][0] = $portaelectrodo[0]['Portaelectrodo'];
					$result['Juegopa'][0] = $juegodepas[0]['Juegopa'];
				}
				//debug($portaelectrodo);
				//$result['Portaelectrodo'] = $portaelectrodo;
				//$result['Juegopa'] = $juegodepas;
					
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
				
				$this->Proteccione->recursive = 1;
				
				$this->Proteccione->unbindModel( array('belongsTo' => array('Fullitem', 'User') ) );
				
				$result = $this->Proteccione->find('all', array(
					'conditions' => array('Proteccione.psmaw' => 1),
					'order' => array('Proteccione.name ASC')
				));
				
				//debug($result);
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
	
	function interStep5() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Aporte->recursive = -1;
				$result = $this->Aporte->find('first', array(
						'conditions' => array('Aporte.psmaw' => 1, 'Aporte.id' => $_POST['id']),
						'fields' => array('Aporte.id', 'Aporte.name', 'Aporte.short', 'Aporte.description', 'Aporte.smallimage', 'Aporte.infra_link')
					));
				return(json_encode($result));
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
		
	
function diagram() {
	$admin = parent::checkSession($_SERVER['REQUEST_URI']);
	$this->set('title_for_layout','INFRA - SMAW Diagramas');
	if($admin['admin'] == 1) {
		
		
		
	}
}


function add() {
	$admin = parent::checkSession($_SERVER['REQUEST_URI']);
	$this->set('title_for_layout','INFRA - SMAW Nueva Selección');
	if($admin['admin'] == 1) {
		
		$this->Material->recursive = -1;
		
		$materials = $this->Material->find('all', array(
		'fields' => array('Material.id', 'Material.name'),
		'conditions' => array('Material.psmaw' => 1),
		'order' => 'Material.name ASC'));
		
		$this->Calibre->recursive = -1;
		
		$calibres = $this->Calibre->find('all', array(
		'fields' => array('Calibre.id', 'Calibre.name'),
		'conditions' => array('Calibre.psmaw' => 1),
		'order' => 'Calibre.name ASC'));
		
		$this->Maquina->recursive = -1;
		
		$maquinas = $this->Maquina->find('all', array(
		'fields' => array('Maquina.id', 'Maquina.codigo', 'Maquina.name'),
		'conditions' => array('Maquina.psmaw' => 1),
		'order' => 'Maquina.codigo ASC'));
		
		$this->Aporte->recursive = -1;
		
		$aportes = $this->Aporte->find('all', array(
		'fields' => array('Aporte.id', 'Aporte.codigo', 'Aporte.name'),
		'conditions' => array('Aporte.psmaw' => 1),
		'order' => 'Aporte.codigo ASC'));
		
		
		$this->set(compact('materials', 'calibres', 'maquinas', 'aportes'));
		
	}
}

function addstep2() {
	$admin = parent::checkSession($_SERVER['REQUEST_URI']);
	if($admin['admin'] == 1) {
		if($_SERVER['REQUEST_METHOD'] == "POST") {
			
			$date = date("Y-m-d H:i:s");
			
			$j = 0;
			$k = 0;
			$hold = array();
			$save = 0;
			$existentes = 0;
			foreach($this->data['material'] as $materiales) {
				//$hold['Smaw'][$i]['material_id'] = $materiales['id'];
				foreach($this->data['calibre'] as $calibres) {
					foreach($this->data['maquina'] as $maquinas) {
						foreach($this->data['aporte'] as $aportes) {
							
							if($materiales['id'] > 0 && $calibres['id'] > 0 && $maquinas['id'] > 0 && $aportes['id'] > 0) {
								
								$search = $this->Smaw->find('first', array(
									'conditions' => array(
									'material_id' => $materiales['id'],
									'calibre_id' => $calibres['id'],
									'maquina_id' => $maquinas['id'],
									'aporte_id' => $aportes['id']
									)
								));
								
								if(!$search) {
									$save = 1;
									//unset($this->data['material'][$i]);
									$hold['Smaw'][$j]['material_id'] = $materiales['id'];
									$hold['Smaw'][$j]['calibre_id'] = $calibres['id'];
									$hold['Smaw'][$j]['maquina_id'] = $maquinas['id'];
									$hold['Smaw'][$j]['aporte_id'] = $aportes['id'];
									$hold['Smaw'][$j]['created'] = $date;
									$hold['Smaw'][$j]['creator_id'] = $admin['iduser'];
									$j++;
								} else {
									$existentes++;
								}
							}
						}
					}
				}
			}
			
			if($save == 1) {
				$this->Smaw->create();
				if($this->Smaw->saveAll($hold['Smaw'])) {
					$this->Session->setFlash(__('Se han guardado todas las selecciones', true), 'flash_success');
				} else {
					$this->Session->setFlash(__('No se pudieron guardar, hubo un error.', true), 'flash_success');
				}
			} else {
				$this->Session->setFlash(__('No hay relaciones nuevas que guardar.', true), 'flash_success');
			}
			//$hold = $this->data;
			$this->set(compact('hold', 'existentes'));
			
		}
	}
}



function saveSelection() {
	$admin = parent::checkSession($_SERVER['REQUEST_URI']);
	if($admin['admin'] == 1) {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$msg = '';
				
					$search = $this->Smaw->find('first', array(
						'conditions' => array(
						'material_id' => $_POST['st1'],
						'calibre_id' => $_POST['st2'],
						'maquina_id' => $_POST['st3'],
						'aporte_id' => $_POST['st4']
						)
					));
					
					if(!$search) {
					
						$this->data = array('Smaw' => array(
							'material_id' => $_POST['st1'],
							'calibre_id' => $_POST['st2'],
							'maquina_id' => $_POST['st3'],
							'aporte_id' => $_POST['st4'],
							'creator_id' => $admin['iduser'],
						));
						$this->Smaw->create();
						if ($this->Smaw->save($this->data)) {
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


function selector2($step = null, $mat = null, $matid = null, $cal = null, $calid = null, $maq = null, $maqid = null, $apo = null, $apoid = null, $port = null, $portid = null, $jue = null, $jueid = null, $prot = null, $protids = null) {
	
	$valid = $this->Smaw->find('first', array(
					'fields' => array('Smaw.id'),
					'conditions' => array('Smaw.material_id' => $matid, 'Smaw.calibre_id' => $calid,
					'Smaw.maquina_id' => $maqid, 'Smaw.aporte_id' => $apoid)
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
					
		$this->Portaelectrodo->recursive = -1;				
		$portaelectrodo = $this->Portaelectrodo->find('first', array(
						'conditions' => array('Portaelectrodo.id' => $portid)
					));
					
		$this->Juegopa->recursive = -1;				
		$juegopas = $this->Juegopa->find('first', array(
						'conditions' => array('Juegopa.id' => $jueid)
					));
					
		$this->Aporte->recursive = -1;				
		$aporte = $this->Aporte->find('first', array(
						'conditions' => array('Aporte.id' => $apoid)
					));
					
					
		$this->set('title_for_layout','Proceso SMAW - '.$maquina['Maquina']['name']);
		
		$ciudades = $this->Ciudade->find('list', array('conditions' => array('Ciudade.hidden' => 0), 'order' => array('Ciudade.name ASC') ) );
		
		$key = array_search("Internacional", $ciudades);
		unset($ciudades[$key]);
		$ciudades[$key] = 'Internacional';
		
		$this->set(compact('material', 'calibre', 'maquina', 'portaelectrodo', 'juegopas', 'aporte', 'protecciones', 'ciudades'));
	
	} else {
		$this->Session->setFlash(__('La selección que buscas no existe. Busca de nuevo.', true), 'flash_failure');
		$this->redirect('/proceso-smaw');
	}
}


function steppdf($mat = null, $matid = null, $cal = null, $calid = null, $maq = null, $maqid = null, $apo = null, $apoid = null, $port = null, $portid = null, $jue = null, $jueid = null, $prot = null, $protids = null) {
	
	App::import('Vendor', 'tcpdf/mytcpdf');
	//App::import('Vendor', 'tcpdf/tcpdf');
	//App::import('Vendor', 'tcpdf/config/lang/eng');
	
	$valid = $this->Smaw->find('first', array(
					'fields' => array('Smaw.id'),
					'conditions' => array('Smaw.material_id' => $matid, 'Smaw.calibre_id' => $calid,
					'Smaw.maquina_id' => $maqid, 'Smaw.aporte_id' => $apoid)
					));
	
	if($valid > 0) {
		
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
					
		$this->Maquina->recursive = -1;				
		$maquina = $this->Maquina->find('first', array(
						'conditions' => array('Maquina.id' => $maqid)
					));
					
		$this->Aporte->recursive = -1;				
		$aporte = $this->Aporte->find('first', array(
						'conditions' => array('Aporte.id' => $apoid)
					));
					
		$this->Portaelectrodo->recursive = -1;				
		$portaelectrodo = $this->Portaelectrodo->find('first', array(
						'conditions' => array('Portaelectrodo.id' => $portid)
					));
					
		$this->Juegopa->recursive = -1;				
		$juegopas = $this->Juegopa->find('first', array(
						'conditions' => array('Juegopa.id' => $jueid)
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
		$pdf->SetTitle('Selector SMAW');
		$pdf->SetSubject('Información SMAW');
		$pdf->SetKeywords('INFRA, SMAW, selector, cotización');
		
		$pdf->SetInfra(PDF_FOOTER_SMAW);
		
		// set default header data
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Para consultas técnicas, aclaraciones y sugerencias llame sin costo al:   01 800 712 25 25', PDF_HEADER_STRING);
		
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
		
		if($portaelectrodo['Portaelectrodo']['codigo'] == "N/A") {
			$p_name = "Incluido en la Máquina para Soldar.";
			$j_name = "Incluido en la Máquina para Soldar.";
		} else {
			$p_name = $portaelectrodo['Portaelectrodo']['name'];
			$j_name = $juegopas['Juegopa']['name'];
		}
		//$pdf->SetFillColor(255, 255, 127);
		//$pdf->MultiCell(55, 5, '<i>Material base: '.$material['Material']['name'].' - '.$calibrename[0].'</i>', 1, 'L', 1, 0, '', '', true);
		// Set some content to print
		$html = '
		<h1>Información de productos para Proceso SMAW</h1>
		<p><font style="color:#666666;">Material base: </font>'.$material['Material']['name'].' - '.$calibrename[0].'</p>
		<p><font style="color:#666666;">Máquina de Soldar: </font>'.$maquina['Maquina']['name'].'</p>
		<p><font style="color:#666666;">Portaelectrodo: </font>'.$p_name.'</p>
		<p><font style="color:#666666;">Juego de Pas: </font>'.$j_name.'</p>
		<p><font style="color:#666666;">Material de Aporte: </font>'.$aporte['Aporte']['name'].'</p>
		<p><font style="color:#666666;">Artículos de Protección: </font>'.$prots.'</p>
		';
		// Print text using writeHTMLCell()
		$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
		
		// PAGE 3
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
		
		if($portaelectrodo['Portaelectrodo']['codigo'] != "N/A") {
			// PAGE 4
			$pdf->AddPage();
		
			$content = strip_tags($portaelectrodo['Portaelectrodo']['description'], $allow); 
			$content = clean_inside_tags($content,$allow);
			$html = '
			<h1>Portaelectrodo</h1>
			<p><img src="'.$portaelectrodo['Portaelectrodo']['smallimage'].'" /></p>
			<p>'.$portaelectrodo['Portaelectrodo']['name'].'</p>
			<p>'.$content.'</p>
			';
			$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
		}
		
		if($juegopas['Juegopa']['codigo'] != "N/A") {
			// PAGE 5
			$pdf->AddPage();
		
			$content = strip_tags($juegopas['Juegopa']['description'], $allow); 
			$content = clean_inside_tags($content,$allow);
			$html = '
			<h1>Juego de Pas</h1>
			<p><img src="'.$juegopas['Juegopa']['smallimage'].'" /></p>
			<p>'.$juegopas['Juegopa']['name'].'</p>
			<p>'.$content.'</p>
			';
			$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
		}
		
		// PAGE 6
		$pdf->AddPage();
	
		$content = strip_tags($aporte['Aporte']['description'], $allow); 
		$content = clean_inside_tags($content,$allow);
		$html = '
		<h1>Material de Aporte</h1>
		<p><img src="'.$aporte['Aporte']['smallimage'].'" /></p>
		<p>'.$aporte['Aporte']['name'].'</p>
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
		$pdf->Output("Selector_SMAW.pdf",'I');
		
		$this->layout = 'pdf'; //this will use the pdf.ctp layout 
        $this->render(); 
		
	} else {
		$this->Session->setFlash(__('La selección que buscas no existe. Busca de nuevo.', true), 'flash_failure');
		$this->redirect('/proceso-smaw');
	}
	
	
}
	
	
}

?>