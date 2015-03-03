<?php
class AlternativosController extends AppController {

	var $name = 'Alternativos';
	
	var $paginate = array(
		'Alternativo' => array('limit' => 25, 'order' => array('Alternativo.name' => 'asc') )
	);
	
	public $components = array('Search.Prg');
	
	public $presetVars = array(
			array('field' => 'name', 'type' => 'value'),
			array('field' => 'short', 'type' => 'value'),
			array('field' => 'codigo', 'type' => 'value'),
			array('field' => 'description', 'type' => 'value'),
			array('field' => 'pmig', 'type' => 'int'),
			array('field' => 'ptig', 'type' => 'int'),
			array('field' => 'psmaw', 'type' => 'int')
			);

	function index() {
		$this->set('title_for_layout','INFRA - Equipos Alternativos');
		$this->Prg->commonProcess();
		$this->Alternativo->recursive = -1;
		
		$this->paginate['Alternativo'] = array('conditions' => array($this->Alternativo->parseCriteria($this->passedArgs), 'NOT' => array('Alternativo.name' => 'N/A') ) );
		$this->set('data', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid alternativo', true));
			$this->redirect(array('action' => 'index'));
		}
		$alternativo = $this->Alternativo->find('first', array('conditions' => array(
			'Alternativo.id' => $id
		) ) );
		$this->set('title_for_layout','Equipo Alternativo - '.$alternativo['Alternativo']['name']);
		$this->set(compact('alternativo'));
	}

	function add() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Nuevo Equipo Alternativo');
		if($admin['admin'] == 1) {
			
			if (!empty($this->request->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->request->data['Alternativo']['created'] = $date;
				
				$smallimage = $this->uploadFiles('img/alternativos/thumb', $this->data['Alternativo']['smallfile']);
				$image = $this->uploadFiles('img/alternativos', $this->data['Alternativo']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Alternativo']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Alternativo']['image'] = $image['urls'][0]; 
				} 
				
				$this->Alternativo->create();
				if ($this->Alternativo->save($this->data)) {
					$this->Session->setFlash(__('El Equipo Alternativo ha sido guardado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('El Equipo Alternativo no se pudo guardar, intenta más tarde', true), 'flash_failure');
				}
			}
			$tigProtecciones = $this->Alternativo->TigProteccione->find('list', array('conditions' => array('TigProteccione.ptig' => 1)) );
			$tigReguladors = $this->Alternativo->TigRegulador->find('list', array('conditions' => array('TigRegulador.ptig' => 1)) );
			$this->set(compact('tigReguladors', 'tigProtecciones'));
			
		}
	}

	function edit($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Editar Equipo Alternativo');
		if($admin['admin'] == 1) {
		
			if (!$id && empty($this->request->data)) {
				$this->Session->setFlash(__('Equipo Alternativo inválido', true), 'flash_failure');
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->request->data)) {
				
				$smallimage = $this->uploadFiles('img/alternativos/thumb', $this->data['Alternativo']['smallfile']);
				$image = $this->uploadFiles('img/alternativos', $this->data['Alternativo']['bigfile']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Alternativo']['smallimage'] = $smallimage['urls'][0]; 
				}
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Alternativo']['image'] = $image['urls'][0]; 
				}
				
				if ($this->Alternativo->save($this->data)) {
					$this->Session->setFlash(__('El Equipo Alternativo ha sido editado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('El Equipo Alternativo no se pudo editar, intenta más tarde', true), 'flash_failure');
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Alternativo->read(null, $id);
			}
			$tigProtecciones = $this->Alternativo->TigProteccione->find('list', array('conditions' => array('TigProteccione.ptig' => 1)) );
			$tigReguladors = $this->Alternativo->TigRegulador->find('list', array('conditions' => array('TigRegulador.ptig' => 1)) );
			$migProtecciones = $this->Alternativo->MigProteccione->find('list', array('conditions' => array('MigProteccione.pmig' => 1)) );
			$migReguladors = $this->Alternativo->MigRegulador->find('list', array('conditions' => array('MigRegulador.pmig' => 1)) );
			$this->set(compact('tigReguladors', 'tigProtecciones', 'migProtecciones', 'migReguladors'));
			
		}
	}
	
	function viewall() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Equipos Alternativos');
		if($admin['admin'] == 1) {
			
			$this->Prg->commonProcess();
			$this->Alternativo->recursive = -1;
			
			$this->paginate['Alternativo'] = array('conditions' => $this->Alternativo->parseCriteria($this->passedArgs));
			$this->set('data', $this->paginate());
		}
	}
	
	function viewimage($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Imagen de Equipo Alternativo');
		$this->layout = 'ajax';
		if($admin['admin'] == 1) {
			
			if($id) {
				$this->Alternativo->recursive = -1;
				$image = $this->Alternativo->find('first', array(
					'fields' => array('Alternativo.image'),
					'conditions' => array('Alternativo.id' => $id) 
				));
					
				$this->set(compact('image'));
			}
		}
	}
	
	function getlist() {
		$this->Alternativo->recursive = -1;
		
		return $this->Alternativo->find('all', array(
		'fields' => array('Alternativo.id', 'Alternativo.name'),
		'order' => 'Alternativo.name DESC', 'limit' => 10));
	}

}
?>