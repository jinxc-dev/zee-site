<?php  
class Controllermodulezeeblogcategory extends Controller {
	protected function index($setting) {
		static $module = 0;
		
		$this->load->model('zeeblog/category');
		$this->load->model('tool/image');
		$this->language->load('module/zeeblog');
		
		$this->data['button_cart'] = $this->language->get('button_cart');
		
		
		if( !defined("_PAVBLOG_MEDIA_") ){
			if (file_exists('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/zeeblog.css')) {
				$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/zeeblog.css');
			} else {
				$this->document->addStyle('catalog/view/theme/default/stylesheet/zeeblog.css');
			}
			define("_PAVBLOG_MEDIA_",true);
		}
		$this->document->addScript('catalog/view/javascript/jquery/zeeblog_script.js');	
		$default = array(
			'latest' => 1,
			'limit' => 9
		);
	  
		$tree = $this->model_zeeblog_category->getTree();
		
		$this->data['tree'] = $tree;
		// echo '<pre>'.print_r( $tree,1 ); die;
		
		$this->data['heading_title'] = $this->language->get('blog_category_heading_title');
		
		
		
		
		
	
	
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/zeeblogcategory.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/zeeblogcategory.tpl';
		} else {
			$this->template = 'default/template/module/zeeblogcategory.tpl';
		}
		
		$this->render();
	}
	
}
?>