<?php
class AportesController extends AppController {

	var $name = 'Aportes';
	
	var $paginate = array(
		'Aporte' => array('limit' => 25, 'order' => array('Aporte.name' => 'asc') )
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
		$this->set('title_for_layout','INFRA - Materiales de aporte');
		$this->Prg->commonProcess();
		$this->Aporte->recursive = -1;
		
		$this->paginate['Aporte'] = array('conditions' => array($this->Aporte->parseCriteria($this->passedArgs), 'NOT' => array('Aporte.codigo' => '0') ) );
		$this->set('data', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid material de aporte', true));
			$this->redirect(array('action' => 'index'));
		}
		$aporte = $this->Aporte->find('first', array('conditions' => array(
			'Aporte.id' => $id
		) ) );
		$this->set('title_for_layout','INFRA - '.$aporte['Aporte']['name']);
		$this->set(compact('aporte'));
	}

	function add() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Nuevo Material de Aporte');
		if($admin['admin'] == 1) {
		
			if (!empty($this->request->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->request->data['Aporte']['created'] = $date;
					
				$smallimage = $this->uploadFiles('img/aportes/thumb', $this->data['Aporte']['smallfile']);
				$image = $this->uploadFiles('img/aportes', $this->data['Aporte']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Aporte']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Aporte']['image'] = $image['urls'][0]; 
				} 
					
				$this->Aporte->create();
				if ($this->Aporte->save($this->data)) {
					$this->Session->setFlash(__('El Material de Aporte ha sido guardado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('No se pudo agregar el Material de Aporte, se produjo un error, intenta más tarde', true), 'flash_failure');
				}
			}
			$smawMaquinas = $this->Aporte->SmawMaquina->find('list', array('conditions' => array('SmawMaquina.psmaw' => 1)) );
			$smawProtecciones = $this->Aporte->SmawProteccione->find('list', array('conditions' => array('SmawProteccione.psmaw' => 1)) );
			$migAntorchas = $this->Aporte->MigAntorcha->find('list', array('conditions' => array('MigAntorcha.pmig' => 1)) );
			$migReguladors = $this->Aporte->MigRegulador->find('list', array('conditions' => array('MigRegulador.pmig' => 1)) );
			$tigAntorchas = $this->Aporte->TigAntorcha->find('list', array('conditions' => array('TigAntorcha.ptig' => 1)) );
			$tigReguladors = $this->Aporte->TigRegulador->find('list', array('conditions' => array('TigRegulador.ptig' => 1)) );
			$this->set(compact('migAntorchas', 'migReguladors', 'tigAntorchas', 'tigReguladors', 'smawMaquinas', 'smawProtecciones'));
			
		}
	}

	function edit($id = null, $url = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Editar Material de Aporte');
		if($admin['admin'] == 1) {
		
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid aporte', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->request->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->request->data['Aporte']['modified'] = $date;
				
				$smallimage = $this->uploadFiles('img/aportes/thumb', $this->data['Aporte']['smallfile']);
				$image = $this->uploadFiles('img/aportes', $this->data['Aporte']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Aporte']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Aporte']['image'] = $image['urls'][0]; 
				} 
				
				if ($this->Aporte->save($this->data)) {
					$this->Session->setFlash(__('El Material de Aporte ha sido editado con éxito', true), 'flash_success');
					$this->redirect('/'.$this->data['Aporte']['url']);
				} else {
					$this->Session->setFlash(__('El Material de Aporte no se pudo editar, intenta más tarde', true), 'flash_failure');
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Aporte->read(null, $id);
			}
			$smawMaquinas = $this->Aporte->SmawMaquina->find('list', array('conditions' => array('SmawMaquina.psmaw' => 1)) );
			$smawProtecciones = $this->Aporte->SmawProteccione->find('list', array('conditions' => array('SmawProteccione.psmaw' => 1)) );
			$migAntorchas = $this->Aporte->MigAntorcha->find('list', array('conditions' => array('MigAntorcha.pmig' => 1)) );
			$migReguladors = $this->Aporte->MigRegulador->find('list', array('conditions' => array('MigRegulador.pmig' => 1)) );
			$tigAntorchas = $this->Aporte->TigAntorcha->find('list', array('conditions' => array('TigAntorcha.ptig' => 1)) );
			$tigReguladors = $this->Aporte->TigRegulador->find('list', array('conditions' => array('TigRegulador.ptig' => 1)) );
			$this->set(compact('migAntorchas', 'migReguladors', 'tigAntorchas', 'tigReguladors', 'smawMaquinas', 'smawProtecciones', 'url'));
			
		}
	}
	
	function viewall() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Materiales de aporte');
		if($admin['admin'] == 1) {
			
			$this->Prg->commonProcess();
			$this->Aporte->recursive = -1;
			
			$this->paginate['Aporte'] = array('conditions' => $this->Aporte->parseCriteria($this->passedArgs));
			$this->set('data', $this->paginate());
		}
	}
	
	function viewimage($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Imagen de Material de Aportes');
		$this->layout = 'ajax';
		if($admin['admin'] == 1) {
			
			if($id) {
				$this->Aporte->recursive = -1;
				$image = $this->Aporte->find('first', array(
					'fields' => array('Aporte.image'),
					'conditions' => array('Aporte.id' => $id) 
				));
					
				$this->set(compact('image'));
			}
		}
	}
	
	function getlist() {
		$this->Aporte->recursive = -1;
		
		return $this->Aporte->find('all', array(
		'fields' => array('Aporte.id', 'Aporte.name'),
		'order' => 'Aporte.name DESC', 'limit' => 10));
	}

}
?>