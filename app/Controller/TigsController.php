<?php
class TigsController extends AppController {

	var $name = 'Tigs';
	
	var $components = array('RequestHandler', 'Session', 'Email');
	
	
	var $uses = array('Tig', 'Material', 'Calibre', 'Ccalidade', 'Gase', 'Maquina', 'Antorcha', 'Tungsteno', 'Aporte', 'Regulador', 'Alternativo', 'Proteccione', 'Seccion', 'TigCalibreCalidadgase', 'TigCalidadgaseGase', 'Calidadgase', 'TigAmperajeMaterial', 'TigAmperajeCalibre', 'Amperaje', 'TigAccesorioMaterial', 'TigAccesorioCalibre', 'Accesorio', 'Ciudade');
	
	function s1() {
		$result = array();
		
		$mats = $this->Tig->find('all', array(
			'fields' => array('DISTINCT Tig.material_id'),
			'order' => array('Tig.material_id ASC')
		));
		
		$this->Material->recursive = -1;
		
		foreach($mats as $mat) {
			$hold = $this->Material->find('first', array(
				'conditions' => array('Material.ptig' => 1, 'Material.id' => $mat['Tig']['material_id']),
				'fields' => array('Material.id', 'Material.name', 'Material.order'),
				'order' => 'Material.name ASC'
			));
			array_push($result,$hold['Material']);
		}
		
		foreach($result as $c=>$key) {
        $sort_order[] = $key['order'];
    	}
		array_multisort($sort_order, SORT_ASC, $result);
		
		return $result;
		/*
		return $this->Material->find('list', array(
		'conditions' => array('Material.ptig' => 1),
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
				'contain' => array('TigCalibre.name', 'TigCalibre.id'),
				'fields' => array('Material.short', 'Material.description', 'Material.infra_link'),
				'conditions' => array('Material.ptig' => 1, 'Material.id' => $_POST['id']),
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
		'conditions' => array('Calibre.ptig' => 1),
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
				'contain' => array('TigCcalidade.codigo', 'TigCcalidade.name', 'TigCcalidade.id'),
				'fields' => array('Calibre.name', 'Calibre.short', 'Calibre.description', 'Calibre.infra_link'),
				'conditions' => array('Calibre.ptig' => 1, 'Calibre.id' => $_POST['id']),
				'order' => 'Calibre.name DESC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}

	function s31() {
		$this->Ccalidade->recursive = -1;
		
		return $this->Ccalidade->find('list', array(
		'conditions' => array('Ccalidade.ptig' => 1),
		'fields' => array('Ccalidade.id', 'Ccalidade.name'),
		'order' => 'Ccalidade.name ASC'));
	}
	
	function s31_info() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Ccalidade->recursive = -1;
				
				$this->Ccalidade->Behaviors->attach('Containable');
				
				$result = $this->Ccalidade->find('all', array(
				'contain' => array('TigGase.codigo', 'TigGase.name', 'TigGase.id'),
				'fields' => array('Ccalidade.name', 'Ccalidade.short', 'Ccalidade.description', 'Ccalidade.infra_link'),
				'conditions' => array('Ccalidade.ptig' => 1, 'Ccalidade.id' => $_POST['id']),
				'order' => 'Ccalidade.name DESC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	function s3() {
		$this->Gase->recursive = -1;
		
		return $this->Gase->find('list', array(
		'conditions' => array('Gase.ptig' => 1),
		'fields' => array('Gase.id', 'Gase.name'),
		'order' => 'Gase.name ASC'));
	}
	
	function s3_info() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Gase->recursive = -1;
				
				$this->Gase->Behaviors->attach('Containable');
				
				$result = $this->Gase->find('all', array(
				'contain' => array('TigMaquina.codigo', 'TigMaquina.name', 'TigMaquina.id'),
				'fields' => array('Gase.name', 'Gase.short', 'Gase.description', 'Gase.infra_link'),
				'conditions' => array('Gase.ptig' => 1, 'Gase.id' => $_POST['id']),
				'order' => 'Gase.name DESC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	
	
	function s4() {
		$this->Maquina->recursive = -1;
		
		return $this->Maquina->find('list', array(
		'conditions' => array('Maquina.ptig' => 1),
		'fields' => array('Maquina.id', 'Maquina.name'),
		'order' => 'Maquina.name ASC'));
	}
	
	function s4_info() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Aporte->recursive = -1;
				
				$this->Aporte->Behaviors->attach('Containable');
				
				$result = $this->Aporte->find('all', array(
				'contain' => array('TigRegulador.codigo', 'TigRegulador.name', 'TigRegulador.id'),
				'fields' => array('Aporte.short', 'Aporte.description', 'Aporte.infra_link'),
				'conditions' => array('Aporte.ptig' => 1, 'Aporte.id' => $_POST['id']),
				'order' => 'Aporte.name ASC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	
	
	function s5() {
		$this->Antorcha->recursive = -1;
		
		return $this->Antorcha->find('list', array(
		'conditions' => array('Antorcha.ptig' => 1),
		'fields' => array('Antorcha.id', 'Antorcha.name'),
		'order' => 'Antorcha.name ASC'));
	}
	
	function s5_info() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Maquina->recursive = -1;
				
				$this->Maquina->Behaviors->attach('Containable');
				
				$result = $this->Maquina->find('all', array(
				'contain' => array('TigAntorcha.codigo', 'TigAntorcha.name', 'TigAntorcha.id'),
				'fields' => array('Maquina.short', 'Maquina.description', 'Maquina.infra_link'),
				'conditions' => array('Maquina.ptig' => 1, 'Maquina.id' => $_POST['id']),
				'order' => 'Maquina.name ASC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	
	
	function s6() {
		$this->Aporte->recursive = -1;
		
		return $this->Aporte->find('list', array(
		'conditions' => array('Aporte.ptig' => 1),
		'fields' => array('Aporte.id', 'Aporte.name'),
		'order' => 'Aporte.name ASC'));
	}
	
	function s6_info() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Antorcha->recursive = -1;
				
				$this->Antorcha->Behaviors->attach('Containable');
				
				$result = $this->Antorcha->find('all', array(
				'contain' => array('TigTungsteno.codigo', 'TigTungsteno.name', 'TigTungsteno.id'),
				'fields' => array('Antorcha.short', 'Antorcha.description', 'Antorcha.infra_link'),
				'conditions' => array('Antorcha.ptig' => 1, 'Antorcha.id' => $_POST['id']),
				'order' => 'Antorcha.name ASC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	
	
	function s61() {
		$this->Tungsteno->recursive = -1;
		
		return $this->Tungsteno->find('list', array(
		'conditions' => array('Tungsteno.ptig' => 1),
		'fields' => array('Tungsteno.id', 'Tungsteno.name'),
		'order' => 'Tungsteno.name ASC'));
	}
	
	function s61_info() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Tungsteno->recursive = -1;
				
				$this->Tungsteno->Behaviors->attach('Containable');
				
				$result = $this->Tungsteno->find('all', array(
				'contain' => array('TigAporte.codigo', 'TigAporte.name', 'TigAporte.id'),
				'fields' => array('Tungsteno.short', 'Tungsteno.description', 'Tungsteno.infra_link'),
				'conditions' => array('Tungsteno.ptig' => 1, 'Tungsteno.id' => $_POST['id']),
				'order' => 'Tungsteno.name ASC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}

	
	function s7() {
		$this->Regulador->recursive = -1;
		
		return $this->Regulador->find('list', array(
		'conditions' => array('Regulador.ptig' => 1),
		'fields' => array('Regulador.id', 'Regulador.name'),
		'order' => 'Regulador.name ASC'));
	}
	
	function s7_info() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Aporte->recursive = -1;
				
				$this->Aporte->Behaviors->attach('Containable');
				
				$result = $this->Aporte->find('all', array(
				'contain' => array('TigRegulador.codigo', 'TigRegulador.name', 'TigRegulador.id'),
				'fields' => array('Aporte.short', 'Aporte.description', 'Aporte.infra_link'),
				'conditions' => array('Aporte.ptig' => 1, 'Aporte.id' => $_POST['id']),
				'order' => 'Aporte.name ASC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	
	
	function s8() {
		$this->Alternativo->recursive = -1;
		
		return $this->Alternativo->find('list', array(
		'conditions' => array('Alternativo.ptig' => 1),
		'fields' => array('Alternativo.id', 'Alternativo.name'),
		'order' => 'Alternativo.name ASC'));
	}
	
	
	
	function s8_info() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Regulador->recursive = -1;
				
				$this->Regulador->Behaviors->attach('Containable');
				
				$result = $this->Regulador->find('all', array(
				'contain' => array('TigAlternativo.codigo', 'TigAlternativo.name', 'TigAlternativo.id'),
				'fields' => array('Regulador.short', 'Regulador.description', 'Regulador.infra_link'),
				'conditions' => array('Regulador.ptig' => 1, 'Regulador.id' => $_POST['id']),
				'order' => 'Regulador.name ASC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	
	
	function s9() {
		$this->Proteccione->recursive = -1;
		
		return $this->Proteccione->find('list', array(
		'conditions' => array('Proteccione.ptig' => 1),
		'fields' => array('Proteccione.id', 'Proteccione.name'),
		'order' => 'Proteccione.name ASC'));
	}
	
	function s9_info() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Alternativo->recursive = -1;
				
				$this->Alternativo->Behaviors->attach('Containable');
				
				$result = $this->Alternativo->find('all', array(
				'contain' => array('TigProteccione.name', 'TigProteccione.id'),
				'fields' => array('Alternativo.short', 'Alternativo.description', 'Alternativo.infra_link'),
				'conditions' => array('Alternativo.ptig' => 1, 'Alternativo.id' => $_POST['id']),
				'order' => 'Alternativo.name ASC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
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
				
				$calibres = $this->Tig->find('all', array(
					'fields' => array('DISTINCT Tig.calibre_id'),
					'conditions' => array('Tig.material_id' => $_POST['id']),
					'order' => array('Tig.calibre_id ASC')
				));
				
				$this->Calibre->recursive = -1;
				
				foreach($calibres as $calibre) {
					$hold = $this->Calibre->find('first', array(
						'conditions' => array('Calibre.ptig' => 1, 'Calibre.id' => $calibre['Tig']['calibre_id']),
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
						'conditions' => array('Material.ptig' => 1, 'Material.id' => $_POST['id']),
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
				
				$gases = $this->Tig->find('all', array(
					'fields' => array('DISTINCT Tig.gase_id'),
					'conditions' => array('Tig.material_id' => $_POST['matid'], 'Tig.calibre_id' => $_POST['id']),
					'order' => array('Tig.gase_id ASC')
				));
				
				$this->Gase->recursive = -1;
				$this->TigCalibreCalidadgase->recursive = -1;
				$c_calidad['Calidadgase'] = array('name' => '');
				
				$c_calibre = $this->TigCalibreCalidadgase->find('all', array('conditions' => array('TigCalibreCalidadgase.calibre_id' => $_POST['id']) ) );
				
				foreach($gases as $gas) {
					foreach($c_calibre as $c1) {
						$c_gase = $this->TigCalidadgaseGase->find('all', array('conditions' => array('TigCalidadgaseGase.gase_id' => $gas['Tig']['gase_id']) ) );
						foreach($c_gase as $c2) {
							if($c1['TigCalibreCalidadgase']['calidadgase_id'] == $c2['TigCalidadgaseGase']['calidadgase_id']) {
								$c_calidad = $this->Calidadgase->find('first', array('conditions' => array('Calidadgase.id' => $c2['TigCalidadgaseGase']['calidadgase_id']), 
												'cacher' => true ) );
							}
						}
					}
					
					$hold = $this->Gase->find('first', array(
						'conditions' => array('Gase.ptig' => 1, 'Gase.id' => $gas['Tig']['gase_id']),
						'fields' => array('Gase.id', 'Gase.name', 'Gase.short'), 
						'cacher' => true
					));
					$hold['Gase']['ccalidad'] = $c_calidad;
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
						'conditions' => array('Calibre.ptig' => 1, 'Calibre.id' => $_POST['id']),
						'fields' => array('Calibre.id', 'Calibre.name', 'Calibre.short', 'Calibre.description', 'Calibre.smallimage', 'Calibre.infra_link')
					));
				return(json_encode($result));
			}
		}
		Configure::write('debug', 0);
		exit();	
	}


	/*
	* Seleccionaron un calibre y vamos a traer la condicion de calidad...
	*/
	function selectorStep31() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$result = array();
				
				$ccalidades = $this->Tig->find('all', array(
					'fields' => array('DISTINCT Tig.ccalidade_id'),
					'conditions' => array('Tig.material_id' => $_POST['matid'], 'Tig.calibre_id' => $_POST['id']),
					'order' => array('Tig.ccalidade_id ASC')
				));
				
				$this->Ccalidade->recursive = -1;
								
				foreach($ccalidades as $ccalidade) {
					$hold = $this->Ccalidade->find('first', array(
						'conditions' => array('Ccalidade.ptig' => 1, 'Ccalidade.id' => $ccalidade['Tig']['ccalidade_id']),
						'fields' => array('Ccalidade.id', 'Ccalidade.name', 'Ccalidade.short'), 
						'cacher' => true
					));
					array_push($result,$hold);
				}
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	function interStep31() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Ccalidade->recursive = -1;
				$result = $this->Ccalidade->find('first', array(
						'conditions' => array('Ccalidade.ptig' => 1, 'Ccalidade.id' => $_POST['id']),
						'fields' => array('Ccalidade.id', 'Ccalidade.name', 'Ccalidade.short', 'Ccalidade.description', 'Ccalidade.smallimage', 'Ccalidade.infra_link')
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
				
				$maquinas = $this->Tig->find('all', array(
					'fields' => array('DISTINCT Tig.maquina_id'),
					'conditions' => array('Tig.material_id' => $_POST['matid'], 'Tig.calibre_id' => $_POST['calibreid'], 'Tig.gase_id' => $_POST['id']),
					'order' => array('Tig.maquina_id ASC')
				));
				
				$this->Maquina->recursive = -1;
				$this->Maquina->Behaviors->attach('Containable');
				foreach($maquinas as $maquina) {
					$hold = $this->Maquina->find('first', array(
						'conditions' => array('Maquina.ptig' => 1, 'Maquina.id' => $maquina['Tig']['maquina_id']),
						'contain' => array('Ciclomaquina'),
						'fields' => array('Maquina.id AS mid', 'Maquina.name', 'Maquina.short', 'Maquina.order', 'Maquina.ciclomaquina_id', 'Ciclomaquina.id AS Cicloid', 'Ciclomaquina.name AS Cicloname'), 
						'cacher' => true
					));
					$hold2['Maquina'] = array_merge($hold['Maquina'], $hold['Ciclomaquina']);
					/*
					foreach($hold2 as $key => $row){ 
						$ciclo_id[$key] = $row['Cicloid'];
						$ciclo_name[$key] = $row['Cicloname'];
						$m_id[$key] = $row['id'];
						$m_name[$key] = $row['name'];
						$m_short[$key] = $row['short'];
						$m_cicloid[$key] = $row['ciclomaquina_id'];
					} 
					
					array_multisort($ciclo_id,SORT_ASC, $m_cicloid,SORT_ASC, $m_id,SORT_ASC, $m_name,SORT_ASC, $m_short,SORT_ASC, $ciclo_name,SORT_ASC, $hold2); 
					*/
					array_push($result,$hold2);
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
				
				$this->Gase->recursive = -1;
				$result = $this->Gase->find('first', array(
						'conditions' => array('Gase.ptig' => 1, 'Gase.id' => $_POST['id']),
						'fields' => array('Gase.id', 'Gase.name', 'Gase.short', 'Gase.description', 'Gase.smallimage', 'Gase.infra_link')
					));
				return(json_encode($result));
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	/*
	* CONDICION DE CALIDAD
	*/
	public function ccalidad() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$result = array();
				
				$this->TigCalibreCalidadgase->recursive = -1;
				$c_calibre = $this->TigCalibreCalidadgase->find('all', array('conditions' => array('TigCalibreCalidadgase.calibre_id' => $_POST['calibreid']), 
					'cacher' => true ) );
				$c_gase = $this->TigCalidadgaseGase->find('all', array('conditions' => array('TigCalidadgaseGase.gase_id' => $_POST['gasid']), 
					'cacher' => true ) );
				
				$this->Calidadgase->recursive = -1;
				foreach($c_calibre as $c1) {
					foreach($c_gase as $c2) {
						if($c1['TigCalibreCalidadgase']['calidadgase_id'] == $c2['TigCalidadgaseGase']['calidadgase_id']) {
							$result = $this->Calidadgase->find('first', array('conditions' => array('Calidadgase.id' => $c2['TigCalidadgaseGase']['calidadgase_id']), 
										'cacher' => true ) );
						}
					}
				}
				
				return(json_encode($result));
				
				//debug($c_calibre);
				//return(json_encode($c_calibre));
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	/*
	* CONDICION DE CALIDAD
	*/
	
	/*
	* RANGO DE AMPERAJE
	*/
	public function rangoamperaje() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$result = array();
				
				$this->TigAmperajeMaterial->recursive = -1;
				$c_material = $this->TigAmperajeMaterial->find('all', array('conditions' => array('TigAmperajeMaterial.material_id' => $_POST['matid']), 
					'cacher' => true ) );
				$c_calibre = $this->TigAmperajeCalibre->find('all', array('conditions' => array('TigAmperajeCalibre.calibre_id' => $_POST['calibreid']), 
					'cacher' => true ) );
				
				$this->Amperaje->recursive = -1;
				foreach($c_material as $c1) {
					foreach($c_calibre as $c2) {
						if($c1['TigAmperajeMaterial']['amperaje_id'] == $c2['TigAmperajeCalibre']['amperaje_id']) {
							$result = $this->Amperaje->find('first', array('conditions' => array('Amperaje.id' => $c2['TigAmperajeCalibre']['amperaje_id']), 
										'cacher' => true ) );
						}
					}
				}
				
				return(json_encode($result));
				
				//debug($c_calibre);
				//return(json_encode($c_calibre));
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	/*
	* RANGO DE AMPERAJE
	*/
	
	/*
	* ACCESORIOS DE ENSAMBLE
	*/
	public function accesorio() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$result = array();
				
				$this->TigAccesorioMaterial->recursive = -1;
				$c_material = $this->TigAccesorioMaterial->find('all', array('conditions' => array('TigAccesorioMaterial.material_id' => $_POST['matid']), 
					'cacher' => true ) );
				$c_calibre = $this->TigAccesorioCalibre->find('all', array('conditions' => array('TigAccesorioCalibre.calibre_id' => $_POST['calibreid']), 
					'cacher' => true ) );
				
				$this->Accesorio->recursive = -1;
				foreach($c_material as $c1) {
					foreach($c_calibre as $c2) {
						if($c1['TigAccesorioMaterial']['accesorio_id'] == $c2['TigAccesorioCalibre']['accesorio_id']) {
							$result = $this->Accesorio->find('first', array('conditions' => array('Accesorio.id' => $c2['TigAccesorioCalibre']['accesorio_id']), 
										'cacher' => true ) );
						}
					}
				}
				
				return(json_encode($result));
				
				//debug($c_calibre);
				//return(json_encode($c_calibre));
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	/*
	* ACCESORIOS DE ENSAMBLE
	*/
	
	
	function selectorStep5() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$result = array();
				
				$antorchas = $this->Tig->find('all', array(
					'fields' => array('DISTINCT Tig.antorcha_id'),
					'conditions' => array('Tig.material_id' => $_POST['matid'], 'Tig.calibre_id' => $_POST['calibreid'], 'Tig.gase_id' => $_POST['gasid'],
					'Tig.maquina_id' => $_POST['id']),
					'order' => array('Tig.antorcha_id ASC')
				));
				
				$this->Antorcha->recursive = -1;
				
				foreach($antorchas as $antorcha) {
					$hold = $this->Antorcha->find('first', array(
						'conditions' => array('Antorcha.ptig' => 1, 'Antorcha.id' => $antorcha['Tig']['antorcha_id']),
						'fields' => array('Antorcha.id', 'Antorcha.name')
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
				
				$this->Maquina->recursive = -1;
				$result = $this->Maquina->find('first', array(
						'conditions' => array('Maquina.ptig' => 1, 'Maquina.id' => $_POST['id']),
						'fields' => array('Maquina.id', 'Maquina.name', 'Maquina.short', 'Maquina.description', 'Maquina.smallimage', 'Maquina.infra_link')
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
				
				$aportes = $this->Tig->find('all', array(
					'fields' => array('DISTINCT Tig.aporte_id'),
					'conditions' => array('Tig.material_id' => $_POST['matid'], 'Tig.calibre_id' => $_POST['calibreid'], 'Tig.gase_id' => $_POST['gasid'],
					'Tig.maquina_id' => $_POST['maqid'], 'Tig.antorcha_id' => $_POST['id']),
					'order' => array('Tig.aporte_id ASC')
				));
				
				$this->Aporte->recursive = -1;
				
				foreach($aportes as $aporte) {
					$hold = $this->Aporte->find('first', array(
						'conditions' => array('Aporte.ptig' => 1, 'Aporte.id' => $aporte['Tig']['aporte_id']),
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
	function interStep6() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Antorcha->recursive = -1;
				$result = $this->Antorcha->find('first', array(
						'conditions' => array('Antorcha.ptig' => 1, 'Antorcha.id' => $_POST['id']),
						'fields' => array('Antorcha.id', 'Antorcha.name', 'Antorcha.short', 'Antorcha.description', 'Antorcha.smallimage', 'Antorcha.infra_link')
					));
				return(json_encode($result));
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	

	function selectorStep7() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$result = array();
				
				$reguladores = $this->Tig->find('all', array(
					'fields' => array('DISTINCT Tig.regulador_id'),
					'conditions' => array('Tig.material_id' => $_POST['matid'], 'Tig.calibre_id' => $_POST['calibreid'], 'Tig.gase_id' => $_POST['gasid'],
					'Tig.maquina_id' => $_POST['maqid'], 'Tig.antorcha_id' => $_POST['antid'], 'Tig.aporte_id' => $_POST['id']),
					'order' => array('Tig.regulador_id ASC')
				));
				
				$this->Regulador->recursive = -1;
				
				foreach($reguladores as $regulador) {
					$hold = $this->Regulador->find('first', array(
						'conditions' => array('Regulador.ptig' => 1, 'Regulador.id' => $regulador['Tig']['regulador_id']),
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
	function interStep7() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Aporte->recursive = -1;
				$result = $this->Aporte->find('first', array(
						'conditions' => array('Aporte.ptig' => 1, 'Aporte.id' => $_POST['id']),
						'fields' => array('Aporte.id', 'Aporte.name', 'Aporte.short', 'Aporte.description', 'Aporte.smallimage', 'Aporte.infra_link')
					));
				return(json_encode($result));
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	
	function selectorStep8() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$result = array();
				
				$alternativos = $this->Tig->find('all', array(
					'fields' => array('DISTINCT Tig.alternativo_id'),
					'conditions' => array('Tig.material_id' => $_POST['matid'], 'Tig.calibre_id' => $_POST['calibreid'], 'Tig.gase_id' => $_POST['gasid'],
					'Tig.maquina_id' => $_POST['maqid'], 'Tig.aporte_id' => $_POST['apoid'], 'Tig.antorcha_id' => $_POST['antoid'], 'Tig.regulador_id' => $_POST['id']),
					'order' => array('Tig.alternativo_id ASC')
				));
				
				$this->Alternativo->recursive = -1;
				
				foreach($alternativos as $alternativo) {
					$hold = $this->Alternativo->find('first', array(
						'conditions' => array('Alternativo.ptig' => 1, 'Alternativo.id' => $alternativo['Tig']['alternativo_id']),
						'fields' => array('Alternativo.id', 'Alternativo.name', 'Alternativo.description', 'Alternativo.shortdescription', 'Alternativo.smallimage')
					));
					array_push($result,$hold);
				}
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	function interStep8() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Regulador->recursive = -1;
				$result = $this->Regulador->find('first', array(
						'conditions' => array('Regulador.ptig' => 1, 'Regulador.id' => $_POST['id']),
						'fields' => array('Regulador.id', 'Regulador.name', 'Regulador.short', 'Regulador.description', 'Regulador.smallimage', 'Regulador.infra_link')
					));
				return(json_encode($result));
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	
	function selectorStep9() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$result = array();
				
				$this->Proteccione->recursive = 1;
				
				$this->Proteccione->unbindModel( array('belongsTo' => array('Fullitem', 'User') ) );
				
				$result = $this->Proteccione->find('all', array(
					'conditions' => array('Proteccione.ptig' => 1),
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
	
	function interStep9() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Alternativo->recursive = -1;
				$result = $this->Alternativo->find('first', array(
						'conditions' => array('Alternativo.ptig' => 1, 'Alternativo.id' => $_POST['id']),
						'fields' => array('Alternativo.id', 'Alternativo.name', 'Alternativo.short', 'Alternativo.description', 'Alternativo.smallimage', 'Alternativo.infra_link')
					));
				return(json_encode($result));
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
		
	
function diagram() {
	$admin = parent::checkSession($_SERVER['REQUEST_URI']);
	$this->set('title_for_layout','INFRA - MIG Diagramas');
	if($admin['admin'] == 1) {
		
		
		
	}
}


function add() {
	$admin = parent::checkSession($_SERVER['REQUEST_URI']);
	$this->set('title_for_layout','INFRA - TIG Nueva Selección');
	if($admin['admin'] == 1) {
		
		$this->Material->recursive = -1;
		
		$materials = $this->Material->find('list', array(
		'conditions' => array('Material.ptig' => 1),
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
				
					$search = $this->Tig->find('first', array(
						'conditions' => array(
						'material_id' => $_POST['st1'],
						'calibre_id' => $_POST['st2'],
						'ccalidade_id' => $_POST['st31'],
						'gase_id' => $_POST['st3'],
						'maquina_id' => $_POST['st4'],
						'antorcha_id' => $_POST['st5'],
						'tungsteno_id' => $_POST['st61'],
						'aporte_id' => $_POST['st6'],
						'regulador_id' => $_POST['st7'],
						'alternativo_id' => $_POST['st8']
						)
					));
					
					if(!$search) {
					
						$this->data = array('Tig' => array(
							'material_id' => $_POST['st1'],
							'calibre_id' => $_POST['st2'],
							'ccalidade_id' => $_POST['st31'],
							'gase_id' => $_POST['st3'],
							'maquina_id' => $_POST['st4'],
							'antorcha_id' => $_POST['st5'],
							'tungsteno_id' => $_POST['st61'],
							'aporte_id' => $_POST['st6'],
							'regulador_id' => $_POST['st7'],
							'alternativo_id' => $_POST['st8'],
							'creator_id' => $admin['iduser']
						));
						$this->Tig->create();
						if ($this->Tig->save($this->data)) {
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


function selector2($step = null, $mat = null, $matid = null, $cal = null, $calid = null, $gas = null, $gasid = null, $maq = null, $maqid = null, $ant = null, $antid = null, $apo = null, $apoid = null, $reg = null, $regid = null, $alt = null, $altids = null, $prot = null, $protids = null) {
	
	$valid = $this->Tig->find('first', array(
					'fields' => array('Tig.id'),
					'conditions' => array('Tig.material_id' => $matid, 'Tig.calibre_id' => $calid, 'Tig.gase_id' => $gasid,
					'Tig.maquina_id' => $maqid, 'Tig.antorcha_id' => $antid, 
					'Tig.aporte_id' => $apoid, 'Tig.regulador_id' => $regid)
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
					
		$this->Gase->recursive = -1;				
		$gas = $this->Gase->find('first', array(
						'conditions' => array('Gase.id' => $gasid)
					));
					
		$this->Maquina->recursive = -1;				
		$maquina = $this->Maquina->find('first', array(
						'conditions' => array('Maquina.id' => $maqid)
					));
					
		$this->Antorcha->recursive = -1;				
		$antorcha = $this->Antorcha->find('first', array(
						'conditions' => array('Antorcha.id' => $antid)
					));
					
		$this->Aporte->recursive = -1;				
		$aporte = $this->Aporte->find('first', array(
						'conditions' => array('Aporte.id' => $apoid)
					));
					
		$this->Regulador->recursive = -1;				
		$regulador = $this->Regulador->find('first', array(
						'conditions' => array('Regulador.id' => $regid)
					));
		
		$alternativos = array();
		
		$altids = str_replace('alts', '', $altids);
		$altid = explode('-', $altids);
		
		$this->Alternativo->recursive = -1;
		foreach($altid as $id) {
			if($id >= 1) {
				$hold = $this->Alternativo->find('first', array('conditions' => array('Alternativo.id' => $id) ) );
				array_push($alternativos,$hold);
			}
		}
					
		$this->set('title_for_layout','Proceso TIG - '.$maquina['Maquina']['name']);
		
		$ciudades = $this->Ciudade->find('list', array('conditions' => array('Ciudade.hidden' => 0), 'order' => array('Ciudade.name ASC') ) );
		
		$key = array_search("Internacional", $ciudades);
		unset($ciudades[$key]);
		$ciudades[$key] = 'Internacional';
		
		$this->set(compact('material', 'calibre', 'gas', 'maquina', 'alternativos', 'antorcha', 'aporte', 'regulador', 'protecciones', 'ciudades'));
	
	} else {
		$this->Session->setFlash(__('La selección que buscas no existe. Busca de nuevo.', true), 'flash_failure');
		$this->redirect('/proceso-tig');
	}
}
	

function steppdf($mat = null, $matid = null, $cal = null, $calid = null, $gas = null, $gasid = null, $maq = null, $maqid = null, $ant = null, $antid = null, $apo = null, $apoid = null, $reg = null, $regid = null, $alt = null, $altids = null, $prot = null, $protids = null) {
	
	App::import('Vendor', 'tcpdf/mytcpdf');
	
	$valid = $this->Tig->find('first', array(
					'fields' => array('Tig.id'),
					'conditions' => array('Tig.material_id' => $matid, 'Tig.calibre_id' => $calid, 'Tig.gase_id' => $gasid,
					'Tig.maquina_id' => $maqid, 'Tig.antorcha_id' => $antid, 
					'Tig.aporte_id' => $apoid, 'Tig.regulador_id' => $regid)
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
		
		// BUSCA ALTERNATIVOS
		$alternativos = array();
		
		$altids = str_replace('alts', '', $altids);
		$altid = explode('-', $altids);
		$alts = 'Ninguno';
		
		$this->Alternativo->recursive = -1;
		$i = 0;
		foreach($altid as $id) {
			if($id >= 1) {
				$hold = $this->Alternativo->find('first', array('conditions' => array('Alternativo.id' => $id) ) );
				if($i == 0) { 
					$alts = $hold['Alternativo']['name'].', '; $i++; 
				} else {
					$alts .= $hold['Alternativo']['name'].', ';
				}
				array_push($alternativos,$hold);
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
					
		$this->Antorcha->recursive = -1;				
		$antorcha = $this->Antorcha->find('first', array(
						'conditions' => array('Antorcha.id' => $antid)
					));
					
		$this->Aporte->recursive = -1;				
		$aporte = $this->Aporte->find('first', array(
						'conditions' => array('Aporte.id' => $apoid)
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
		$pdf->SetTitle('Selector TIG');
		$pdf->SetSubject('Información TIG');
		$pdf->SetKeywords('INFRA, TIG, selector, cotización');
		
		$pdf->SetInfra(PDF_FOOTER_TIG);
		
		// set default header data
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'SELECTOR DE PROCESOS - TIG      Para consultas técnicas, aclaraciones y sugerencias llame sin costo al:    01 800 712 25 25', PDF_HEADER_STRING);
		
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
		<h1>Información de productos para Proceso TIG</h1>
		<p><font style="color:#666666;">Material base: </font>'.$material['Material']['name'].' - '.$calibrename[0].'</p>
		<p><font style="color:#666666;">Gas de Protección: </font>'.$gas['Gase']['name'].'</p>
		<p><font style="color:#666666;">Máquina de Soldar: </font>'.$maquina['Maquina']['name'].'</p>
		<p><font style="color:#666666;">Antorcha: </font>'.$antorcha['Antorcha']['name'].'</p>
		<p><font style="color:#666666;">Material de Aporte: </font>'.$aporte['Aporte']['name'].'</p>
		<p><font style="color:#666666;">Regulador: </font>'.$regulador['Regulador']['name'].'</p>
		<p><font style="color:#666666;">Equipos Alternativos: </font>'.$alts.'</p>
		<p><font style="color:#666666;">Artículos de Protección: </font>'.$prots.'</p>
		';
		// Print text using writeHTMLCell()
		$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
		
		
		// PAGE 2
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
		
		
		// PAGE 5
		$pdf->AddPage();
	
		$content = strip_tags($antorcha['Antorcha']['description'], $allow); 
		$content = clean_inside_tags($content,$allow);
		$html = '
		<h1>Antorcha</h1>
		<p><img src="'.$antorcha['Antorcha']['smallimage'].'" /></p>
		<p>'.$antorcha['Antorcha']['name'].'</p>
		<p>'.$content.'</p>
		';
		$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
		
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
		
		// PAGE 7
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
		
		
		foreach ($alternativos as $alternativo) {
			$pdf->AddPage();
		
			$content = strip_tags($alternativo['Alternativo']['description'], $allow); 
			$content = clean_inside_tags($content,$allow);
			$html = '
			<h1>Equipos Alternativos</h1>
			<p><img src="'.$alternativo['Alternativo']['smallimage'].'" /></p>
			<p>'.$alternativo['Alternativo']['name'].'</p>
			<p>'.$content.'</p>
			';
			$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
		}
		
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
		$pdf->Output("Selector_TIG.pdf",'I');
		
		$this->layout = 'pdf'; //this will use the pdf.ctp layout 
        $this->render(); 
		
	} else {
		$this->Session->setFlash(__('La selección que buscas no existe. Busca de nuevo.', true), 'flash_failure');
		$this->redirect('/proceso-tig');
	}
	
	
}	
	
}

?>