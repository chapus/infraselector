<?php
class GasesController extends AppController {

	var $name = 'Gases';
	
	var $paginate = array(
		'Gase' => array('limit' => 25, 'contain' => array('Calibre', 'Aporte'), 'order' => array('Gase.name' => 'asc') )
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
		$this->set('title_for_layout','INFRA - Gases de Protección');
		$this->Prg->commonProcess();
		$this->Gase->recursive = -1;
		
		$this->paginate['Gase'] = array('conditions' => $this->Gase->parseCriteria($this->passedArgs));
		$this->set('data', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid gase', true));
			$this->redirect(array('action' => 'index'));
		}
		$gase = $this->Gase->find('first', array('conditions' => array(
			'Gase.id' => $id
		) ) );
		$this->set('title_for_layout','Gases de Protección - '.$gase['Gase']['name']);
		$this->set(compact('gase'));
	}

	function add() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Nuevo Gas de Protección');
		if($admin['admin'] == 1) {
				
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->data['Gase']['created'] = $date;
					
				$smallimage = $this->uploadFiles('img/gases/thumb', $this->data['Gase']['smallfile']);
				$image = $this->uploadFiles('img/gases', $this->data['Gase']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Gase']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Gase']['image'] = $image['urls'][0]; 
				} 
				
				$this->Gase->create();
				if ($this->Gase->save($this->data)) {
					$this->Session->setFlash(__('El Gas de Protección ha sido guardado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('El Gas de Protección no se pudo guardar, intenta más tarde', true), 'flash_failure');
				}
			}
			$migCalibres = $this->Gase->MigCalibre->find('list', array('conditions' => array('MigCalibre.pmig' => 1)) );
			$tigCalibres = $this->Gase->TigCalibre->find('list', array('conditions' => array('TigCalibre.ptig' => 1)) );
			$migMaquinas = $this->Gase->MigMaquina->find('list', array('conditions' => array('MigMaquina.pmig' => 1)) );
			$tigMaquinas = $this->Gase->TigMaquina->find('list', array('conditions' => array('TigMaquina.ptig' => 1)) );
			$pacMaquinas = $this->Gase->PacMaquina->find('list', array('conditions' => array('PacMaquina.ppac' => 1)) );
			$pacReguladors = $this->Gase->PacRegulador->find('list', array('conditions' => array('PacRegulador.ppac' => 1)) );
			$this->set(compact('migCalibres', 'tigCalibres', 'migMaquinas', 'tigMaquinas', 'pacMaquinas', 'pacReguladors'));
		}
	}

	function edit($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Editar Gas de Protección');
		if($admin['admin'] == 1) {
			
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Gas de Protección inválido', true), 'flash_failure');
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->data['Gase']['modified'] = $date;
				
				$smallimage = $this->uploadFiles('img/gases/thumb', $this->data['Gase']['smallfile']);
				$image = $this->uploadFiles('img/gases', $this->data['Gase']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Gase']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Gase']['image'] = $image['urls'][0]; 
				} 
				
				if ($this->Gase->save($this->data)) {
					$this->Session->setFlash(__('El Gas de Protección ha sido editado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('El Gas de Protección no se pudo editar, intenta más tarde', true), 'flash_failure');
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Gase->read(null, $id);
			}
			$migCalibres = $this->Gase->MigCalibre->find('list', array('conditions' => array('MigCalibre.pmig' => 1)) );
			$tigCalibres = $this->Gase->TigCalibre->find('list', array('conditions' => array('TigCalibre.ptig' => 1)) );
			$migMaquinas = $this->Gase->MigMaquina->find('list', array('conditions' => array('MigMaquina.pmig' => 1)) );
			$tigMaquinas = $this->Gase->TigMaquina->find('list', array('conditions' => array('TigMaquina.ptig' => 1)) );
			$pacMaquinas = $this->Gase->PacMaquina->find('list', array('conditions' => array('PacMaquina.ppac' => 1)) );
			$pacReguladors = $this->Gase->PacRegulador->find('list', array('conditions' => array('PacRegulador.ppac' => 1)) );
			$this->set(compact('migCalibres', 'tigCalibres', 'migMaquinas', 'tigMaquinas', 'pacMaquinas', 'pacReguladors'));
			
		}
	}
	
	function viewall() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Gases de Protección');
		if($admin['admin'] == 1) {
			
			$this->Prg->commonProcess();
			$this->Gase->recursive = -1;
			
			$this->paginate['Gase'] = array('conditions' => $this->Gase->parseCriteria($this->passedArgs));
			$this->set('data', $this->paginate());
		}
	}
	
	function viewimage($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Imagen de Gas de Protección');
		$this->layout = 'ajax';
		if($admin['admin'] == 1) {
			
			if($id) {
				$this->Gase->recursive = -1;
				$image = $this->Gase->find('first', array(
					'fields' => array('Gase.image'),
					'conditions' => array('Gase.id' => $id) 
				));
					
				$this->set(compact('image'));
			}
		}
	}
	
	function getlist() {
		$this->Gase->recursive = -1;
		
		return $this->Gase->find('all', array(
		'fields' => array('Gase.id', 'Gase.name'),
		'conditions' => array('Gase.pmig' => 1),
		'order' => 'Gase.name DESC', 'limit' => 10));
	}
	
	function getTiglist() {
		$this->Gase->recursive = -1;
		
		return $this->Gase->find('all', array(
		'fields' => array('Gase.id', 'Gase.name'),
		'conditions' => array('Gase.ptig' => 1),
		'order' => 'Gase.name DESC', 'limit' => 10));
	}

}
?>