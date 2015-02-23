<?php
class UsersController extends AppController {

	var $name = 'Users';
	
	var $components = array('RequestHandler', 'Email');

	function index() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Usuarios');
		if($admin['admin'] == 1) {
			$this->User->recursive = 0;
			$this->set('users', $this->paginate());
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Agregar Usuario');
		if($admin['admin'] == 1) {
			
			if (!empty($this->data)) {
				$this->User->create();
				
				$date = date("Y-m-d H:i:s");
				$this->data['User']['created'] = $date;
				$this->data['User']['password'] = md5(Configure::read('Security.salt').$this->data['User']['password']);
				
				if ($this->User->save($this->data)) {
					
					$this->User->Login->create();
					$userid = $this->User->id;
					
					$login_data = array(
										"Login" => array(
													"user_id" => $userid,
													"last_login" => $date,
													"current_login" => $date,
													"count" => 1
													)
										);
										
					if($this->User->Login->save($login_data)) {
						$loginid = $this->User->Login->id;
						$this->User->read(null, $userid);
						$this->User->set("login_id", $loginid);
						$this->User->save();
					}
					
					$this->Session->setFlash(__('El Usuario ha sido creado en INFRA', true), 'flash_success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.', true), 'flash_failure');
				}
			}
			$groups = $this->User->Group->find('list');
			$levels = $this->User->Level->find('list');
			$this->set(compact('groups', 'levels'));
			
		}
	}

	function edit($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Usuario Edit');
		if($admin['admin'] == 1) {
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid user', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				if ($this->User->save($this->data)) {
					$this->Session->setFlash(__('The user has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->User->read(null, $id);
			}
			$groups = $this->User->Group->find('list');
			$levels = $this->User->Level->find('list');
			$logins = $this->User->Login->find('list');
			$this->set(compact('groups', 'levels', 'logins'));
		} // if admin
	}
	
	function admin() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Administración');
		if($admin['admin'] == 1) {
			
		}
	}
	
	
	function login($ref_url = null) {
		$this->set('title_for_layout','INFRA - Log In'); 
		$logeado = parent::checkLogin();
		if($logeado != 0) {
			$this->Session->setFlash("Ya estás dentro del sistema.", "flash_success");
			$this->redirect('/');
		}
		$this->set(compact('ref_url'));
	}
	
	function logout() {
		$hash_session = md5("i4nf322ra.t32");
		$this->Session->delete($hash_session);
		//$this->Auth->logout();
		$this->Session->setFlash("Has salido del sistema INFRA.", "flash_success");
		$this->redirect('/');
	}
	
	
	function enter() {
		if($this->RequestHandler->isAjax()) {
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				if($_POST['action'] == "send") {
					
					// CON EMAIL
					if(strpos($_POST['name'], "@") == true) {
						$findby = "email";
					} else { 
						$findby = "name";
					} // IF CON EMAIL O NAME
					
						$authlogin = $this->User->find('first', array(
													'conditions' => array(
																  'User.'.$findby => $_POST['name'],
																  'User.password' => md5(Configure::read('Security.salt').$_POST['email'])
																)));
						
						if($authlogin) {
							echo "logged";
							$permisos = $this->Permission->find('first', array(
																'conditions' => array(
																		   'Permission.group_id' => $authlogin['User']['group_id'],
																		   'Permission.level_id' => $authlogin['User']['level_id']
																		   )));
							
							$hash_session = md5("i4nf322ra.t32");											   
							if($permisos) {
								$this->Session->write($hash_session.".admin", $permisos['Permission']['admin']);
								$this->Session->write($hash_session.".usertype", $permisos['Permission']['type']);
							} else {
								$this->Session->write($hash_session.".admin", "0");
								$this->Session->write($hash_session.".usertype", "0");
							}
							$this->Session->write($hash_session.".iduser", $authlogin['User']['id']);
							$this->Session->write($hash_session.".name", $authlogin['User']['name']);
							$this->Session->write($hash_session.".grupo", $authlogin['User']['group_id']);
							$this->Session->write($hash_session.".level", $authlogin['User']['level_id']);
							$this->Session->write($hash_session.".login", $authlogin['Login']['last_login']);
							
							$todays_date = date("Y-m-d H:i:s");
							
							//$this->User->Login->doIncrement($authlogin['User']['id']); 
							
							$login_data = array(
								'Login' => array(
									'id' => $authlogin['User']['id'],
									'last_login' => $authlogin['Login']['current_login'],
									'current_login' => $todays_date
								)
							);
							
							$this->User->Login->save($login_data);
							
						} else { // IF AUTHLOGIN
							echo "error";
						} // IF AUTHLOGIN								
							
					} else {
						echo "none";
					}	
					
					Configure::write('debug', 0);
					$this->autoRender = false;
					exit();		
			} // POST action	
		} //server method POST
	} //function enter
	
	
	function reports() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Reporte de Usuarios');
		if($admin['admin'] == 1) {
			
		}
		
	}
	
	
}
?>