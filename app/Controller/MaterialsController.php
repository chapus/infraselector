<?php
class MaterialsController extends AppController {

	var $name = 'Materials';
	
	var $paginate = array(
		'Material' => array('limit' => 25, 'contain' => array('Calibre'), 'order' => array('Material.name' => 'asc') )
	);
	
	public $components = array('Search.Prg');
	
	public $presetVars = array(
			array('field' => 'name', 'type' => 'value'),
			array('field' => 'short', 'type' => 'value'),
			array('field' => 'description', 'type' => 'value'),
			array('field' => 'pmig', 'type' => 'int'),
			array('field' => 'ptig', 'type' => 'int'),
			array('field' => 'psmaw', 'type' => 'int'),
			array('field' => 'ppac', 'type' => 'int')
			);

	function index() {
		$this->set('title_for_layout','INFRA - Materiales a Soldar');
		$this->Prg->commonProcess();
		$this->Material->recursive = -1;
		$this->paginate['Material'] = array('conditions' => $this->Material->parseCriteria($this->passedArgs));
		$this->set('data', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('El Material a Soldar no existe', true), 'flash_failure');
			$this->redirect(array('action' => 'index'));
		}
		if(!$this->Material->read(null, $id)) {
			$this->Session->setFlash(__('El Material a Soldar no existe', true), 'flash_failure');
			$this->redirect(array('action' => 'index'));
		}
		$material = $this->Material->find('first', array('conditions' => array(
			'Material.id' => $id
		) ) );
		$this->set('title_for_layout','Material a Soldar - '.$material['Material']['name']);
		$this->set(compact('material'));
	}

	function add() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Nuevo Material a Soldar');
		if($admin['admin'] == 1) {
			
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->data['Material']['created'] = $date;
				
				$smallimage = $this->uploadFiles('img/materials/thumb', $this->data['Material']['smallfile']);
				$image = $this->uploadFiles('img/materials', $this->data['Material']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Material']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Material']['image'] = $image['urls'][0]; 
				} 
				
				$this->Material->create();
				if ($this->Material->save($this->data)) {
					$this->Session->setFlash(__('El material ha sido agregado al sistema.', true), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('El material no pudo ser guardado, intenta más tarde.', true), 'flash_failure');
				}
			}
		
		$smawCalibres = $this->Material->SmawCalibre->find('list', array('conditions' => array('SmawCalibre.psmaw' => 1)) );
		$migCalibres = $this->Material->MigCalibre->find('list', array('conditions' => array('MigCalibre.pmig' => 1)) );
		$tigCalibres = $this->Material->TigCalibre->find('list', array('conditions' => array('TigCalibre.ptig' => 1)) );
		$pacCalibres = $this->Material->PacCalibre->find('list', array('conditions' => array('PacCalibre.ppac' => 1)) );
		$this->set(compact('migCalibres', 'tigCalibres', 'smawCalibres', 'pacCalibres'));
			
		}
	}

	function edit($id = null) {
		//uses('Sanitize'); 
		
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Editar Material a Soldar');
		if($admin['admin'] == 1) {
			
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('El material a soldar no existe.', true), 'flash_failure');
			$this->redirect(array('action' => 'viewall'));
		}
		if (!empty($this->data)) {
			
			$date = date("Y-m-d H:i:s");
			$this->data['Material']['modified'] = $date;
			
			$smallimage = $this->uploadFiles('img/materials/thumb', $this->data['Material']['smallfile']);
			$image = $this->uploadFiles('img/materials', $this->data['Material']['bigfile']);
			
			if(array_key_exists('urls', $smallimage)) {  
				// save the url in the form data  
				$this->data['Material']['smallimage'] = $smallimage['urls'][0]; 
			} 
			
			if(array_key_exists('urls', $image)) {  
				// save the url in the form data  
				$this->data['Material']['image'] = $image['urls'][0]; 
			} 
			
			//$this->data['Material']['description'] = Sanitize::escape($this->data['Material']['description'], 'default');
			
			if ($this->Material->save($this->data)) {
				$this->Session->setFlash(__('Has editado el material a soldar exitósamente.', true), 'flash_success');
				$this->redirect(array('action' => 'viewall'));
			} else {
				$this->Session->setFlash(__('El material a soldar no se pudo actualizar, intenta más tarde.', true), 'flash_failure');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Material->read(null, $id);
		}
		$smawCalibres = $this->Material->SmawCalibre->find('list', array('conditions' => array('SmawCalibre.psmaw' => 1)) );
		$migCalibres = $this->Material->MigCalibre->find('list', array('conditions' => array('MigCalibre.pmig' => 1)) );
		$tigCalibres = $this->Material->TigCalibre->find('list', array('conditions' => array('TigCalibre.ptig' => 1)) );
		$pacCalibres = $this->Material->PacCalibre->find('list', array('conditions' => array('PacCalibre.ppac' => 1)) );
		$this->set(compact('migCalibres', 'tigCalibres', 'smawCalibres', 'pacCalibres'));
		}
		
	}
	
	function viewall() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Materiales a Soldar');
		if($admin['admin'] == 1) {
			
			$this->Prg->commonProcess();
			$this->Material->recursive = -1;

			$this->paginate['Material'] = array('conditions' => $this->Material->parseCriteria($this->passedArgs));
			$this->set('data', $this->paginate());
		}
	}
	
	function getlist() {
		$this->Material->recursive = -1;
		
		return $this->Material->find('all', array(
		'fields' => array('Material.id', 'Material.name'),
		'order' => 'Material.name DESC', 'limit' => 10));
	}

}
?>