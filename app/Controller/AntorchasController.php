<?php
class AntorchasController extends AppController {

	var $name = 'Antorchas';
	
	var $paginate = array(
		'Antorcha' => array('limit' => 25, 'order' => array('Antorcha.name' => 'asc') )
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
		$this->set('title_for_layout','INFRA - Antorchas');
		$this->Prg->commonProcess();
		$this->Antorcha->recursive = -1;
		
		$this->paginate['Antorcha'] = array('conditions' => array($this->Antorcha->parseCriteria($this->passedArgs), 'NOT' => array('Antorcha.name' => 'N/A') ) );
		$this->set('data', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid antorcha', true));
			$this->redirect(array('action' => 'index'));
		}
		$antorcha = $this->Antorcha->find('first', array('conditions' => array(
			'Antorcha.id' => $id
		) ) );
		$this->set('title_for_layout','INFRA - '.$antorcha['Antorcha']['name']);
		$this->set(compact('antorcha'));
	}

	function add() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Nueva Antorcha');
		if($admin['admin'] == 1) {
			
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->request->data['Antorcha']['created'] = $date;
					
				$smallimage = $this->uploadFiles('img/antorchas/thumb', $this->data['Antorcha']['smallfile']);
				$image = $this->uploadFiles('img/antorchas', $this->data['Antorcha']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Antorcha']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Antorcha']['image'] = $image['urls'][0]; 
				} 
				
				$this->Antorcha->create();
				if ($this->Antorcha->save($this->data)) {
					$this->Session->setFlash(__('La Antorcha ha sido guardada con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('La Antorcha no se pudo guardar, intenta más tarde', true), 'flash_failure');
				}
			}
			$migMicroalambres = $this->Antorcha->MigMicroalambre->find('list', array('conditions' => array('MigMicroalambre.pmig' => 1)) );
			$migAportes = $this->Antorcha->MigAporte->find('list', array('conditions' => array('MigAporte.pmig' => 1)) );
			$tigAportes = $this->Antorcha->TigAporte->find('list', array('conditions' => array('TigAporte.ptig' => 1)) );
			$tigMaquinas = $this->Antorcha->TigMaquina->find('list', array('conditions' => array('TigMaquina.ptig' => 1)) );
			$this->set(compact('migMicroalambres', 'migAportes', 'tigAportes', 'tigMaquinas'));
			
		}
	}

	function edit($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Nueva Antorcha');
		if($admin['admin'] == 1) {
		
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Antorcha inválida', true), 'flash_failure');
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->data['Antorcha']['modified'] = $date;
				
				$smallimage = $this->uploadFiles('img/antorchas/thumb', $this->data['Antorcha']['smallfile']);
				$image = $this->uploadFiles('img/antorchas', $this->data['Antorcha']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Antorcha']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Antorcha']['image'] = $image['urls'][0]; 
				} 
				
				if ($this->Antorcha->save($this->data)) {
					$this->Session->setFlash(__('La Antorcha ha sido editada con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('La Antorcha no se pudo editar, intenta más tarde', true), 'flash_failure');
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Antorcha->read(null, $id);
			}
			$migMicroalambres = $this->Antorcha->MigMicroalambre->find('list', array('conditions' => array('MigMicroalambre.pmig' => 1)) );
			$migAportes = $this->Antorcha->MigAporte->find('list', array('conditions' => array('MigAporte.pmig' => 1)) );
			$tigAportes = $this->Antorcha->TigAporte->find('list', array('conditions' => array('TigAporte.ptig' => 1)) );
			$tigMaquinas = $this->Antorcha->TigMaquina->find('list', array('conditions' => array('TigMaquina.ptig' => 1)) );
			$this->set(compact('migMicroalambres', 'migAportes', 'tigAportes', 'tigMaquinas'));
		}
	}
	
	function viewall() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Antorchas');
		if($admin['admin'] == 1) {
			
			$this->Prg->commonProcess();
			$this->Antorcha->recursive = -1;
			
			$this->paginate['Antorcha'] = array('conditions' => $this->Antorcha->parseCriteria($this->passedArgs));
			$this->set('data', $this->paginate());
		}
	}
	
	function viewimage($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Imagen de Antorcha');
		$this->layout = 'ajax';
		if($admin['admin'] == 1) {
			
			if($id) {
				$this->Maquina->recursive = -1;
				$image = $this->Antorcha->find('first', array(
					'fields' => array('Antorcha.image'),
					'conditions' => array('Antorcha.id' => $id) 
				));
					
				$this->set(compact('image'));
			}
		}
	}
	
	function getlist() {
		$this->Antorcha->recursive = -1;
		
		return $this->Antorcha->find('all', array(
		'fields' => array('Antorcha.id', 'Antorcha.name'),
		'order' => 'Antorcha.name DESC', 'limit' => 10));
	}

}
?>