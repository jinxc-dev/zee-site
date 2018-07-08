<?php  
class Controllermodulezeeblogcomment extends Controller {
	protected function index($setting) {
		static $module = 0;
		
		$this->load->model('zeeblog/comment');
		$this->load->model('catalog/product'); 
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
			
		 
		$this->data['heading_title'] = $this->language->get('blogcomment_heading_title');
		
		$comments = $this->model_zeeblog_comment->getLatest( (int)$setting['limit'] );
		foreach( $comments as $k => $comment ){
			$comments[$k]['link'] = $this->url->link( 'zeeblog/blog',"id=".$comment['blog_id']."#comment".$comment['comment_id'] );
		}
		$this->data['comments'] = $comments;
	
	
		$this->data['module'] = $module++;
						
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/zeeblogcomment.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/zeeblogcomment.tpl';
		} else {
			$this->template = 'default/template/module/zeeblogcomment.tpl';
		}
		
		$this->render();
	}
	
}
?>