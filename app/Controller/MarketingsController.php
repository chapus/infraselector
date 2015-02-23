<?php
class MarketingsController extends AppController {

	var $name = 'Marketings';

	var $components = array('Email');
	
	var $uses = array('Marketing', 'Customer');

	function index() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Marketing');
		if($admin['admin'] == 1) {
			$this->Marketing->recursive = 0;
			$this->set('marketings', $this->paginate());
		}
	}

	function view($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Marketing');
		if($admin['admin'] == 1) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid marketing', true));
				$this->redirect(array('action' => 'index'));
			}
			$this->set('marketing', $this->Marketing->read(null, $id));
		}
	}

	function send() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Marketing');
		if($admin['admin'] == 1) {
			
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->data['Marketing']['created'] = $date;
				$this->data['Marketing']['creator_id'] = $admin['iduser'];
				
				$a_users = array();
				$b_users = array('limpaspid@yahoo.com', 'sergio.pereda@spidertechcorp.com');
				$users = $this->Customer->find('all', array(
										'fields' => array('Customer.correo'),
										'conditions' => array('Customer.marketing' => 1) ) );
				foreach($users as $user) {
					array_push($a_users, $user['Customer']['correo']);
				}
				$a_users = array_unique($a_users);
				
				//FOR TESTING
				
				$this->Email->smtpOptions = array(
					'port' => '465',
					'timeout' => '30',
					'host' => 'ssl://smtp.gmail.com',
					'username' => 'contacto@infra-selector.com.mx',
					'password' => 's3rg10s33',
					'charset' => 'utf-8'
				);
				$this->Email->delivery = 'smtp';
				
				//FOR TESTING
		
				$this->Email->to = 'Usuarios Selector <no-reply@infra-selector.com.mx>';
				$this->Email->bcc = $b_users;  
				$this->Email->replyTo = 'fabhernandez@infra.com.mx';
				$this->Email->from = 'INFRA Selector <no-reply@infra-selector.com.mx>';
				$this->Email->subject = $this->data['Marketing']['name'];
				
				$this->Email->template = 'mktinfra';
				//Send as 'html', 'text' or 'both' (default is 'text')
				$this->Email->sendAs = 'html';

				$this->set('title', $this->data['Marketing']['name']);
				$this->set('body', $this->data['Marketing']['body']);
				//$this->set('link', $_POST['mkt_link']);
				
				if( $this->Email->send() ) {
					
					$this->Marketing->create();
					if ($this->Marketing->save($this->data) ) {
						$this->Session->setFlash(__('The marketing has been saved', true), 'flash_success');
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The marketing could not be saved. Please, try again.', true), 'flash_failure');
					}
					
				} else {
					$this->Session->setFlash(__('Los mails no pudieron ser enviados. Intente más tarde.', true), 'flash_failure');
				}
			}
			
			$clientes = $this->Customer->find('count', array('conditions' => array('Customer.marketing' => 1) ) );
			$this->set(compact('clientes') );
			
		}
	}


}
?>