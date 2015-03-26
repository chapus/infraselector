<?php
class MaquinasController extends AppController {

	var $name = 'Maquinas';
	
	var $paginate = array(
		'Maquina' => array('limit' => 25, 'order' => array('Maquina.name' => 'asc') )
	);
	
	public $components = array('Search.Prg');
	
	public $presetVars = array(
			array('field' => 'name', 'type' => 'value'),
			array('field' => 'short', 'type' => 'value'),
			array('field' => 'codigo', 'type' => 'value'),
			array('field' => 'description', 'type' => 'value'),
			array('field' => 'pmig', 'type' => 'int'),
			array('field' => 'ptig', 'type' => 'int'),
			array('field' => 'psmaw', 'type' => 'int'),
			array('field' => 'ppac', 'type' => 'int')
			);

	function index() {
		$this->set('title_for_layout','INFRA - Máquinas de Soldar');
		$this->Prg->commonProcess();
		$this->Maquina->recursive = -1;
		
		$this->paginate['Maquina'] = array('conditions' => $this->Maquina->parseCriteria($this->passedArgs));
		$this->set('data', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid maquina', true));
			$this->redirect(array('action' => 'index'));
		}
		$maquina = $this->Maquina->find('first', array('conditions' => array(
			'Maquina.id' => $id
		) ) );
		$this->set('title_for_layout','Máquina de Soldar - '.$maquina['Maquina']['name']);
		$this->set(compact('maquina'));
	}

	function add() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Nueva Máquina de Soldar');
		if($admin['admin'] == 1) {
			
			if (!empty($this->request->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->request->data['Maquina']['created'] = $date;
				
				$smallimage = $this->uploadFiles('img/maquinas/thumb', $this->data['Maquina']['smallfile']);
				$image = $this->uploadFiles('img/maquinas', $this->data['Maquina']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Maquina']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Maquina']['image'] = $image['urls'][0]; 
				} 
				
				$this->Maquina->create();
				if ($this->Maquina->save($this->data)) {
					$this->Session->setFlash(__('La Máquina de Soldar ha sido guardada con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('La Máquina de Soldar no se puedo guardar, intenta más tarde', true), 'flash_failure');
				}
			}
			$smawCalibres = $this->Maquina->SmawCalibre->find('list', array('conditions' => array('SmawCalibre.psmaw' => 1)) );
			$smawAportes = $this->Maquina->SmawAporte->find('list', array('conditions' => array('SmawAporte.psmaw' => 1)) );
			$migGases = $this->Maquina->MigGase->find('list', array('conditions' => array('MigGase.pmig' => 1)) );
			$tigGases = $this->Maquina->TigGase->find('list', array('conditions' => array('TigGase.ptig' => 1)) );
			$tigAntorchas = $this->Maquina->TigAntorcha->find('list', array('conditions' => array('TigAntorcha.ptig' => 1)) );
			$migMicroalambres = $this->Maquina->MigMicroalambre->find('list', array('conditions' => array('MigMicroalambre.pmig' => 1)) );
			$ciclomaquinas = $this->Maquina->Ciclomaquina->find('list');
			$pacCalibres = $this->Maquina->PacCalibre->find('list', array('conditions' => array('PacCalibre.ppac' => 1)) );
			$pacGases = $this->Maquina->PacGase->find('list', array('conditions' => array('PacGase.ppac' => 1)) );
			$this->set(compact('smawCalibres', 'smawAportes', 'migGases', 'tigGases', 'tigAntorchas', 'migMicroalambres', 'pacCalibres', 'pacGases', 'ciclomaquinas'));
			
		}
	}

	function edit($id = null, $url = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Editar Máquina de Soldar');
		if($admin['admin'] == 1) {
		
			if (!$id && empty($this->request->data)) {
				$this->Session->setFlash(__('Máquina de Soldar inválida', true), 'flash_failure');
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->request->data)) {
				
				$smallimage = $this->uploadFiles('img/maquinas/thumb', $this->data['Maquina']['smallfile']);
				$image = $this->uploadFiles('img/maquinas', $this->data['Maquina']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->request->data['Maquina']['smallimage'] = $smallimage['urls'][0]; 
				}
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->request->data['Maquina']['image'] = $image['urls'][0]; 
				}
				
				if ($this->Maquina->save($this->data)) {
					$this->Session->setFlash(__('La Máquina de Soldar ha sido editada con éxito', true), 'flash_success');
					$this->redirect('/'.$this->data['Maquina']['url']);
				} else {
					$this->Session->setFlash(__('La Máquina de Soldar no se puedo editar, intenta más tarde', true), 'flash_failure');
				}
			}
			if (empty($this->request->data)) {
				$this->request->data = $this->Maquina->read(null, $id);
			}
			$smawCalibres = $this->Maquina->SmawCalibre->find('list', array('conditions' => array('SmawCalibre.psmaw' => 1)) );
			$smawAportes = $this->Maquina->SmawAporte->find('list', array('conditions' => array('SmawAporte.psmaw' => 1)) );
			$migGases = $this->Maquina->MigGase->find('list', array('conditions' => array('MigGase.pmig' => 1)) );
			$tigGases = $this->Maquina->TigGase->find('list', array('conditions' => array('TigGase.ptig' => 1)) );
			$tigAntorchas = $this->Maquina->TigAntorcha->find('list', array('conditions' => array('TigAntorcha.ptig' => 1)) );
			$migMicroalambres = $this->Maquina->MigMicroalambre->find('list', array('conditions' => array('MigMicroalambre.pmig' => 1)) );
			$ciclomaquinas = $this->Maquina->Ciclomaquina->find('list');
			$pacCalibres = $this->Maquina->PacCalibre->find('list', array('conditions' => array('PacCalibre.ppac' => 1)) );
			$pacGases = $this->Maquina->PacGase->find('list', array('conditions' => array('PacGase.ppac' => 1)) );
			$this->set(compact('smawCalibres', 'smawAportes', 'migGases', 'tigGases', 'tigAntorchas', 'migMicroalambres', 'pacCalibres', 'pacGases', 'ciclomaquinas', 'url'));
			
		}
	}
	
	function viewall() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Máquinas de Soldar');
		if($admin['admin'] == 1) {
			
			$this->Prg->commonProcess();
			$this->Maquina->recursive = -1;
			
			$this->paginate['Maquina'] = array('conditions' => $this->Maquina->parseCriteria($this->passedArgs));
			$this->set('data', $this->paginate());
		}
	}
	
	function viewimage($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Imagen de Máquina');
		$this->layout = 'ajax';
		if($admin['admin'] == 1) {
			
			if($id) {
				$this->Maquina->recursive = -1;
				$image = $this->Maquina->find('first', array(
					'fields' => array('Maquina.image'),
					'conditions' => array('Maquina.id' => $id) 
				));
					
				$this->set(compact('image'));
			}
		}
	}
	
	function getlist() {
		$this->Maquina->recursive = -1;
		
		return $this->Maquina->find('all', array(
		'fields' => array('Maquina.id', 'Maquina.name'),
		'order' => 'Maquina.name DESC', 'limit' => 10));
	}

}
?>