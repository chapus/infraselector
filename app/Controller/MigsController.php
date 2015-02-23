<?php
class MigsController extends AppController {

	var $name = 'Migs';
	
	var $components = array('RequestHandler', 'Session', 'Email');
	
	var $uses = array('Mig', 'Material', 'Calibre', 'Gase', 'Aporte', 'Maquina', 'Microalambre', 'Antorcha', 'Regulador', 'Proteccione', 'Seccion', 'MigCalibreCalidadgase', 'MigCalidadgaseGase', 'Calidadgase', 'Ciudade');
	
	function s1() {
		$result = array();
		
		$mats = $this->Mig->find('all', array(
			'fields' => array('DISTINCT Mig.material_id'),
			'order' => array('Mig.material_id ASC')
		));
		
		$this->Material->recursive = -1;
		
		foreach($mats as $mat) {
			$hold = $this->Material->find('first', array(
				'conditions' => array('Material.pmig' => 1, 'Material.id' => $mat['Mig']['material_id']),
				'fields' => array('Material.id', 'Material.name'),
				'order' => 'Material.name ASC'
			));
			array_push($result,$hold);
		}
		
		return $result;
		/*
		return $this->Material->find('list', array(
		'conditions' => array('Material.pmig' => 1),
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
				'contain' => array('MigCalibre.name', 'MigCalibre.id'),
				'fields' => array('Material.short', 'Material.description', 'Material.infra_link'),
				'conditions' => array('Material.pmig' => 1, 'Material.id' => $_POST['id']),
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
		'conditions' => array('Calibre.pmig' => 1),
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
				'contain' => array('MigGase.codigo', 'MigGase.name', 'MigGase.id'),
				'fields' => array('Calibre.name', 'Calibre.short', 'Calibre.description', 'Calibre.infra_link'),
				'conditions' => array('Calibre.pmig' => 1, 'Calibre.id' => $_POST['id']),
				'order' => 'Calibre.name DESC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	function s3() {
		$this->Gase->recursive = -1;
		
		return $this->Gase->find('list', array(
		'conditions' => array('Gase.pmig' => 1),
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
				'contain' => array('MigMaquina.codigo', 'MigMaquina.name', 'MigMaquina.id'),
				'fields' => array('Gase.name', 'Gase.short', 'Gase.description', 'Gase.infra_link'),
				'conditions' => array('Gase.pmig' => 1, 'Gase.id' => $_POST['id']),
				'order' => 'Gase.name DESC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	
	
	function s4() {
		$this->Aporte->recursive = -1;
		
		return $this->Aporte->find('list', array(
		'conditions' => array('Aporte.pmig' => 1),
		'fields' => array('Aporte.id', 'Aporte.name'),
		'order' => 'Aporte.name ASC'));
	}
	
	function s4_info() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Aporte->recursive = -1;
				
				$this->Aporte->Behaviors->attach('Containable');
				
				$result = $this->Aporte->find('all', array(
				'contain' => array('MigRegulador.codigo', 'MigRegulador.name', 'MigRegulador.id'),
				'fields' => array('Aporte.short', 'Aporte.description', 'Aporte.infra_link'),
				'conditions' => array('Aporte.pmig' => 1, 'Aporte.id' => $_POST['id']),
				'order' => 'Aporte.name ASC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	
	
	function s5() {
		$this->Maquina->recursive = -1;
		
		return $this->Maquina->find('list', array(
		'conditions' => array('Maquina.pmig' => 1),
		'fields' => array('Maquina.id', 'Maquina.name'),
		'order' => 'Maquina.name ASC'));
	}
	
	function test() {
	
		$this->Maquina->recursive = -1;
		
		$this->Maquina->Behaviors->attach('Containable');
		
			
		$this->Maquina->bindModel(array('hasOne' => array(
			'CalibreMaquina' => array(
				'foreignKey' => false
			),
			'GaseMaquina' => array(
				'foreignKey' => false
			)
		) ) );
		
		
		$maquinas = $this->Maquina->find('all', array(
		'contain' => array(

			'CalibreMaquina' => array(
				//'fields' => array('CalibreMaquina.maquina_id'),
				'conditions' => array('CalibreMaquina.maquina_id' => 'Maquina.id', 'CalibreMaquina.calibre_id' => 6)
			),
			'GaseMaquina' => array(
				//'fields' => array('Gase.id'),
				'conditions' => array('GaseMaquina.maquina_id' => 'Maquina.id', 'GaseMaquina.gase_id' => 1)
			)
		),
		'conditions' => array('Maquina.pmig' => 1),
		'fields' => array('Maquina.id', 'Maquina.name'),
		'group' => array('Maquina.name'),
		'order' => 'Maquina.id ASC'));
		
		$test1 = $this->Maquina->CalibreMaquina->find('all', array(
				'conditions' => array('calibre_id' => 6)
		)
		);
		
		
		$this->set(compact('maquinas', 'test1'));
		
	}
	
	function s5_info() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Maquina->recursive = -1;
				
				$this->Maquina->Behaviors->attach('Containable');
				
				$result = $this->Maquina->find('all', array(
				'contain' => array('MigMicroalambre.codigo', 'MigMicroalambre.name', 'MigMicroalambre.id'),
				'fields' => array('Maquina.short', 'Maquina.description', 'Maquina.infra_link'),
				'conditions' => array('Maquina.pmig' => 1, 'Maquina.id' => $_POST['id']),
				'order' => 'Maquina.name ASC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	
	
	function s6() {
		$this->Microalambre->recursive = -1;
		
		return $this->Microalambre->find('list', array(
		'conditions' => array('Microalambre.pmig' => 1),
		'fields' => array('Microalambre.id', 'Microalambre.name'),
		'order' => 'Microalambre.name ASC'));
	}
	
	function s6_info() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Microalambre->recursive = -1;
				
				$this->Microalambre->Behaviors->attach('Containable');
				
				$result = $this->Microalambre->find('all', array(
				'contain' => array('MigAntorcha.codigo', 'MigAntorcha.name', 'MigAntorcha.id'),
				'fields' => array('Microalambre.short', 'Microalambre.description', 'Microalambre.infra_link'),
				'conditions' => array('Microalambre.pmig' => 1, 'Microalambre.id' => $_POST['id']),
				'order' => 'Microalambre.name ASC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	
	
	function s7() {
		$this->Antorcha->recursive = -1;
		
		return $this->Antorcha->find('list', array(
		'conditions' => array('Antorcha.pmig' => 1),
		'fields' => array('Antorcha.id', 'Antorcha.name'),
		'order' => 'Antorcha.name ASC'));
	}
	
	function s7_info() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Antorcha->recursive = -1;
				
				$this->Antorcha->Behaviors->attach('Containable');
				
				$result = $this->Antorcha->find('all', array(
				'contain' => array('MigAporte.codigo', 'MigAporte.name', 'MigAporte.id'),
				'fields' => array('Antorcha.short', 'Antorcha.description', 'Antorcha.infra_link'),
				'conditions' => array('Antorcha.pmig' => 1, 'Antorcha.id' => $_POST['id']),
				'order' => 'Antorcha.name ASC'));
				
				return(json_encode($result));
				
			}
		}
		Configure::write('debug', 0);
		exit();	
	}
	
	
	
	function s8() {
		$this->Regulador->recursive = -1;
		
		return $this->Regulador->find('list', array(
		'conditions' => array('Regulador.pmig' => 1),
		'fields' => array('Regulador.id', 'Regulador.name'),
		'order' => 'Regulador.name ASC'));
	}
	
	function s8_info() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Regulador->recursive = -1;
				
				$this->Regulador->Behaviors->attach('Containable');
				
				$result = $this->Regulador->find('all', array(
				'contain' => array('MigProteccione.name', 'MigProteccione.id'),
				'fields' => array('Regulador.short', 'Regulador.description', 'Regulador.infra_link'),
				'conditions' => array('Regulador.pmig' => 1, 'Regulador.id' => $_POST['id']),
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
		'conditions' => array('Proteccione.pmig' => 1),
		'fields' => array('Proteccione.id', 'Proteccione.name'),
		'order' => 'Proteccione.name ASC'));
	}
	
	function s9_info() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Proteccione->recursive = -1;
				
				$result = $this->Proteccione->find('all', array(
				'fields' => array('Proteccione.short', 'Proteccione.description', 'Proteccione.infra_link'),
				'conditions' => array('Proteccione.pmig' => 1, 'Proteccione.id' => $_POST['id']),
				'order' => 'Proteccione.name ASC'));
				
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
				
				$calibres = $this->Mig->find('all', array(
					'fields' => array('DISTINCT Mig.calibre_id'),
					'conditions' => array('Mig.material_id' => $_POST['id']),
					'order' => array('Mig.calibre_id ASC'), 
					'cacher' => true
				));
				
				$this->Calibre->recursive = -1;
				
				foreach($calibres as $calibre) {
					$hold = $this->Calibre->find('first', array(
						'conditions' => array('Calibre.pmig' => 1, 'Calibre.id' => $calibre['Mig']['calibre_id']),
						'fields' => array('Calibre.short', 'Calibre.id', 'Calibre.name'), 
						'cacher' => true
					));
					array_push($result,$hold);
				}
				
				array_multisort(array_values($result), SORT_DESC, array_keys($result), SORT_DESC, $result);
				//asort($result);
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
						'conditions' => array('Material.pmig' => 1, 'Material.id' => $_POST['id']),
						'fields' => array('Material.id', 'Material.name', 'Material.short', 'Material.description', 'Material.smallimage', 'Material.infra_link'), 
						'cacher' => true
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
				
				$gases = $this->Mig->find('all', array(
					'fields' => array('DISTINCT Mig.gase_id'),
					'conditions' => array('Mig.material_id' => $_POST['matid'], 'Mig.calibre_id' => $_POST['id']),
					'order' => array('Mig.gase_id ASC'), 
					'cacher' => true
				));
				
				
				$this->Gase->recursive = -1;
				$this->MigCalibreCalidadgase->recursive = -1;
				
				$c_calibre = $this->MigCalibreCalidadgase->find('all', array('conditions' => array('MigCalibreCalidadgase.calibre_id' => $_POST['id']) ) );
				
				foreach($gases as $gas) {
					foreach($c_calibre as $c1) {
						$c_gase = $this->MigCalidadgaseGase->find('all', array('conditions' => array('MigCalidadgaseGase.gase_id' => $gas['Mig']['gase_id']) ) );
						foreach($c_gase as $c2) {
							if($c1['MigCalibreCalidadgase']['calidadgase_id'] == $c2['MigCalidadgaseGase']['calidadgase_id']) {
								$c_calidad = $this->Calidadgase->find('first', array('conditions' => array('Calidadgase.id' => $c2['MigCalidadgaseGase']['calidadgase_id']), 
												'cacher' => true ) );
							}
						}
					}
					
					$hold = $this->Gase->find('first', array(
						'conditions' => array('Gase.pmig' => 1, 'Gase.id' => $gas['Mig']['gase_id']),
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
						'conditions' => array('Calibre.pmig' => 1, 'Calibre.id' => $_POST['id']),
						'fields' => array('Calibre.id', 'Calibre.name', 'Calibre.short', 'Calibre.description', 'Calibre.smallimage', 'Calibre.infra_link'), 
						'cacher' => true
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
				
				$maquinas = $this->Mig->find('all', array(
					'fields' => array('DISTINCT Mig.maquina_id'),
					'conditions' => array('Mig.material_id' => $_POST['matid'], 'Mig.calibre_id' => $_POST['calibreid'], 'Mig.gase_id' => $_POST['id']),
					'order' => array('Mig.maquina_id ASC'), 
					'cacher' => true
				));
				
				$this->Maquina->recursive = -1;
				$this->Maquina->Behaviors->attach('Containable');
				foreach($maquinas as $maquina) {
					$hold = $this->Maquina->find('first', array(
						'conditions' => array('Maquina.pmig' => 1, 'Maquina.id' => $maquina['Mig']['maquina_id']),
						'contain' => array('Ciclomaquina'),
						'fields' => array('Maquina.id AS mid', 'Maquina.name', 'Maquina.short', 'Maquina.ciclomaquina_id', 'Ciclomaquina.id AS Cicloid', 'Ciclomaquina.name AS Cicloname'), 
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
						'conditions' => array('Gase.pmig' => 1, 'Gase.id' => $_POST['id']),
						'fields' => array('Gase.id', 'Gase.name', 'Gase.short', 'Gase.description', 'Gase.smallimage', 'Gase.infra_link'), 
						'cacher' => true
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
				
				$this->MigCalibreCalidadgase->recursive = -1;
				$c_calibre = $this->MigCalibreCalidadgase->find('all', array('conditions' => array('MigCalibreCalidadgase.calibre_id' => $_POST['calibreid']), 
					'cacher' => true ) );
				$c_gase = $this->MigCalidadgaseGase->find('all', array('conditions' => array('MigCalidadgaseGase.gase_id' => $_POST['gasid']), 
					'cacher' => true ) );
				
				$this->Calidadgase->recursive = -1;
				foreach($c_calibre as $c1) {
					foreach($c_gase as $c2) {
						if($c1['MigCalibreCalidadgase']['calidadgase_id'] == $c2['MigCalidadgaseGase']['calidadgase_id']) {
							$result = $this->Calidadgase->find('first', array('conditions' => array('Calidadgase.id' => $c2['MigCalidadgaseGase']['calidadgase_id']), 
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
	
	function selectorStep5() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$result = array();
				
				$microalambres = $this->Mig->find('all', array(
					'fields' => array('DISTINCT Mig.microalambre_id'),
					'conditions' => array('Mig.material_id' => $_POST['matid'], 'Mig.calibre_id' => $_POST['calibreid'], 'Mig.gase_id' => $_POST['gasid'],
					'Mig.maquina_id' => $_POST['id']),
					'order' => array('Mig.microalambre_id ASC'), 
					'cacher' => true
				));
				
				$this->Microalambre->recursive = -1;
				
				foreach($microalambres as $microalambre) {
					$hold = $this->Microalambre->find('first', array(
						'conditions' => array('Microalambre.pmig' => 1, 'Microalambre.id' => $microalambre['Mig']['microalambre_id']),
						'fields' => array('Microalambre.id', 'Microalambre.name', 'Microalambre.short'), 
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
	function interStep5() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Maquina->recursive = -1;
				$result = $this->Maquina->find('first', array(
						'conditions' => array('Maquina.pmig' => 1, 'Maquina.id' => $_POST['id']),
						'fields' => array('Maquina.id', 'Maquina.name', 'Maquina.short', 'Maquina.description', 'Maquina.smallimage', 'Maquina.infra_link'), 
						'cacher' => true
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
				
				$antorchas = $this->Mig->find('all', array(
					'fields' => array('DISTINCT Mig.antorcha_id'),
					'conditions' => array('Mig.material_id' => $_POST['matid'], 'Mig.calibre_id' => $_POST['calibreid'], 'Mig.gase_id' => $_POST['gasid'],
					'Mig.maquina_id' => $_POST['maqid'], 'Mig.microalambre_id' => $_POST['id']),
					'order' => array('Mig.antorcha_id ASC'), 
					'cacher' => true
				));
				
				$this->Antorcha->recursive = -1;
				
				foreach($antorchas as $antorcha) {
					$hold = $this->Antorcha->find('first', array(
						'conditions' => array('Antorcha.pmig' => 1, 'Antorcha.id' => $antorcha['Mig']['antorcha_id']),
						'fields' => array('Antorcha.id', 'Antorcha.name'), 
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
	function interStep6() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Microalambre->recursive = -1;
				$result = $this->Microalambre->find('first', array(
						'conditions' => array('Microalambre.pmig' => 1, 'Microalambre.id' => $_POST['id']),
						'fields' => array('Microalambre.id', 'Microalambre.name', 'Microalambre.short', 'Microalambre.description', 'Microalambre.smallimage', 'Microalambre.infra_link'), 
						'cacher' => true
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
				
				$aportes = $this->Mig->find('all', array(
					'fields' => array('DISTINCT Mig.aporte_id'),
					'conditions' => array('Mig.material_id' => $_POST['matid'], 'Mig.calibre_id' => $_POST['calibreid'], 'Mig.gase_id' => $_POST['gasid'],
					'Mig.maquina_id' => $_POST['maqid'], 'Mig.microalambre_id' => $_POST['microid'], 'Mig.antorcha_id' => $_POST['id']),
					'order' => array('Mig.aporte_id ASC'), 
					'cacher' => true
				));
				
				$this->Aporte->recursive = -1;
				
				foreach($aportes as $aporte) {
					$hold = $this->Aporte->find('first', array(
						'conditions' => array('Aporte.pmig' => 1, 'Aporte.id' => $aporte['Mig']['aporte_id']),
						'fields' => array('Aporte.id', 'Aporte.name'), 
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
	function interStep7() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Antorcha->recursive = -1;
				$result = $this->Antorcha->find('first', array(
						'conditions' => array('Antorcha.pmig' => 1, 'Antorcha.id' => $_POST['id']),
						'fields' => array('Antorcha.id', 'Antorcha.name', 'Antorcha.short', 'Antorcha.description', 'Antorcha.smallimage', 'Antorcha.infra_link'), 
						'cacher' => true
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
				
				$reguladores = $this->Mig->find('all', array(
					'fields' => array('DISTINCT Mig.regulador_id'),
					'conditions' => array('Mig.material_id' => $_POST['matid'], 'Mig.calibre_id' => $_POST['calibreid'], 'Mig.gase_id' => $_POST['gasid'],
					'Mig.maquina_id' => $_POST['maqid'], 'Mig.microalambre_id' => $_POST['microid'], 'Mig.antorcha_id' => $_POST['antoid'], 'Mig.aporte_id' => $_POST['id']),
					'order' => array('Mig.regulador_id ASC'), 
					'cacher' => true
				));
				
				$this->Regulador->recursive = -1;
				
				foreach($reguladores as $regulador) {
					$hold = $this->Regulador->find('first', array(
						'conditions' => array('Regulador.pmig' => 1, 'Regulador.id' => $regulador['Mig']['regulador_id']),
						'fields' => array('Regulador.id', 'Regulador.name'), 
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
	function interStep8() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->autoRender = false;
				
				$this->Aporte->recursive = -1;
				$result = $this->Aporte->find('first', array(
						'conditions' => array('Aporte.pmig' => 1, 'Aporte.id' => $_POST['id']),
						'fields' => array('Aporte.id', 'Aporte.name', 'Aporte.short', 'Aporte.description', 'Aporte.smallimage', 'Aporte.infra_link'), 
						'cacher' => true
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
					'conditions' => array('Proteccione.pmig' => 1),
					'order' => array('Proteccione.name ASC'), 
					'cacher' => true
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
					'order' => array('Seccion.order ASC'), 
					'cacher' => true
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
				
				$this->Regulador->recursive = -1;
				$result = $this->Regulador->find('first', array(
						'conditions' => array('Regulador.pmig' => 1, 'Regulador.id' => $_POST['id']),
						'fields' => array('Regulador.id', 'Regulador.name', 'Regulador.short', 'Regulador.description', 'Regulador.smallimage', 'Regulador.infra_link'), 
						'cacher' => true
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
	$this->set('title_for_layout','INFRA - MIG Nueva Selección');
	if($admin['admin'] == 1) {
		
		$this->Material->recursive = -1;
		
		$materials = $this->Material->find('list', array(
		'conditions' => array('Material.pmig' => 1),
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
				
				$search = $this->Mig->find('first', array(
					'conditions' => array(
					'material_id' => $_POST['st1'],
					'calibre_id' => $_POST['st2'],
					'gase_id' => $_POST['st3'],
					'maquina_id' => $_POST['st4'],
					'microalambre_id' => $_POST['st5'],
					'antorcha_id' => $_POST['st6'],
					'aporte_id' => $_POST['st7'],
					'regulador_id' => $_POST['st8']
					)
				));
				
				if(!$search) {
				
					$this->data = array('Mig' => array(
						'material_id' => $_POST['st1'],
						'calibre_id' => $_POST['st2'],
						'gase_id' => $_POST['st3'],
						'maquina_id' => $_POST['st4'],
						'microalambre_id' => $_POST['st5'],
						'antorcha_id' => $_POST['st6'],
						'aporte_id' => $_POST['st7'],
						'regulador_id' => $_POST['st8'],
						'creator_id' => $admin['iduser']
					));
					
					if ($this->Mig->save($this->data)) {
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


function selector2($step = null, $mat = null, $matid = null, $cal = null, $calid = null, $gas = null, $gasid = null, $maq = null, $maqid = null, $micro = null, $microid = null, $ant = null, $antid = null, $apo = null, $apoid = null, $reg = null, $regid = null, $prot = null, $protids = null) {
	
	
	$valid = $this->Mig->find('first', array(
					'fields' => array('Mig.id'),
					'conditions' => array('Mig.material_id' => $matid, 'Mig.calibre_id' => $calid, 'Mig.gase_id' => $gasid,
					'Mig.maquina_id' => $maqid, 'Mig.microalambre_id' => $microid, 'Mig.antorcha_id' => $antid, 
					'Mig.aporte_id' => $apoid, 'Mig.regulador_id' => $regid)
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
					
		$this->Microalambre->recursive = -1;				
		$microalambre = $this->Microalambre->find('first', array(
						'conditions' => array('Microalambre.id' => $microid)
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
					
		$this->set('title_for_layout','Proceso MIG - '.$maquina['Maquina']['name']);
		
		
		$ciudades = $this->Ciudade->find('list', array('conditions' => array('Ciudade.hidden' => 0), 'order' => array('Ciudade.name ASC') ) );
		
		$key = array_search("Internacional", $ciudades);
		unset($ciudades[$key]);
		$ciudades[$key] = 'Internacional';
		/*
		$pos = array_search("Internacional", $ciudades);
		if($pos !== FALSE){
		  $item = $ciudades[$pos];
		  unset($ciudades[$pos]);
		  array_unshift($ciudades, $item);
		}
		*/
		
		$this->set(compact('material', 'calibre', 'gas', 'maquina', 'microalambre', 'antorcha', 'aporte', 'regulador', 'protecciones', 'ciudades'));
	
	} else {
		$this->Session->setFlash(__('La selección que buscas no existe. Busca de nuevo.', true), 'flash_failure');
		$this->redirect('/proceso-mig');
	}
}

function steppdf($mat = null, $matid = null, $cal = null, $calid = null, $gas = null, $gasid = null, $maq = null, $maqid = null, $micro = null, $microid = null, $ant = null, $antid = null, $apo = null, $apoid = null, $reg = null, $regid = null, $prot = null, $protids = null) {
	
	App::import('Vendor', 'tcpdf/mytcpdf');
	
	$valid = $this->Mig->find('first', array(
					'fields' => array('Mig.id'),
					'conditions' => array('Mig.material_id' => $matid, 'Mig.calibre_id' => $calid, 'Mig.gase_id' => $gasid,
					'Mig.maquina_id' => $maqid, 'Mig.microalambre_id' => $microid, 'Mig.antorcha_id' => $antid, 
					'Mig.aporte_id' => $apoid, 'Mig.regulador_id' => $regid)
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
					
		$this->Gase->recursive = -1;				
		$gas = $this->Gase->find('first', array(
						'conditions' => array('Gase.id' => $gasid)
					));
					
		$this->Maquina->recursive = -1;				
		$maquina = $this->Maquina->find('first', array(
						'conditions' => array('Maquina.id' => $maqid)
					));
		//debug($maquina);
		$this->Microalambre->recursive = -1;				
		$microalambre = $this->Microalambre->find('first', array(
						'conditions' => array('Microalambre.id' => $microid)
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
		$micro = '';
		if($microalambre['Microalambre']['name'] != "N/A") {
			$micro = '<p><font style="color:#666666;">Alimentador de Microalambre: </font>'.$microalambre['Microalambre']['name'].'</p>';
		}
		
		
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
		$pdf->SetTitle('Selector MIG');
		$pdf->SetSubject('Información MIG');
		$pdf->SetKeywords('INFRA, MIG, selector, cotización');
		
		$pdf->SetInfra(PDF_FOOTER_MIG);
		
		// set default header data
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'SELECTOR DE PROCESOS - MIG      Para consultas técnicas, aclaraciones y sugerencias llame sin costo al:    01 800 712 25 25', PDF_HEADER_STRING);
		
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
		$pdf->SetFont('dejavusans', '', 14, '', true);
		
		// Add a page
		// This method has several options, check the source code documentation for more information.
		$pdf->AddPage();
		
		//$pdf->SetFillColor(255, 255, 127);
		//$pdf->MultiCell(55, 5, '<i>Material base: '.$material['Material']['name'].' - '.$calibrename[0].'</i>', 1, 'L', 1, 0, '', '', true);
		// Set some content to print
		$html = '
		<h1>Información de productos para Proceso MIG</h1>
		<p><font style="color:#666666;">Material base: </font>'.$material['Material']['name'].' - '.$calibrename[0].'</p>
		<p><font style="color:#666666;">Gas de Protección: </font>'.$gas['Gase']['name'].'</p>
		<p><font style="color:#666666;">Máquina de Soldar: </font>'.$maquina['Maquina']['name'].'</p>'.$micro.'
		<p><font style="color:#666666;">Antorcha: </font>'.$antorcha['Antorcha']['name'].'</p>
		<p><font style="color:#666666;">Material de Aporte: </font>'.$aporte['Aporte']['name'].'</p>
		<p><font style="color:#666666;">Regulador: </font>'.$regulador['Regulador']['name'].'</p>
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
		//$content = removeemptytags($content);
		$html = '
		<h1>Máquina de Soldar</h1>
		<p><img src="'.$maquina['Maquina']['smallimage'].'" /></p>
		<p>'.$maquina['Maquina']['name'].'</p>
		<p>'.$content.'</p>
		';
		$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
		
		// PAGE 4
		if($micro != '') {
			$pdf->AddPage();
		
			$content = strip_tags($microalambre['Microalambre']['description'], $allow); 
			$content = clean_inside_tags($content,$allow);
			$html = '
			<h1>Alimentador de Microalambre</h1>
			<p><img src="'.$microalambre['Microalambre']['smallimage'].'" /></p>
			<p>'.$microalambre['Microalambre']['name'].'</p>
			<p>'.$content.'</p>
			';
			$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
		}
		
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
		$pdf->Output("Selector_MIG.pdf",'I');
		
		$this->layout = 'pdf'; //this will use the pdf.ctp layout 
        $this->render(); 
		
	} else {
		$this->Session->setFlash(__('La selección que buscas no existe. Busca de nuevo.', true), 'flash_failure');
		$this->redirect('/proceso-mig');
	}
	
	
}
	
	
	
}

?>