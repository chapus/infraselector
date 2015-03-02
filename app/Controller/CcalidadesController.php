<?php
class CcalidadesController extends AppController {

	var $name = 'Ccalidades';
	
	var $paginate = array(
		'Ccalidade' => array('limit' => 25, 'order' => array('Ccalidade.name' => 'asc') )
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
		$this->set('title_for_layout','INFRA - Condicion de Calidad');
		$this->Prg->commonProcess();
		$this->Ccalidade->recursive = -1;
		
		$this->paginate['Ccalidade'] = array('conditions' => array($this->Ccalidade->parseCriteria($this->passedArgs), 'NOT' => array('Ccalidade.codigo' => '0') ) );
		$this->set('data', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid condicion de calidad', true));
			$this->redirect(array('action' => 'index'));
		}
		$aporte = $this->Ccalidade->find('first', array('conditions' => array(
			'Ccalidade.id' => $id
		) ) );
		$this->set('title_for_layout','INFRA - '.$aporte['Ccalidade']['name']);
		$this->set(compact('aporte'));
	}

	function add() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Nueva Condicion de Calidad');
		if($admin['admin'] == 1) {
		
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->request->data['Ccalidade']['created'] = $date;
					
				$smallimage = $this->uploadFiles('img/ccalidades/thumb', $this->data['Ccalidade']['smallfile']);
				$image = $this->uploadFiles('img/ccalidades', $this->data['Ccalidade']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Ccalidade']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Ccalidade']['image'] = $image['urls'][0]; 
				} 
					
				$this->Ccalidade->create();
				if ($this->Ccalidade->save($this->data)) {
					$this->Session->setFlash(__('La Condicion de Calidad ha sido guardado con éxito'), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('No se pudo agregar la Condicion de Calidad, se produjo un error, intenta más tarde'), 'flash_failure');
				}
			}
			$tigCalibres = $this->Ccalidade->TigCalibre->find('list', array('conditions' => array('TigCalibre.ptig' => 1)) );
			$tigGases = $this->Ccalidade->TigGase->find('list', array('conditions' => array('TigGase.ptig' => 1)) );
			$this->set(compact('tigCalibres', 'tigGases'));
			
		}
	}

	function edit($id = null, $url = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Editar Condicion de Calidad');
		if($admin['admin'] == 1) {
		
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid Ccalidade'));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->request->data['Ccalidade']['modified'] = $date;
				
				$smallimage = $this->uploadFiles('img/ccalidades/thumb', $this->data['Ccalidade']['smallfile']);
				$image = $this->uploadFiles('img/ccalidades', $this->data['Ccalidade']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Ccalidade']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Ccalidade']['image'] = $image['urls'][0]; 
				} 
				
				if ($this->Ccalidade->save($this->data)) {
					$this->Session->setFlash(__('El Condicion de Calidad ha sido editado con éxito'), 'flash_success');
					$this->redirect('/'.$this->data['Ccalidade']['url']);
				} else {
					$this->Session->setFlash(__('El Condicion de Calidad no se pudo editar, intenta más tarde'), 'flash_failure');
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Ccalidade->read(null, $id);
			}
			$tigCalibres = $this->Ccalidade->TigCalibre->find('list', array('conditions' => array('TigCalibre.ptig' => 1)) );
			$tigGases = $this->Ccalidade->TigGase->find('list', array('conditions' => array('TigGase.ptig' => 1)) );
			$this->set(compact('tigCalibres', 'tigGases', 'url'));
			
		}
	}
	
	function viewall() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Condiciones de Calidad');
		if($admin['admin'] == 1) {
			
			$this->Prg->commonProcess();
			$this->Ccalidade->recursive = -1;
			
			$this->paginate['Ccalidade'] = array('conditions' => $this->Ccalidade->parseCriteria($this->passedArgs));
			$this->set('data', $this->paginate());
		}
	}
	
	function viewimage($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Imagen de Condicion de Calidad');
		$this->layout = 'ajax';
		if($admin['admin'] == 1) {
			
			if($id) {
				$this->Ccalidade->recursive = -1;
				$image = $this->Ccalidade->find('first', array(
					'fields' => array('Ccalidade.image'),
					'conditions' => array('Ccalidade.id' => $id) 
				));
					
				$this->set(compact('image'));
			}
		}
	}
	
	function getlist() {
		$this->Ccalidade->recursive = -1;
		
		return $this->Ccalidade->find('all', array(
		'fields' => array('Ccalidade.id', 'Ccalidade.name'),
		'order' => 'Ccalidade.name DESC', 'limit' => 10));
	}

}
?>