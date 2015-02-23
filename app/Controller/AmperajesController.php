<?php
class AmperajesController extends AppController {

	var $name = 'Amperajes';
	
	public $components = array('Search.Prg');
	
	public $presetVars = array(
			array('field' => 'name', 'type' => 'value')
			);
			
			
	public function view() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Material/Calibre - Rango de Amperaje');
		if($admin['admin'] == 1) {
			
			$this->Prg->commonProcess();
			$this->Amperaje->recursive = -1;
			
			$this->paginate['Amperaje'] = array('conditions' => $this->Amperaje->parseCriteria($this->passedArgs));
			$this->set('data', $this->paginate());
			
		} else {
			$this->Session->setFlash(__('Solo administradores', true), 'flash_failure');
			$this->redirect('/');
		}
		
	}


	
	public function add() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Material/Calibre - Add Rango de Amperaje');
		if($admin['admin'] == 1) {
			
			if (!empty($this->data)) {
				
				$this->Amperaje->create();
				if ($this->Amperaje->save($this->data)) {
					$this->Session->setFlash(__('EL Rango de Amperaje ha si creado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'view'));
				} else {
					$this->Session->setFlash(__('No se pudo guardar, intente más tarde', true), 'flash_failure');
				}
				
			}
				
				$tigMaterials = $this->Amperaje->TigMaterial->find('list', array('order' => array('name'), 'conditions' => array('TigMaterial.ptig' => 1)) );
				$tigCalibres = $this->Amperaje->TigCalibre->find('list', array('order' => array('name'), 'conditions' => array('TigCalibre.ptig' => 1)) );
				$this->set(compact('tigCalibres', 'tigMaterials'));
			
		} else {
			$this->Session->setFlash(__('Solo administradores', true), 'flash_failure');
			$this->redirect('/');
		}
		
	}
	
	
	public function edit($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Material/Calibre - Edit Rango de Amperaje');
		if($admin['admin'] == 1) {
			
			if (!empty($this->data)) {
				$this->Amperaje->create();
				if ($this->Amperaje->save($this->data)) {
					$this->Session->setFlash(__('EL Rango de Amperaje ha si editado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'view'));
				} else {
					$this->Session->setFlash(__('No se pudo guardar, intente más tarde', true), 'flash_failure');
				}
			}
			
			if (empty($this->data)) {
				$this->data = $this->Amperaje->read(null, $id);
				
				$tigMaterials = $this->Amperaje->TigMaterial->find('list', array('order' => array('name'), 'conditions' => array('TigMaterial.ptig' => 1)) );
				$tigCalibres = $this->Amperaje->TigCalibre->find('list', array('order' => array('name'), 'conditions' => array('TigCalibre.ptig' => 1)) );
				$this->set(compact('tigCalibres', 'tigMaterials'));
			}
			
		} else {
			$this->Session->setFlash(__('Solo administradores', true), 'flash_failure');
			$this->redirect('/');
		}
		
	}
	
	
	public function ccalidad() {
				
				//$this->Amperaje->MigCalibreAmperaje->recursive = 1;
				$this->Amperaje->MigCalibreAmperaje->Behaviors->attach('Containable');
				$c_calibre = $this->Amperaje->MigCalibreAmperaje->find('all', array('contain' => array('Calibre'), 'conditions' => array('MigCalibreAmperaje.calibre_id' => 2) ) );
				
				/*
				foreach($c_calibre as $c1) {
					$hold = $this->Microalambre->find('first', array(
						'conditions' => array('Microalambre.pmig' => 1, 'Microalambre.id' => $microalambre['Mig']['microalambre_id']),
						'fields' => array('Microalambre.id', 'Microalambre.name', 'Microalambre.short')
					));
					array_push($result,$hold);
				}
				
				return(json_encode($result));
				*/
				//debug($c_calibre);
				$this->set(compact('c_calibre') );

	}
	

}
?>