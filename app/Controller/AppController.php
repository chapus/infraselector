<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	var $uses = array('User', 'Permission');
	
	var $session_info;

	var $hash_session;
	
	
	function beforeFilter() {
		// Get session data for appllication use
		$hash_session = md5("i4nf322ra.t32");
		$this->session_info = $this->Session->read($hash_session);
	}
	
	function beforeRender() {
		// Make app variables available to view
		$this->set('session_info', $this->session_info);
	}
	
	function checkLogin() {
		$hash_session = md5("i4nf322ra.t32");
		$usuario = $this->Session->read($hash_session);
		
		if (!$usuario){
			return 0;
		} else {
			return 1;
		}
		
	}
	
	
	function checkSession($ref_url = null) {
		
		$hash_session = md5("i4nf322ra.t32");
		$username = $this->Session->read($hash_session.'.name');
		// if the $username is empty,
		// send user to login page
		if (!$username){
			$this->Session->setFlash('Necesitas entrar primero al sistema.', "flash_failure");
			//$this->redirect(array('controller' => 'users', 'action' => 'login', str_replace('/', '__', $ref_url) ));
			$this->redirect(array('controller' => '', 'action' => 'login', str_replace('/', '__', $ref_url) ));
		} else {
			// if $username is not empty,
			// check to make sure it's correct
			$results = $this->User->findByName($username);
	
			// if not correct, send to login page
			if(!$results){
				$this->Session->delete($hash_session);
				$this->Session->setFlash('Wrong information. Please Log In again.', "flash_failure");
				$this->redirect('/login');
				exit();
			}
			$usuario = $this->Session->read($hash_session);
			//$valid_page = '/'.$controlador.'/'.$accion;
			//$this->redirect($valid_page);
			return $usuario;
		}
	}
	
	
	function readSession() {
		$hash_session = md5("i4nf322ra.t32");
		$username = $this->Session->read($hash_session);
	
		if (!$username){
			$this->Session->delete($hash_session);
		}
	}
	

	/** 
	 * uploads files to the server 
	 * @params: 
	 *      $folder     = the folder to upload the files e.g. 'img/files' 
	 *      $formdata   = the array containing the form files 
	 *      $itemId     = id of the item (optional) will create a new sub folder 
	 * @return: 
	 *      will return an array with the success of each file upload 
	 */  
	function uploadFiles($folder, $formdata, $itemId = null) {  
	    // setup dir names absolute and relative  
	    $folder_url = WWW_ROOT.$folder;  
	    $rel_url = $folder;  
		$rel_thumb_url = $folder.'/thumbs';
	      
	    // create the folder if it does not exist  
	    if(!is_dir($folder_url)) {  
	        mkdir($folder_url);  
	    }  
	          
	    // if itemId is set create an item folder  
	    if($itemId) {  
	        // set new absolute folder  
	        $folder_url = WWW_ROOT.$folder.'/'.$itemId;   
	        // set new relative folder  
	        $rel_url = $folder.'/'.$itemId;  
	        // create directory  
	        if(!is_dir($folder_url)) {  
	            mkdir($folder_url);  
	        }  
	    }  
	      
	    // list of permitted file types, this is only images but documents can be added  
	    $permitted = array('image/gif','image/jpeg','image/pjpeg','image/png', 'application/pdf', 'application/x-shockwave-flash', 'video/x-flv', 'video/mpeg', 'video/mp4');  
	      
	    // loop through and deal with the files  
	    //foreach($formdata as $file) {  
	        // replace spaces with underscores  
	        $filename = str_replace(' ', '_', $formdata['name']);  
	        // assume filetype is false  
	        $typeOK = false;  
	        // check filetype is ok  
	        foreach($permitted as $type) {  
	            if($type == $formdata['type']) {  
	                $typeOK = true;  
	                break;  
	            }
	        }  

	        // if file type ok upload the file  
	        if($typeOK) {  
	            // switch based on error code  
	            switch($formdata['error']) {  
	                case 0:  
	                    // check filename already exists  
	                    if(!file_exists($folder_url.'/'.$filename)) {  
	                        // create full filename  
	                        $full_url = $folder_url.'/'.$filename;  
	                        $url = $rel_url.'/'.$filename;  
							$thumb_url = $rel_thumb_url.'/'.$filename;
	                        // upload the file  
	                        $success = move_uploaded_file($formdata['tmp_name'], $url);  
	                    } else {  
	                        // create unique filename and upload file  
	                        ini_set('date.timezone', 'Europe/London');  
	                        $now = date('Y-m-d-His');  
	                        $full_url = $folder_url.'/'.$now.$filename;  
	                        $url = $rel_url.'/'.$now.$filename;  
							$thumb_url = $rel_thumb_url.'/'.$now.$filename;  
							
	                        $success = move_uploaded_file($formdata['tmp_name'], $url);  
	                    }  
	                    // if upload was successful  
	                    if($success) {  
	                        // save the url of the file  
	                        $result['urls'][] = $url; 
							$result['urls'][] = $thumb_url;
	                    } else {  
	                        $result['errors'][] = "Error uploaded $filename. Please try again.";  
	                    }  
	                    break;  
	                case 3:  
	                    // an error occured  
	                    $result['errors'][] = "Error uploading $filename. Please try again.";  
	                    break;  
	                default:  
	                    // an error occured  
	                    $result['errors'][] = "System error uploading $filename. Contact webmaster.";  
	                    break;  
	            }  
	        } elseif($formdata['error'] == 4) {  
	            // no file was selected for upload  
	            $result['nofiles'][] = "No file Selected";  
	        } else {  
	            // unacceptable file type  
	            $result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";  
	        }  
	    //}  
	return $result;  
	}  


}
