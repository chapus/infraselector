<?php
class AporteGasesController extends AppController {

	var $name = 'AporteGases';

	function index() {
		$this->AporteGase->recursive = 0;
		$this->set('aporteGases', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid aporte gase', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('aporteGase', $this->AporteGase->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->AporteGase->create();
			if ($this->AporteGase->save($this->data)) {
				$this->Session->setFlash(__('The aporte gase has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aporte gase could not be saved. Please, try again.', true));
			}
		}
		$aportes = $this->AporteGase->Aporte->find('list');
		$gas = $this->AporteGase->Ga->find('list');
		$this->set(compact('aportes', 'gas'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid aporte gase', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->AporteGase->save($this->data)) {
				$this->Session->setFlash(__('The aporte gase has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aporte gase could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AporteGase->read(null, $id);
		}
		$aportes = $this->AporteGase->Aporte->find('list');
		$gas = $this->AporteGase->Ga->find('list');
		$this->set(compact('aportes', 'gas'));
	}

}
?>