<?php
class LoginsController extends AppController {

	var $name = 'Logins';

	function index() {
		$this->Login->recursive = 0;
		$this->set('logins', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid login', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('login', $this->Login->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Login->create();
			if ($this->Login->save($this->data)) {
				$this->Session->setFlash(__('The login has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The login could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Login->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid login', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Login->save($this->data)) {
				$this->Session->setFlash(__('The login has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The login could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Login->read(null, $id);
		}
		$users = $this->Login->User->find('list');
		$this->set(compact('users'));
	}

}
?>