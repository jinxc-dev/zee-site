<?php
class ControllerModuleZeenewsletter extends Controller {
	protected function index($setting) {
		static $module = 0;
		$this->language->load('module/zeenewsletter');
		$this->load->model('account/customer');
		$this->load->model('zeenewsletter/subscribe');
		$general_setting = $this->config->get("zeenewsletter_config");
		$show_box = true;
		if($this->customer->isLogged()){
			$customer_email = $this->customer->getEmail();
			if($this->model_zeenewsletter_subscribe->checkExists($customer_email)){
				$show_box = false;
			}
			$this->data['customer_email'] = $customer_email;
		}
		//if(!$show_box)
		//	return;
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/stylesheet/zeenewsletter.css')) {
			$this->document->addStyle('catalog/view/theme/'.$this->config->get('config_template').'/stylesheet/zeenewsletter.css');
		} else {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/zeenewsletter.css');
		}
		
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
         	$this->data['base'] = $this->config->get('config_ssl');
	    } else {
	        $this->data['base'] = $this->config->get('config_url');
	    }
	    $this->data['action'] = $this->url->link('module/zeenewsletter/subscribe', '', 'SSL');
	    $this->data['prefix'] = isset($setting['prefix'])?$setting['prefix']:'';
		$this->data['position'] = isset($setting['position'])?$setting['position']:'';
		$this->data['description'] = isset($setting['description'])?$setting['description']:'';

		$this->data['module'] = $module++;
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/zeenewsletter.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/zeenewsletter.tpl';
		} else {
			$this->template = 'default/template/module/zeenewsletter.tpl';
		}

		$this->render();
	}
	public function subscribe(){
		$this->language->load('module/zeenewsletter');
		$this->load->model('account/customer');
		$this->load->model('zeenewsletter/subscribe');

		$json = array();

		$data = array();
		$data['store_id'] = $this->config->get('config_store_id');
		$data['customer_id'] = 0;
		$data['email'] = $this->request->post['email'];
		$data['store_id'] = 0;
		if(!$this->model_zeenewsletter_subscribe->checkExists($this->request->post['email'])){
			if($customer = $this->model_account_customer->getCustomerByEmail($this->request->post['email'])){
				$data['customer_id'] = $customer['customer_id'];
			}
			$this->model_zeenewsletter_subscribe->storeSubscribe( $data);
			
			$json['success'] = $this->language->get('success_post');

			$json['redirect'] = $this->url->link('common/home', '', 'SSL');
		} else {
			$json['error'] = $this->language->get('error_post');
		}
		$this->response->setOutput(json_encode($json));
	}
	protected function validate($data = array()){
		if(!empty($data)){
			if(isset($data['email']) && !empty($data['email']) && isset($data['action']))
				return true;
		}
		return false;
	}
}
