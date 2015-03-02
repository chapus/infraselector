<?php
class TungstenosController extends AppController {

	var $name = 'Tungstenos';
	
	var $paginate = array(
		'Tungsteno' => array('limit' => 25, 'order' => array('Tungsteno.name' => 'asc') )
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
		$this->set('title_for_layout','INFRA - Tungsteno');
		$this->Prg->commonProcess();
		$this->Tungsteno->recursive = -1;
		
		$this->paginate['Tungsteno'] = array('conditions' => array($this->Tungsteno->parseCriteria($this->passedArgs), 'NOT' => array('Tungsteno.codigo' => '0') ) );
		$this->set('data', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid material de tungsteno', true));
			$this->redirect(array('action' => 'index'));
		}
		$tungsteno = $this->Tungsteno->find('first', array('conditions' => array(
			'Tungsteno.id' => $id
		) ) );
		$this->set('title_for_layout','INFRA - '.$tungsteno['Tungsteno']['name']);
		$this->set(compact('tungsteno'));
	}

	function add() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Nuevo Tungsteno');
		if($admin['admin'] == 1) {
		
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->request->data['Tungsteno']['created'] = $date;
					
				$smallimage = $this->uploadFiles('img/tungstenos/thumb', $this->data['Tungsteno']['smallfile']);
				$image = $this->uploadFiles('img/tungstenos', $this->data['Tungsteno']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Tungsteno']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Tungsteno']['image'] = $image['urls'][0]; 
				} 
					
				$this->Tungsteno->create();
				if ($this->Tungsteno->save($this->data)) {
					$this->Session->setFlash(__('El Material de Tungsteno ha sido guardado con éxito'), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('No se pudo agregar el Material de Tungsteno, se produjo un error, intenta más tarde'), 'flash_failure');
				}
			}
			$tigAntorchas = $this->Tungsteno->TigAntorcha->find('list', array('conditions' => array('TigAntorcha.ptig' => 1)) );
			$tigAportes = $this->Tungsteno->TigAporte->find('list', array('conditions' => array('TigAporte.ptig' => 1)) );
			$this->set(compact('tigAportes', 'tigAntorchas'));
			
		}
	}

	function edit($id = null, $url = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Editar Material de Tungsteno');
		if($admin['admin'] == 1) {
		
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid tungsteno'));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->data['Tungsteno']['modified'] = $date;
				
				$smallimage = $this->uploadFiles('img/tungstenos/thumb', $this->data['Tungsteno']['smallfile']);
				$image = $this->uploadFiles('img/tungstenos', $this->data['Tungsteno']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Tungsteno']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Tungsteno']['image'] = $image['urls'][0]; 
				} 
				
				if ($this->Tungsteno->save($this->data)) {
					$this->Session->setFlash(__('El Material de Tungsteno ha sido editado con éxito'), 'flash_success');
					$this->redirect('/'.$this->data['Tungsteno']['url']);
				} else {
					$this->Session->setFlash(__('El Material de Tungsteno no se pudo editar, intenta más tarde'), 'flash_failure');
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Tungsteno->read(null, $id);
			}
			$tigAntorchas = $this->Tungsteno->TigAntorcha->find('list', array('conditions' => array('TigAntorcha.ptig' => 1)) );
			$tigAportes = $this->Tungsteno->TigAporte->find('list', array('conditions' => array('TigAporte.ptig' => 1)) );
			$this->set(compact('tigAportes', 'tigAntorchas', 'url'));
			
		}
	}
	
	function viewall() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Tungsteno');
		if($admin['admin'] == 1) {
			
			$this->Prg->commonProcess();
			$this->Tungsteno->recursive = -1;
			
			$this->paginate['Tungsteno'] = array('conditions' => $this->Tungsteno->parseCriteria($this->passedArgs));
			$this->set('data', $this->paginate());
		}
	}
	
	function viewimage($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Imagen de Material de Tungstenos');
		$this->layout = 'ajax';
		if($admin['admin'] == 1) {
			
			if($id) {
				$this->Tungsteno->recursive = -1;
				$image = $this->Tungsteno->find('first', array(
					'fields' => array('Tungsteno.image'),
					'conditions' => array('Tungsteno.id' => $id) 
				));
					
				$this->set(compact('image'));
			}
		}
	}
	
	function getlist() {
		$this->Tungsteno->recursive = -1;
		
		return $this->Tungsteno->find('all', array(
		'fields' => array('Tungsteno.id', 'Tungsteno.name'),
		'order' => 'Tungsteno.name DESC', 'limit' => 10));
	}

}
?>