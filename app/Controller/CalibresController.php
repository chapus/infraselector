<?php
class CalibresController extends AppController {

	var $name = 'Calibres';

	var $paginate = array(
		'Calibre' => array('limit' => 25, 'order' => array('Calibre.name' => 'asc') )
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


	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid calibre', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('calibre', $this->Calibre->read(null, $id));
	}

	function add() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Nuevo Calibre de Lámina');
		if($admin['admin'] == 1) {
			
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->data['Calibre']['created'] = $date;
					
				$smallimage = $this->uploadFiles('img/calibres/thumb', $this->data['Calibre']['smallfile']);
				$image = $this->uploadFiles('img/calibres', $this->data['Calibre']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Calibre']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Calibre']['image'] = $image['urls'][0]; 
				} 
					
				$this->Calibre->create();
				if ($this->Calibre->save($this->data)) {
					$this->Session->setFlash(__('El Calibre de lámina ha sido agregado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('El Calibre de lámina no pudo ser guardado, intenta más tarde', true), 'flash_failure');
				}
			}
			$migGases = $this->Calibre->MigGase->find('list', array('conditions' => array('MigGase.pmig' => 1)) );
			$tigGases = $this->Calibre->TigGase->find('list', array('conditions' => array('TigGase.ptig' => 1)) );
			$smawMaquinas = $this->Calibre->SmawMaquina->find('list', array('conditions' => array('SmawMaquina.psmaw' => 1)) );
			$pacMaquinas = $this->Calibre->PacMaquina->find('list', array('conditions' => array('PacMaquina.ppac' => 1)) );
			$this->set(compact('migGases', 'tigGases', 'smawMaquinas', 'pacMaquinas'));
		}
	}

	function edit($id = null, $url = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Editar Calibre de Lámina');
		if($admin['admin'] == 1) {
			
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid calibre', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->data['Calibre']['modified'] = $date;
				
				$smallimage = $this->uploadFiles('img/calibres/thumb', $this->data['Calibre']['smallfile']);
				$image = $this->uploadFiles('img/calibres', $this->data['Calibre']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Calibre']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Calibre']['image'] = $image['urls'][0]; 
				} 
				
				if ($this->Calibre->save($this->data)) {
					$this->Session->setFlash(__('El Calibre de lámina ha sido editado con éxito', true), 'flash_success');
					$this->redirect('/'.$this->data['Calibre']['url']);
				} else {
					$this->Session->setFlash(__('El Calibre de lámina no pudo ser editado, intenta más tarde', true), 'flash_failure');
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Calibre->read(null, $id);
			}
			$migGases = $this->Calibre->MigGase->find('list', array('conditions' => array('MigGase.pmig' => 1)) );
			$tigGases = $this->Calibre->TigGase->find('list', array('conditions' => array('TigGase.ptig' => 1)) );
			$smawMaquinas = $this->Calibre->SmawMaquina->find('list', array('conditions' => array('SmawMaquina.psmaw' => 1)) );
			$pacMaquinas = $this->Calibre->PacMaquina->find('list', array('conditions' => array('PacMaquina.ppac' => 1)) );
			$this->set(compact('migGases', 'tigGases', 'smawMaquinas', 'pacMaquinas', 'url'));
		}
	}
	
	function viewall() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Calibres de lámina');
		if($admin['admin'] == 1) {
			
			$this->Prg->commonProcess();
			$this->Calibre->recursive = -1;
			
			$this->paginate['Calibre'] = array('conditions' => $this->Calibre->parseCriteria($this->passedArgs));
			$this->set('data', $this->paginate());
		}
	}
	
	function getlist() {
		$this->Calibre->recursive = -1;
		
		return $this->Calibre->find('all', array(
		'fields' => array('Calibre.id', 'Calibre.name'),
		'order' => 'Calibre.name DESC', 'limit' => 10));
	}

}
?>