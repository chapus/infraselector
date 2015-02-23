<?php
class CalidadgasesController extends AppController {

	var $name = 'Calidadgases';
	
	public $components = array('Search.Prg');
	
	public $presetVars = array(
			array('field' => 'name', 'type' => 'value')
			);
			
			
	public function view() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Gases - Condición de Calidad');
		if($admin['admin'] == 1) {
			
			$this->Prg->commonProcess();
			$this->Calidadgase->recursive = -1;
			
			$this->paginate['Calidadgase'] = array('conditions' => $this->Calidadgase->parseCriteria($this->passedArgs));
			$this->set('data', $this->paginate());
			
		} else {
			$this->Session->setFlash(__('Solo administradores', true), 'flash_failure');
			$this->redirect('/');
		}
		
	}


	
	public function add() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Gases - Add Condición de Calidad');
		if($admin['admin'] == 1) {
			
			if (!empty($this->data)) {
				
				$this->Calidadgase->create();
				if ($this->Calidadgase->save($this->data)) {
					$this->Session->setFlash(__('La Condición de Calidad ha si creado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'view'));
				} else {
					$this->Session->setFlash(__('No se pudo guardar, intente más tarde', true), 'flash_failure');
				}
				
			}
				
				$migGases = $this->Calidadgase->MigGase->find('list', array('order' => array('name'), 'conditions' => array('MigGase.pmig' => 1)) );
				$migCalibres = $this->Calidadgase->MigCalibre->find('list', array('order' => array('name'), 'conditions' => array('MigCalibre.pmig' => 1)) );
				$tigGases = $this->Calidadgase->TigGase->find('list', array('order' => array('name'), 'conditions' => array('TigGase.ptig' => 1)) );
				$tigCalibres = $this->Calidadgase->TigCalibre->find('list', array('order' => array('name'), 'conditions' => array('TigCalibre.ptig' => 1)) );
				$this->set(compact('migCalibres', 'migGases', 'tigCalibres', 'tigGases'));
			
		} else {
			$this->Session->setFlash(__('Solo administradores', true), 'flash_failure');
			$this->redirect('/');
		}
		
	}
	
	
	public function edit($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Gases - Edit Condición de Calidad');
		if($admin['admin'] == 1) {
			
			if (!empty($this->data)) {
				$this->Calidadgase->create();
				if ($this->Calidadgase->save($this->data)) {
					$this->Session->setFlash(__('La Condición de Calidad ha si editado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'view'));
				} else {
					$this->Session->setFlash(__('No se pudo guardar, intente más tarde', true), 'flash_failure');
				}
			}
			
			if (empty($this->data)) {
				$this->data = $this->Calidadgase->read(null, $id);
				
				$migGases = $this->Calidadgase->MigGase->find('list', array('order' => array('name'), 'conditions' => array('MigGase.pmig' => 1)) );
				$migCalibres = $this->Calidadgase->MigCalibre->find('list', array('order' => array('name'), 'conditions' => array('MigCalibre.pmig' => 1)) );
				$tigGases = $this->Calidadgase->TigGase->find('list', array('order' => array('name'), 'conditions' => array('TigGase.ptig' => 1)) );
				$tigCalibres = $this->Calidadgase->TigCalibre->find('list', array('order' => array('name'), 'conditions' => array('TigCalibre.ptig' => 1)) );
				$this->set(compact('migCalibres', 'migGases', 'tigCalibres', 'tigGases'));
			}
			
		} else {
			$this->Session->setFlash(__('Solo administradores', true), 'flash_failure');
			$this->redirect('/');
		}
		
	}
	
	
	public function ccalidad() {
				
				//$this->Calidadgase->MigCalibreCalidadgase->recursive = 1;
				$this->Calidadgase->MigCalibreCalidadgase->Behaviors->attach('Containable');
				$c_calibre = $this->Calidadgase->MigCalibreCalidadgase->find('all', array('contain' => array('Calibre'), 'conditions' => array('MigCalibreCalidadgase.calibre_id' => 2) ) );
				
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