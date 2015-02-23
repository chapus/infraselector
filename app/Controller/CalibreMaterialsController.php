<?php
class CalibreMaterialsController extends AppController {

	var $name = 'CalibreMaterials';

	function index() {
		$this->CalibreMaterial->recursive = 0;
		$this->set('calibreMaterials', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid calibre material', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('calibreMaterial', $this->CalibreMaterial->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CalibreMaterial->create();
			if ($this->CalibreMaterial->save($this->data)) {
				$this->Session->setFlash(__('The calibre material has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calibre material could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid calibre material', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CalibreMaterial->save($this->data)) {
				$this->Session->setFlash(__('The calibre material has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calibre material could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CalibreMaterial->read(null, $id);
		}
	}

}
?>