<?php
class SeccionsController extends AppController {

	var $name = 'Seccions';
	
	public $components = array('Search.Prg', 'RequestHandler');
	
	var $uses = array('Seccion', 'Proteccione');
	
	public $presetVars = array(
			array('field' => 'name', 'type' => 'value')
			);

	function viewall() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Secciones');
		if($admin['admin'] == 1) {
			
			$this->Prg->commonProcess();
			$this->Seccion->recursive = -1;
			
			$this->paginate['Seccion'] = array('conditions' => $this->Seccion->parseCriteria($this->passedArgs));
			$this->set('data', $this->paginate());
		}
	}

	function add() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Nueva Sección');
		if($admin['admin'] == 1) {
			
			if (!empty($this->data)) {
				$this->Seccion->create();
				if ($this->Seccion->save($this->data)) {
					$this->Session->setFlash(__('La Sección ha sido guardada con éxito.', true));
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('La sección no se pudo guardar, intenta de nuevo.', true));
				}
			}
		}
	}

	function edit($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Editar Sección');
		if($admin['admin'] == 1) {
			
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid seccion', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				if ($this->Seccion->save($this->data)) {
					$this->Session->setFlash(__('La Sección ha sido editada con éxito', true));
					$this->redirect(array('action' => 'viewall'));
				} else {
					$this->Session->setFlash(__('La sección no se pudo guardar, intenta de nuevo.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Seccion->read(null, $id);
			}
			
		}
	}
	
	function getMig($id = null) {
		if($id) {
			$this->Proteccione->recursive = -1;
			$protecciones = $this->Seccion->Proteccione->find('all', array('conditions' => array('Proteccione.seccion_id' => $id, 'Proteccione.pmig' => 1) ) );
		}
		$this->set(compact('protecciones') );
	}
	
	function getTig($id = null) {
		if($id) {
			$this->Proteccione->recursive = -1;
			$protecciones = $this->Seccion->Proteccione->find('all', array('conditions' => array('Proteccione.seccion_id' => $id, 'Proteccione.ptig' => 1) ) );
		}
		$this->set(compact('protecciones') );
	}
	
	function getSmaw($id = null) {
		if($id) {
			$this->Proteccione->recursive = -1;
			$protecciones = $this->Seccion->Proteccione->find('all', array('conditions' => array('Proteccione.seccion_id' => $id, 'Proteccione.psmaw' => 1) ) );
		}
		$this->set(compact('protecciones') );
	}
	
	function getPac($id = null) {
		if($id) {
			$this->Proteccione->recursive = -1;
			$protecciones = $this->Seccion->Proteccione->find('all', array('conditions' => array('Proteccione.seccion_id' => $id, 'Proteccione.ppac' => 1) ) );
		}
		$this->set(compact('protecciones') );
	}

	

}
?>