<?php
class CalibreGasesController extends AppController {

	var $name = 'CalibreGases';

	function index() {
		$this->CalibreGase->recursive = 0;
		$this->set('calibreGases', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid calibre gase', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('calibreGase', $this->CalibreGase->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CalibreGase->create();
			if ($this->CalibreGase->save($this->data)) {
				$this->Session->setFlash(__('The calibre gase has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calibre gase could not be saved. Please, try again.', true));
			}
		}
		$calibres = $this->CalibreGase->Calibre->find('list');
		$gases = $this->CalibreGase->Gase->find('list');
		$this->set(compact('calibres', 'gases'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid calibre gase', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CalibreGase->save($this->data)) {
				$this->Session->setFlash(__('The calibre gase has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calibre gase could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CalibreGase->read(null, $id);
		}
		$calibres = $this->CalibreGase->Calibre->find('list');
		$gases = $this->CalibreGase->Gase->find('list');
		$this->set(compact('calibres', 'gases'));
	}

}
?>