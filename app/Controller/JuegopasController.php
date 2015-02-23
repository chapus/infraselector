<?php
class JuegopasController extends AppController {

	var $name = 'Juegopas';
	
	var $paginate = array(
		'Juegopa' => array('limit' => 25, 'order' => array('Juegopa.name' => 'asc') )
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
		$this->set('title_for_layout','INFRA - Juegos de Pas');
		$this->Prg->commonProcess();
		$this->Juegopa->recursive = -1;
		
		$this->paginate['Juegopa'] = array('conditions' => $this->Juegopa->parseCriteria($this->passedArgs));
		$this->set('data', $this->paginate());
	}
	
	
	function viewall() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Juego de Pas');
		if($admin['admin'] == 1) {
			
			$this->Prg->commonProcess();
			$this->Juegopa->recursive = -1;
			
			$this->paginate['Juegopa'] = array('conditions' => $this->Juegopa->parseCriteria($this->passedArgs));
			$this->set('data', $this->paginate());
		}
	}
	
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Juego de Pas', true));
			$this->redirect(array('action' => 'index'));
		}
		$portaelectrodo = $this->Juegopa->find('first', array('conditions' => array(
			'Juegopa.id' => $id
		) ) );
		$this->set('title_for_layout','Juego de Pas - '.$portaelectrodo['Juegopa']['name']);
		$this->set(compact('portaelectrodo'));
	}
	
	
	function add() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Nuevo Juego de Pas');
		if($admin['admin'] == 1) {
				
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->data['Juegopa']['created'] = $date;
					
				$smallimage = $this->uploadFiles('img/juegodepas/thumb', $this->data['Juegopa']['smallfile']);
				$image = $this->uploadFiles('img/juegodepas', $this->data['Juegopa']['bigfile']);
				
				$image2 = $this->uploadFiles('img/juegodepas', $this->data['Juegopa']['file2']);
				$image3 = $this->uploadFiles('img/juegodepas', $this->data['Juegopa']['file3']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Juegopa']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Juegopa']['image'] = $image['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image2)) {  
					// save the url in the form data  
					$this->data['Juegopa']['image2'] = $image2['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image3)) {  
					// save the url in the form data  
					$this->data['Juegopa']['image3'] = $image3['urls'][0]; 
				} 
				
				$this->Juegopa->create();
				if ($this->Juegopa->save($this->data)) {
					$this->Session->setFlash(__('El Juego de Pas ha sido guardado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('El Juego de Pas no se pudo guardar, intenta más tarde', true), 'flash_failure');
				}
			}
			$smawPortaelectrodos = $this->Juegopa->SmawPortaelectrodo->find('list', array('conditions' => array('SmawPortaelectrodo.psmaw' => 1)) );
			$smawAportes = $this->Juegopa->SmawAporte->find('list', array('conditions' => array('SmawAporte.psmaw' => 1)) );
			$this->set(compact('smawPortaelectrodos', 'smawAportes'));
		}
	}
	
	
	function edit($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Editar Juego de Pas');
		if($admin['admin'] == 1) {
			
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Juego de Pas inválido', true), 'flash_failure');
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->data['Juegopa']['modified'] = $date;
				
				$smallimage = $this->uploadFiles('img/juegodepas/thumb', $this->data['Juegopa']['smallfile']);
				$image = $this->uploadFiles('img/juegodepas', $this->data['Juegopa']['bigfile']);
				
				$image2 = $this->uploadFiles('img/juegodepas', $this->data['Juegopa']['file2']);
				$image3 = $this->uploadFiles('img/juegodepas', $this->data['Juegopa']['file3']);
				
				if(array_key_exists('urls', $smallimage)) {  
					// save the url in the form data  
					$this->data['Juegopa']['smallimage'] = $smallimage['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image)) {  
					// save the url in the form data  
					$this->data['Juegopa']['image'] = $image['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image2)) {  
					// save the url in the form data  
					$this->data['Juegopa']['image2'] = $image2['urls'][0]; 
				} 
				
				if(array_key_exists('urls', $image3)) {  
					// save the url in the form data  
					$this->data['Juegopa']['image3'] = $image3['urls'][0]; 
				} 
				
				if ($this->Juegopa->save($this->data)) {
					$this->Session->setFlash(__('El Juego de Pas ha sido editado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('El Juego de Pas no se pudo editar, intenta más tarde', true), 'flash_failure');
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Juegopa->read(null, $id);
			}
			$smawPortaelectrodos = $this->Juegopa->SmawPortaelectrodo->find('list', array('conditions' => array('SmawPortaelectrodo.psmaw' => 1)) );
			$smawAportes = $this->Juegopa->SmawAporte->find('list', array('conditions' => array('SmawAporte.psmaw' => 1)) );
			$this->set(compact('smawPortaelectrodos', 'smawAportes'));
			
		}
	}
	
	
	function viewimage($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Imagen de Juego de Pas');
		$this->layout = 'ajax';
		if($admin['admin'] == 1) {
			
			if($id) {
				$this->Juegopa->recursive = -1;
				$image = $this->Juegopa->find('first', array(
					'fields' => array('Juegopa.image'),
					'conditions' => array('Juegopa.id' => $id) 
				));
					
				$this->set(compact('image'));
			}
		}
	}

}
?>