<?php
/******************************************************
 * @package Zee blog module for Zeestore 1.5.x
 * @version 1.0
 * @author http://www.zeescripts.com
 * @copyright	Copyright (C) Feb 2013 ZeeScripts.com <@emai:zeescripts@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
*******************************************************/

/**
 * class ControllerModuleZeebloglatest 
 */
class ControllerModuleZeebloglatest extends Controller {
	private $error = array(); 
	
	public function index() {   
		$this->redirect($this->url->link('module/zeeblog/frontmodules', 'mod=zeebloglatest&token=' . $this->session->data['token'], 'SSL'));	
		
	}
	
}
?>
