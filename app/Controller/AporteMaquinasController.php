<?php
class AporteMaquinasController extends AppController {

	var $name = 'AporteMaquinas';

	function index() {
		$this->AporteMaquina->recursive = 0;
		$this->set('aporteMaquinas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid aporte maquina', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('aporteMaquina', $this->AporteMaquina->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->AporteMaquina->create();
			if ($this->AporteMaquina->save($this->data)) {
				$this->Session->setFlash(__('The aporte maquina has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aporte maquina could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid aporte maquina', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->AporteMaquina->save($this->data)) {
				$this->Session->setFlash(__('The aporte maquina has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aporte maquina could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AporteMaquina->read(null, $id);
		}
	}

}
?>