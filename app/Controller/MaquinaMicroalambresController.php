<?php
class MaquinaMicroalambresController extends AppController {

	var $name = 'MaquinaMicroalambres';

	function index() {
		$this->MaquinaMicroalambre->recursive = 0;
		$this->set('maquinaMicroalambres', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid maquina microalambre', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('maquinaMicroalambre', $this->MaquinaMicroalambre->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MaquinaMicroalambre->create();
			if ($this->MaquinaMicroalambre->save($this->data)) {
				$this->Session->setFlash(__('The maquina microalambre has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The maquina microalambre could not be saved. Please, try again.', true));
			}
		}
		$maquinas = $this->MaquinaMicroalambre->Maquina->find('list');
		$microalambres = $this->MaquinaMicroalambre->Microalambre->find('list');
		$this->set(compact('maquinas', 'microalambres'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid maquina microalambre', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MaquinaMicroalambre->save($this->data)) {
				$this->Session->setFlash(__('The maquina microalambre has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The maquina microalambre could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MaquinaMicroalambre->read(null, $id);
		}
		$maquinas = $this->MaquinaMicroalambre->Maquina->find('list');
		$microalambres = $this->MaquinaMicroalambre->Microalambre->find('list');
		$this->set(compact('maquinas', 'microalambres'));
	}

}
?>