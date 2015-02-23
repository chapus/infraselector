<?php
class CiudadesController extends AppController {

	var $name = 'Ciudades';

	function index() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Ciudades y Áreas');
		if($admin['admin'] == 1) {
			$this->Ciudade->recursive = 0;
			$this->set('ciudades', $this->paginate());
		}
	}

	function view($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Ciudad / Área');
		if($admin['admin'] == 1) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid Ciudad / Área', true));
				$this->redirect(array('action' => 'index'));
			}
			$this->set('ciudad', $this->Ciudade->read(null, $id));
		}
	}
	
	
	function add() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Add Ciudad / Área');
		if($admin['admin'] == 1) {
			
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->data['Ciudade']['created'] = $date;
				$this->data['Ciudade']['creator_id'] = $admin['iduser'];
				
				if ($this->Ciudade->save($this->data) ) {
					$this->Session->setFlash(__('La Ciudad ha sido agregada con éxito.', true), 'flash_success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('La ciudad no se pudo guardar, intente más tarde.', true), 'flash_failure');
				}
				
			}
			
		}
	}
	
	function edit($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Edit Ciudad / Área');
		if($admin['admin'] == 1) {
			
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Ciudad inválida', true), 'flash_failure');
				$this->redirect(array('action' => 'index'));
			}
			
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->data['Ciudade']['modified'] = $date;
				$this->data['Ciudade']['modifier_id'] = $admin['iduser'];
				
				if ($this->Ciudade->save($this->data) ) {
					$this->Session->setFlash(__('La Ciudad ha sido editada con éxito.', true), 'flash_success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('La ciudad no se pudo guardar, intente más tarde.', true), 'flash_failure');
				}
				
			}
			
			if (empty($this->data)) {
				$this->data = $this->Ciudade->read(null, $id);
			}
			
		}
	}
	
	


}
?>