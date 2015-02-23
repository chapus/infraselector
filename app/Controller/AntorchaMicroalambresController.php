<?php
class AntorchaMicroalambresController extends AppController {

	var $name = 'AntorchaMicroalambres';

	function index() {
		$this->AntorchaMicroalambre->recursive = 0;
		$this->set('antorchaMicroalambres', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid antorcha microalambre', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('antorchaMicroalambre', $this->AntorchaMicroalambre->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->AntorchaMicroalambre->create();
			if ($this->AntorchaMicroalambre->save($this->data)) {
				$this->Session->setFlash(__('The antorcha microalambre has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The antorcha microalambre could not be saved. Please, try again.', true));
			}
		}
		$antorchas = $this->AntorchaMicroalambre->Antorcha->find('list');
		$microalambres = $this->AntorchaMicroalambre->Microalambre->find('list');
		$this->set(compact('antorchas', 'microalambres'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid antorcha microalambre', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->AntorchaMicroalambre->save($this->data)) {
				$this->Session->setFlash(__('The antorcha microalambre has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The antorcha microalambre could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AntorchaMicroalambre->read(null, $id);
		}
		$antorchas = $this->AntorchaMicroalambre->Antorcha->find('list');
		$microalambres = $this->AntorchaMicroalambre->Microalambre->find('list');
		$this->set(compact('antorchas', 'microalambres'));
	}

}
?>