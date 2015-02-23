<?php
class ReguladorsController extends AppController {

	var $name = 'Reguladors';
	
	var $paginate = array(
		'Regulador' => array('limit' => 25, 'order' => array('Regulador.name' => 'asc') )
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
		$this->set('title_for_layout','INFRA - Reguladores de Presión');
		$this->Prg->commonProcess();
		$this->Regulador->recursive = -1;
		
		$this->paginate['Regulador'] = array('conditions' => $this->Regulador->parseCriteria($this->passedArgs));
		$this->set('data', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid equipo alternativo', true));
			$this->redirect(array('action' => 'index'));
		}
		$regulador = $this->Regulador->find('first', array('conditions' => array(
			'Regulador.id' => $id
		) ) );
		$this->set('title_for_layout','INFRA - '.$regulador['Regulador']['name']);
		$this->set(compact('regulador'));
	}

	function add() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Nuevo Regulador de Presión');
		if($admin['admin'] == 1) {
			
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->data['Regulador']['created'] = $date;
					
				$smallimage = $this->uploadFiles('img/reguladores/thumb', $this->data['Regulador']['smallfile']);
				$image = $this->uploadFiles('img/reguladores', $this->data['Regulador']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Regulador']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Regulador']['image'] = $image['urls'][0]; 
				} 
				
				$this->Regulador->create();
				if ($this->Regulador->save($this->data)) {
					$this->Session->setFlash(__('El Regulador de Presión ha sido guardado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('El Regulador de Presión no se pudo guardar, intenta más tarde', true), 'flash_failure');
				}
			}
			$migAportes = $this->Regulador->MigAporte->find('list', array('conditions' => array('MigAporte.pmig' => 1)) );
			$tigAportes = $this->Regulador->TigAporte->find('list', array('conditions' => array('TigAporte.ptig' => 1)) );
			$tigAlternativos = $this->Regulador->TigAlternativo->find('list', array('conditions' => array('TigAlternativo.ptig' => 1)) );
			$migProtecciones = $this->Regulador->MigProteccione->find('list', array('conditions' => array('MigProteccione.pmig' => 1)) );
			$pacGases = $this->Regulador->PacGase->find('list', array('conditions' => array('PacGase.ppac' => 1)) );
			$this->set(compact('migAportes', 'tigAportes', 'migProtecciones', 'tigAlternativos', 'pacGases'));
		}
	}

	function edit($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Editar Regulador de Presión');
		if($admin['admin'] == 1) {
		
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid regulador', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->data['Regulador']['modified'] = $date;
				
				$smallimage = $this->uploadFiles('img/reguladores/thumb', $this->data['Regulador']['smallfile']);
				$image = $this->uploadFiles('img/reguladores', $this->data['Regulador']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Regulador']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Regulador']['image'] = $image['urls'][0]; 
				}  
				
				if ($this->Regulador->save($this->data)) {
					$this->Session->setFlash(__('El Regulador de Presión ha sido editado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('El Regulador de Presión no se pudo editar, intenta más tarde', true), 'flash_failure');
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Regulador->read(null, $id);
			}
			$migAportes = $this->Regulador->MigAporte->find('list', array('conditions' => array('MigAporte.pmig' => 1)) );
			$tigAportes = $this->Regulador->TigAporte->find('list', array('conditions' => array('TigAporte.ptig' => 1)) );
			$tigAlternativos = $this->Regulador->TigAlternativo->find('list', array('conditions' => array('TigAlternativo.ptig' => 1)) );
			$migProtecciones = $this->Regulador->MigProteccione->find('list', array('conditions' => array('MigProteccione.pmig' => 1)) );
			$pacGases = $this->Regulador->PacGase->find('list', array('conditions' => array('PacGase.ppac' => 1)) );
			$this->set(compact('migAportes', 'tigAportes', 'migProtecciones', 'tigAlternativos', 'pacGases'));
			
		}
	}
	
	function viewall() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Reguladores de Presión');
		if($admin['admin'] == 1) {
			
			$this->Prg->commonProcess();
			$this->Regulador->recursive = -1;
			
			$this->paginate['Regulador'] = array('conditions' => $this->Regulador->parseCriteria($this->passedArgs));
			$this->set('data', $this->paginate());
		}
	}
	
	function viewimage($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Imagen de Reguladores');
		$this->layout = 'ajax';
		if($admin['admin'] == 1) {
			
			if($id) {
				$this->Regulador->recursive = -1;
				$image = $this->Regulador->find('first', array(
					'fields' => array('Regulador.image'),
					'conditions' => array('Regulador.id' => $id) 
				));
					
				$this->set(compact('image'));
			}
		}
	}
	
	function getlist() {
		$this->Regulador->recursive = -1;
		
		return $this->Regulador->find('all', array(
		'fields' => array('Regulador.id', 'Regulador.name'),
		'order' => 'Regulador.name DESC', 'limit' => 10));
	}

}
?>