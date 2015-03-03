<?php
class AccesoriosController extends AppController {

	var $name = 'Accesorios';
	
	public $components = array('Search.Prg');
	
	public $presetVars = array(
			array('field' => 'ceramica', 'type' => 'value'),
			array('field' => 'portamordaza', 'type' => 'value'),
			array('field' => 'mordaza', 'type' => 'value'),
			array('field' => 'tapa', 'type' => 'value'),
			array('field' => 'tungsteno', 'type' => 'value')
			);
			
			
	public function view() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Material/Calibre - Accesorios para Ensamble de Antorcha');
		if($admin['admin'] == 1) {
			
			$this->Prg->commonProcess();
			$this->Accesorio->recursive = -1;
			
			$this->paginate['Accesorio'] = array('conditions' => $this->Accesorio->parseCriteria($this->passedArgs));
			$this->set('data', $this->paginate());
			
		} else {
			$this->Session->setFlash(__('Solo administradores', true), 'flash_failure');
			$this->redirect('/');
		}
		
	}


	
	public function add() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Material/Calibre - Add Accesorios para Ensamble de Antorcha');
		if($admin['admin'] == 1) {
			
			if (!empty($this->request->data)) {
				
				$this->Accesorio->create();
				if ($this->Accesorio->save($this->data)) {
					$this->Session->setFlash(__('EL Accesorios para Ensamble de Antorcha ha si creado con éxito'), 'flash_success');
					$this->redirect(array('action' => 'view'));
				} else {
					$this->Session->setFlash(__('No se pudo guardar, intente más tarde'), 'flash_failure');
				}
				
			}
				
				$tigMaterials = $this->Accesorio->TigMaterial->find('list', array('order' => array('name'), 'conditions' => array('TigMaterial.ptig' => 1)) );
				$tigCalibres = $this->Accesorio->TigCalibre->find('list', array('order' => array('name'), 'conditions' => array('TigCalibre.ptig' => 1)) );
				$this->set(compact('tigCalibres', 'tigMaterials'));
			
		} else {
			$this->Session->setFlash(__('Solo administradores', true), 'flash_failure');
			$this->redirect('/');
		}
		
	}
	
	
	public function edit($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Material/Calibre - Edit Accesorios para Ensamble de Antorcha');
		if($admin['admin'] == 1) {
			
			if (!empty($this->request->data)) {
				$this->Accesorio->create();
				if ($this->Accesorio->save($this->data)) {
					$this->Session->setFlash(__('EL Accesorios para Ensamble de Antorcha ha si editado con éxito', true), 'flash_success');
					$this->redirect(array('action' => 'view'));
				} else {
					$this->Session->setFlash(__('No se pudo guardar, intente más tarde', true), 'flash_failure');
				}
			}
			
			if (empty($this->data)) {
				$this->data = $this->Accesorio->read(null, $id);
				
				$tigMaterials = $this->Accesorio->TigMaterial->find('list', array('order' => array('name'), 'conditions' => array('TigMaterial.ptig' => 1)) );
				$tigCalibres = $this->Accesorio->TigCalibre->find('list', array('order' => array('name'), 'conditions' => array('TigCalibre.ptig' => 1)) );
				$this->set(compact('tigCalibres', 'tigMaterials'));
			}
			
		} else {
			$this->Session->setFlash(__('Solo administradores', true), 'flash_failure');
			$this->redirect('/');
		}
		
	}
	
	
	public function ccalidad() {
				
				//$this->Accesorio->MigCalibreAccesorio->recursive = 1;
				$this->Accesorio->MigCalibreAccesorio->Behaviors->attach('Containable');
				$c_calibre = $this->Accesorio->MigCalibreAccesorio->find('all', array('contain' => array('Calibre'), 'conditions' => array('MigCalibreAccesorio.calibre_id' => 2) ) );
				
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