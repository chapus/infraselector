<?php
class ProteccionesController extends AppController {

	var $name = 'Protecciones';
	
	var $paginate = array(
		'Proteccione' => array('limit' => 25, 'order' => array('Proteccione.name' => 'asc') )
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
		$this->set('title_for_layout','INFRA - Artículos de Protección');
		$this->Prg->commonProcess();
		$this->Proteccione->recursive = -1;
		
		$this->paginate['Proteccione'] = array('conditions' => $this->Proteccione->parseCriteria($this->passedArgs));
		$this->set('data', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid antorcha', true));
			$this->redirect(array('action' => 'index'));
		}
		$proteccione = $this->Proteccione->find('first', array('conditions' => array(
			'Proteccione.id' => $id
		) ) );
		$this->set('title_for_layout','INFRA - '.$proteccione['Proteccione']['name']);
		$this->set(compact('proteccione'));
	}

	function add() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Nuevo Artículo de Protección');
		if($admin['admin'] == 1) {
			
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->data['Proteccione']['created'] = $date;
				
				$smallimage = $this->uploadFiles('img/protecciones/thumb', $this->data['Proteccione']['smallfile']);
				$image = $this->uploadFiles('img/protecciones', $this->data['Proteccione']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Proteccione']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Proteccione']['image'] = $image['urls'][0]; 
				} 
				
				$this->Proteccione->create();
				if ($this->Proteccione->save($this->data)) {
					$this->Session->setFlash(__('El Artículo de Protección ha sido guardado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('El Artículo de Protección no se pudo guardar, intenta más tarde', true), 'flash_failure');
				}
			}
			$seccions = $this->Proteccione->Seccion->find('list');
			$this->set(compact('seccions'));
		}
	}

	function edit($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Editar Artículo de Protección');
		if($admin['admin'] == 1) {
		
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Artículo de Protección inexistente', true), 'flash_failure');
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->data['Proteccione']['modified'] = $date;
				
				$smallimage = $this->uploadFiles('img/protecciones/thumb', $this->data['Proteccione']['smallfile']);
				$image = $this->uploadFiles('img/protecciones', $this->data['Proteccione']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Proteccione']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Proteccione']['image'] = $image['urls'][0]; 
				} 
				
				if ($this->Proteccione->save($this->data)) {
					$this->Session->setFlash(__('El Artículo de Protección ha sido editado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('El Artículo de Protección no se pudo editar, intenta más tarde', true), 'flash_failure');
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Proteccione->read(null, $id);
				$seccions = $this->Proteccione->Seccion->find('list');
				$this->set(compact('seccions'));
			}
		}
	}
	
	function viewall() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Artículos de Protección');
		if($admin['admin'] == 1) {
			
			$this->Prg->commonProcess();
			$this->Proteccione->recursive = 1;
			
			$this->paginate['Proteccione'] = array('conditions' => $this->Proteccione->parseCriteria($this->passedArgs));
			$this->set('data', $this->paginate());
		}
	}
	
	function viewimage($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Imagen de Art. de Protección');
		$this->layout = 'ajax';
		if($admin['admin'] == 1) {
			
			if($id) {
				$this->Proteccione->recursive = -1;
				$image = $this->Proteccione->find('first', array(
					'fields' => array('Proteccione.image'),
					'conditions' => array('Proteccione.id' => $id) 
				));
					
				$this->set(compact('image'));
			}
		}
	}
	
	function getlist() {
		$this->Proteccione->recursive = -1;
		
		return $this->Proteccione->find('all', array(
		'fields' => array('Proteccione.id', 'Proteccione.name'),
		'order' => 'Proteccione.name DESC', 'limit' => 10));
	}

}
?>