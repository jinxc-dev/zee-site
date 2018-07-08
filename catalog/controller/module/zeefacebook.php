<?php  
class ControllerModuleZeefacebook extends Controller {
	protected function index($setting) {
		static $module = 0;
		$this->language->load('module/zeefacebook');
		$this->data = $setting;
		$this->data['displaylanguage'] = $this->language->get('code');
	
		$this->data['heading_title'] = $this->language->get('heading_title');
	
		$this->data['module'] = $module++;
						
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/zeefacebook.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/zeefacebook.tpl';
		} else {
			$this->template = 'default/template/module/zeefacebook.tpl';
		}
		
		$this->render();
	}
}
?>