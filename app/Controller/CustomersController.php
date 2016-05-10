<?php
App::uses('CakeEmail', 'Network/Email');

class CustomersController extends AppController {

	var $name = 'Customers';

	function index() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Clientes');
		if($admin['admin'] == 1) {
			$this->Customer->recursive = 1;
			
			$this->set('customers', $this->paginate( array('Customer.hide' => 0) ));
		}
	}

	function view($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Ver Cliente');
		if($admin['admin'] == 1) {
			
			if (!$id) {
				$this->Session->setFlash(__('Invalid customer', true));
				$this->redirect(array('action' => 'index'));
			}
			$this->set('customer', $this->Customer->read(null, $id));
			
		}
	}

	function add() {
		if (!empty($this->data)) {
			
			$this->Customer->create();
			if ($this->Customer->save($this->request->data)) {
				  $ch = curl_init();  
				  $timeout = 5;  
				  $url = 'http://www.infra.com.mx/selector'.$this->request->data['Customer']['page'];
				  $url = str_replace("/selector/selector/", "/selector/", $url);
				  curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url);  
				  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  
				  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);  
				  $this->request->data['Customer']['link'] = curl_exec($ch);  
				  curl_close($ch);   

				$this->_sendEmail($this->request->data);
				
				$this->Session->setFlash(__('Tu petición ha sido enviada a nuestros asesores. Pronto se estarán comunicando contigo.', true), 'flash_success');
				//$this->set($this->data['Customer']['page']);
				//debug($this->data);
				$this->redirect('/solicitudenviada');
			} else {
				$this->Session->setFlash(__('No se pudo enviar el mensaje intenta de nuevo.', true));
				$this->redirect('/'.$this->data['Customer']['page']);
			}
		}
	}
	
	
	function _sendEmail($data = null) {
		try {
			//$data = $this->Customer->find('first', array('conditions' => array('Customer.id' => $id) ) );
			$proceso = '';
			
			if($data['Customer']['selector'] == 1) {
				$proceso = "Proceso MIG";
			} elseif($data['Customer']['selector'] == 2) {
				$proceso = "Proceso TIG";
			} elseif($data['Customer']['selector'] == 3) {
				$proceso = "Proceso SMAW";
			} elseif($data['Customer']['selector'] == 4) {
				$proceso = "Proceso PAC";
			}
			
			$mandara = ["emota@infra.com.mx"];
			$emials = [];
			$emials = $this->Customer->Ciudade->find('first', array('conditions' => array('Ciudade.id' => $data['Customer']['ciudade_id']) ) );
			if(isset($emials) ) {
				if($emials['Ciudade']['gerente'] != "") {
					array_push($mandara, $emials['Ciudade']['gerente']);
				}
				if($emials['Ciudade']['tecnico'] != "") {
					array_push($mandara, $emials['Ciudade']['tecnico']);
				}
				if($emials['Ciudade']['sucursal'] != "") {
					array_push($mandara, $emials['Ciudade']['sucursal']);
				}
				if($emials['Ciudade']['vendedor1'] != "") {
					array_push($mandara, $emials['Ciudade']['vendedor1']);
				}
				if($emials['Ciudade']['vendedor2'] != "") {
					array_push($mandara, $emials['Ciudade']['vendedor2']);
				}
				if($emials['Ciudade']['vendedor3'] != "") {
					array_push($mandara, $emials['Ciudade']['vendedor3']);
				}
				if($emials['Ciudade']['vendedor4'] != "") {
					array_push($mandara, $emials['Ciudade']['vendedor4']);
				}
				if($emials['Ciudade']['vendedor5'] != "") {
					array_push($mandara, $emials['Ciudade']['vendedor5']);
				}
				if($emials['Ciudade']['vendedor6'] != "") {
					array_push($mandara, $emials['Ciudade']['vendedor6']);
				}
			}
			
			$mandara = array_filter(array_map('trim', $mandara));
			
			$Email = new CakeEmail();

			//FOR TESTING
			$Email->config('smtp');
			//$mandara = array('sergio.pereda@spidertechcorp.com');
			//FOR TESTING
			//debug($mandara);
			$Email->to($mandara);
			//$this->Email->bcc( array('soporte@spidertechcorp.com', 'publicidad@infra.com.mx', 'rcampos@infra.com.mx') );  
			//$this->Email->bcc( array('soporte@spidertechcorp.com') );  
			$Email->replyTo('selector@infra.com.mx');
			$Email->from('selector@infra.com.mx', 'Selector INFRA - '.$proceso);
			$Email->subject($data['Customer']['name'].' solicitó una cotización'); // note no '.ctp'
			
			$Email->template('newcotizacion');
			$Email->emailFormat('html'); // because we like to send pretty mail
			//debug($data);
			$Email->viewVars( array('user' => $data) );
			
			$Email->send();
			//$this->set('smtp_errors', $this->Email->smtpError);
		} catch (Exception $e) {
			$this->log("No se pudo mandar el correo. Error: ".$e, 'debug');
		} finally {

		}
	}
	
	
	function manual() {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Agregar Cliente Manualmente');
		if($admin['admin'] == 1) {
			
			if (!empty($this->data)) {
				
				$date = date("Y-m-d H:i:s");
				$this->data['Customer']['created'] = $date;
				
				$this->Customer->create();
				if ($this->Customer->save($this->data)) {
					$this->Session->setFlash(__('El Cliente ha sido agregado al sistema.', true), 'flash_success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('El Cliente no pudo ser guardado, intenta más tarde.', true), 'flash_failure');
				}
			
			}
			
			$ciudades = $this->Customer->Ciudade->find('list', array('conditions' => array('Ciudade.hidden' => 0), 'order' => array('Ciudade.name ASC') ) );
			$this->set(compact('ciudades'));
		}
	}
	
	
	function edit($id = null) {
		$admin = parent::checkSession($_SERVER['REQUEST_URI']);
		$this->set('title_for_layout','INFRA - Editar Cliente');
		if($admin['admin'] == 1) {
			
			if (!empty($this->data)) {
				
				//$date = date("Y-m-d H:i:s");
				//$this->data['Customer']['created'] = $date;
				
				if ($this->Customer->save($this->data)) {
					$this->Session->setFlash(__('El Cliente ha sido actualizado en el sistema.', true), 'flash_success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('El Cliente no pudo ser actualizado, intenta más tarde.', true), 'flash_failure');
				}
			
			}
			
			
			if (empty($this->data)) {
				$this->data = $this->Customer->read(null, $id);
			}
			$ciudades = $this->Customer->Ciudade->find('list', array('conditions' => array('Ciudade.hidden' => 0), 'order' => array('Ciudade.name ASC') ) );
			$this->set(compact('ciudades'));
			
		}
	}

}
?>