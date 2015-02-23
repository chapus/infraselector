<?php
class ProteccioneReguladorsController extends AppController {

	var $name = 'ProteccioneReguladors';

	function index() {
		$this->ProteccioneRegulador->recursive = 0;
		$this->set('proteccioneReguladors', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid proteccione regulador', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('proteccioneRegulador', $this->ProteccioneRegulador->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProteccioneRegulador->create();
			if ($this->ProteccioneRegulador->save($this->data)) {
				$this->Session->setFlash(__('The proteccione regulador has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The proteccione regulador could not be saved. Please, try again.', true));
			}
		}
		$protecciones = $this->ProteccioneRegulador->Proteccione->find('list');
		$reguladors = $this->ProteccioneRegulador->Regulador->find('list');
		$this->set(compact('protecciones', 'reguladors'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid proteccione regulador', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProteccioneRegulador->save($this->data)) {
				$this->Session->setFlash(__('The proteccione regulador has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The proteccione regulador could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProteccioneRegulador->read(null, $id);
		}
		$protecciones = $this->ProteccioneRegulador->Proteccione->find('list');
		$reguladors = $this->ProteccioneRegulador->Regulador->find('list');
		$this->set(compact('protecciones', 'reguladors'));
	}

}
?>