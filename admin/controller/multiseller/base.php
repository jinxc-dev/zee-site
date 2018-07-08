<?php

class ControllerMultisellerBase extends Controller {
	private $error = array();
	
	public function __construct($registry) {
		parent::__construct($registry);
		$this->registry = $registry;
		$parts = explode('/', $this->request->request['route']);
		if (!isset($parts[2]) || !in_array($parts[2], array('install','uninstall'))) {
		}
		
		$this->data = array_merge($this->data, $this->load->language('multiseller/multiseller'));
		$this->data['token'] = $this->session->data['token'];
		$this->document->addStyle('view/stylesheet/zeedownloads/multiseller.css');
		$this->document->addStyle('view/javascript/zeedownloads/datatables/css/jquery.dataTables.css');
		$this->document->addScript('view/javascript/zeedownloads/datatables/js/jquery.dataTables.min.js');
		$this->document->addScript('view/javascript/zeedownloads/common.js');
	}
			
	// @todo: validation
	public function validate($action = '', $level = 'access') {
		return true;
		//var_dump($this->user->hasPermission($level, 'module/multiseller'));
//		if (in_array(strtolower($action), array('sellers', 'install','uninstall','jxsavesellerinfo', 'savesettings', 'jxconfirmpayment', 'jxcompletepayment', 'jxproductstatus'))
		if (!$this->user->hasPermission($level, 'module/multiseller')) {
			return $this->forward('error/permission');
		} 			
	}
}	
?>
