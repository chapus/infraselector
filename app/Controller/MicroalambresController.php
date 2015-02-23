<?php
class MicroalambresController extends AppController {

	var $name = 'Microalambres';
	
	var $paginate = array(
		'Microalambre' => array('limit' => 25, 'order' => array('Microalambre.name' => 'asc') )
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
		$this->set('title_for_layout','INFRA - Alimentadores de Micro Alambre');
		$this->Prg->commonProcess();
		$this->Microalambre->recursive = -1;
		
		$this->paginate['Microalambre'] = array('conditions' => array($this->Microalambre->parseCriteria($this->passedArgs), 'NOT' => array('Microalambre.name' => 'N/A') ) );
		$this->set('data', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid alimentador de microalambre', true));
			$this->redirect(array('action' => 'index'));
		}
		$microalambre = $this->Microalambre->find('first', array('conditions' => array(
			'Microalambre.id' => $id
		) ) );
		$this->set('title_for_layout','INFRA - '.$microalambre['Microalambre']['name']);
		$this->set(compact('microalambre'));
	}

	function add() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Nuevo Alimentador de Micro Alambre');
		if($admin['admin'] == 1) {
			
			if (!empty($this->data)) {
				
					$date = date("Y-m-d H:i:s");
					$this->data['Microalambre']['created'] = $date;
					
					$smallimage = $this->uploadFiles('img/alimentadores/thumb', $this->data['Microalambre']['smallfile']);
					$image = $this->uploadFiles('img/alimentadores', $this->data['Microalambre']['bigfile']);
					
					if(array_key_exists('urls', $smallimage)) {  
						// save the url in the form data  
						$this->data['Microalambre']['smallimage'] = $smallimage['urls'][0]; 
					}
					
					if(array_key_exists('urls', $image)) {  
						// save the url in the form data  
						$this->data['Microalambre']['image'] = $image['urls'][0]; 
					}
				
				$this->Microalambre->create();
				if ($this->Microalambre->save($this->data)) {
					$this->Session->setFlash(__('El Alimentador de Micro Alambre ha sido guardado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('El Alimentador de Micro Alambre no se pudo guardar, intenta más tarde', true), 'flash_failure');
				}
			}
			$migAntorchas = $this->Microalambre->MigAntorcha->find('list', array('conditions' => array('MigAntorcha.pmig' => 1)) );
			$migMaquinas = $this->Microalambre->MigMaquina->find('list', array('conditions' => array('MigMaquina.pmig' => 1)) );
			$this->set(compact('migAntorchas', 'migMaquinas'));
		}
	}

	function edit($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Editar Alimentador de Micro Alambre');
		if($admin['admin'] == 1) {
		
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid microalambre', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->data['Microalambre']['modified'] = $date;
				
				$smallimage = $this->uploadFiles('img/alimentadores/thumb', $this->data['Microalambre']['smallfile']);
				$image = $this->uploadFiles('img/alimentadores', $this->data['Microalambre']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Microalambre']['smallimage'] = $smallimage['urls'][0]; 
				}
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Microalambre']['image'] = $image['urls'][0]; 
				}

				
				if ($this->Microalambre->save($this->data)) {
					$this->Session->setFlash(__('El Alimentador de Micro Alambre ha sido editado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('El Alimentador de Micro Alambre no se pudo editar, intenta más tarde', true), 'flash_failure');
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Microalambre->read(null, $id);
			}
			$migAntorchas = $this->Microalambre->MigAntorcha->find('list', array('conditions' => array('MigAntorcha.pmig' => 1)) );
			$migMaquinas = $this->Microalambre->MigMaquina->find('list', array('conditions' => array('MigMaquina.pmig' => 1)) );
			$this->set(compact('migAntorchas', 'migMaquinas'));
			
		}
	}
	
	function viewall() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Alimentadores de Micro Alambre');
		if($admin['admin'] == 1) {
			
			$this->Prg->commonProcess();
			$this->Microalambre->recursive = -1;
			
			$this->paginate['Microalambre'] = array('conditions' => $this->Microalambre->parseCriteria($this->passedArgs));
			$this->set('data', $this->paginate());
		}
	}
	
	function viewimage($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Imagen de Alimentador de Microalambre');
		$this->layout = 'ajax';
		if($admin['admin'] == 1) {
			
			if($id) {
				$this->Maquina->recursive = -1;
				$image = $this->Microalambre->find('first', array(
					'fields' => array('Microalambre.image'),
					'conditions' => array('Microalambre.id' => $id) 
				));
					
				$this->set(compact('image'));
			}
		}
	}
	
	function getlist() {
		$this->Microalambre->recursive = -1;
		
		return $this->Microalambre->find('all', array(
		'fields' => array('Microalambre.id', 'Microalambre.name'),
		'order' => 'Microalambre.name DESC', 'limit' => 10));
	}

}
?>