<?php
class PortaelectrodosController extends AppController {

	var $name = 'Portaelectrodos';
	
	var $paginate = array(
		'Portaelectrodo' => array('limit' => 25, 'order' => array('Portaelectrodo.name' => 'asc') )
	);
	
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
	
	public $components = array('Search.Prg');
	
	
	function index() {
		$this->set('title_for_layout','INFRA - Portaelectrodos');
		$this->Prg->commonProcess();
		$this->Portaelectrodo->recursive = -1;
		
		$this->paginate['Portaelectrodo'] = array('conditions' => $this->Portaelectrodo->parseCriteria($this->passedArgs));
		$this->set('data', $this->paginate());
	}
	
	
	function viewall() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Portaelectrodos');
		if($admin['admin'] == 1) {
			
			$this->Prg->commonProcess();
			$this->Portaelectrodo->recursive = -1;
			
			$this->paginate['Portaelectrodo'] = array('conditions' => $this->Portaelectrodo->parseCriteria($this->passedArgs));
			$this->set('data', $this->paginate());
		}
	}
	
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Portaelectrodo', true));
			$this->redirect(array('action' => 'index'));
		}
		$portaelectrodo = $this->Portaelectrodo->find('first', array('conditions' => array(
			'Portaelectrodo.id' => $id
		) ) );
		$this->set('title_for_layout','Portaelectrodo - '.$portaelectrodo['Portaelectrodo']['name']);
		$this->set(compact('portaelectrodo'));
	}
	
	
	function add() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Nuevo Portaelectrodo');
		if($admin['admin'] == 1) {
				
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->data['Portaelectrodo']['created'] = $date;
					
				$smallimage = $this->uploadFiles('img/portaelectrodos/thumb', $this->data['Portaelectrodo']['smallfile']);
				$image = $this->uploadFiles('img/portaelectrodos', $this->data['Portaelectrodo']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Portaelectrodo']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Portaelectrodo']['image'] = $image['urls'][0]; 
				} 
				
				$this->Portaelectrodo->create();
				if ($this->Portaelectrodo->save($this->data)) {
					$this->Session->setFlash(__('El Portaelectrodo ha sido guardado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('El Portaelectrodo no se pudo guardar, intenta más tarde', true), 'flash_failure');
				}
			}
			$smawMaquinas = $this->Portaelectrodo->SmawMaquina->find('list', array('conditions' => array('SmawMaquina.psmaw' => 1)) );
			$smawJuegopas = $this->Portaelectrodo->SmawJuegopa->find('list', array('conditions' => array('SmawJuegopa.psmaw' => 1)) );
			$this->set(compact('smawMaquinas', 'smawJuegopas'));
		}
	}
	
	
	function edit($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Editar Portaelectrodo');
		if($admin['admin'] == 1) {
			
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Portaelectrodo inválido', true), 'flash_failure');
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->data['Portaelectrodo']['modified'] = $date;
				
				$smallimage = $this->uploadFiles('img/gases/thumb', $this->data['Portaelectrodo']['smallfile']);
				$image = $this->uploadFiles('img/gases', $this->data['Portaelectrodo']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Portaelectrodo']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Portaelectrodo']['image'] = $image['urls'][0]; 
				} 
				
				if ($this->Portaelectrodo->save($this->data)) {
					$this->Session->setFlash(__('El Portaelectrodo ha sido editado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('El Portaelectrodo no se pudo editar, intenta más tarde', true), 'flash_failure');
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Portaelectrodo->read(null, $id);
			}
			$smawMaquinas = $this->Portaelectrodo->SmawMaquina->find('list', array('conditions' => array('SmawMaquina.psmaw' => 1)) );
			$smawJuegopas = $this->Portaelectrodo->SmawJuegopa->find('list', array('conditions' => array('SmawJuegopa.psmaw' => 1)) );
			$this->set(compact('smawMaquinas', 'smawJuegopas'));
			
		}
	}
	
	
	function viewimage($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Imagen de Portaelectrodo');
		$this->layout = 'ajax';
		if($admin['admin'] == 1) {
			
			if($id) {
				$this->Portaelectrodo->recursive = -1;
				$image = $this->Portaelectrodo->find('first', array(
					'fields' => array('Portaelectrodo.image'),
					'conditions' => array('Portaelectrodo.id' => $id) 
				));
					
				$this->set(compact('image'));
			}
		}
	}
	

}
?>