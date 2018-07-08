<?php
if( !class_exists("ModuleSample") ) { 
	class ModuleSample { 
		public static function getModules(){ 
			$modules = array(
				'account',
				'carousel',
				'zeeblog',
				'zeeblogcategory',
				'zeeblogcomment',
				'zeebloglatest',
				'zeeproductcarousel',
				'zeecustom',
				'special',
				'zeecontentslider',
				'category',
				'zeefacebook',
				'zeenewsletter'
			);
			
			return $modules;
		}
		public static function getModulesQuery(){
			$query = array();
			require( dirname(__FILE__).'/zee_responsive_query.php' );
			return $query;
		}
		public static function getStoreConfigs(){
			return array(
					'config_image_category_width' =>861,
					'config_image_category_height' => 275,
					
					'config_image_thumb_width' =>270,
					'config_image_thumb_height' => 270,
					
					'config_image_popup_width' =>500,
					'config_image_popup_height' => 500,
					
					'config_image_product_width' =>500,
					'config_image_product_height' => 500,
					
					'config_image_additional_width' => 89,
					'config_image_additional_height' => 89,

					'config_image_related_width' => 500,
					'config_image_related_height' => 500,
					
			);
		}
	
	}
}
?>