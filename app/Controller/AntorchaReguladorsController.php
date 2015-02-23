<?php
class AntorchaReguladorsController extends AppController {

	var $name = 'AntorchaReguladors';

	function index() {
		$this->AntorchaRegulador->recursive = 0;
		$this->set('antorchaReguladors', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid antorcha regulador', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('antorchaRegulador', $this->AntorchaRegulador->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->AntorchaRegulador->create();
			if ($this->AntorchaRegulador->save($this->data)) {
				$this->Session->setFlash(__('The antorcha regulador has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The antorcha regulador could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid antorcha regulador', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->AntorchaRegulador->save($this->data)) {
				$this->Session->setFlash(__('The antorcha regulador has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The antorcha regulador could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AntorchaRegulador->read(null, $id);
		}
	}

}
?>