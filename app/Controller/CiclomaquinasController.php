<?php
class CiclomaquinasController extends AppController {

	var $name = 'Ciclomaquinas';
	
	public $components = array('Search.Prg');
	
	public $presetVars = array(
			array('field' => 'name', 'type' => 'value'),
			array('field' => 'description', 'type' => 'value')
			);
			
			
	public function view() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Maquinas - Ciclo de Trabajo');
		if($admin['admin'] == 1) {
			
			$this->Prg->commonProcess();
			$this->Ciclomaquina->recursive = -1;
			
			$this->paginate['Ciclomaquina'] = array('conditions' => $this->Ciclomaquina->parseCriteria($this->passedArgs));
			$this->set('data', $this->paginate());
			
		} else {
			$this->Session->setFlash(__('Solo administradores', true), 'flash_failure');
			$this->redirect('/');
		}
		
	}
	
	
	public function add() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Maquinas - Add Ciclo de Trabajo');
		if($admin['admin'] == 1) {
			
			if (!empty($this->data)) {
				
				$this->Ciclomaquina->create();
				if ($this->Ciclomaquina->save($this->data)) {
					$this->Session->setFlash(__('El Ciclo de Trabajo ha si creado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'view'));
				} else {
					$this->Session->setFlash(__('No se pudo guardar, intente más tarde', true), 'flash_failure');
				}
				
			}
			
		} else {
			$this->Session->setFlash(__('Solo administradores', true), 'flash_failure');
			$this->redirect('/');
		}
		
	}
	
	
	public function edit($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Maquinas - Edit Ciclo de Trabajo');
		if($admin['admin'] == 1) {
			
			if (!empty($this->data)) {
				$this->Ciclomaquina->create();
				if ($this->Ciclomaquina->save($this->data)) {
					$this->Session->setFlash(__('El Ciclo de Trabajo ha si editado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'view'));
				} else {
					$this->Session->setFlash(__('No se pudo guardar, intente más tarde', true), 'flash_failure');
				}
			}
			
			if (empty($this->data)) {
				$this->data = $this->Ciclomaquina->read(null, $id);
			}
			
		} else {
			$this->Session->setFlash(__('Solo administradores', true), 'flash_failure');
			$this->redirect('/');
		}
		
	}
	

}
?>