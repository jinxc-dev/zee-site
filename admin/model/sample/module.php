<?php
/******************************************************
 * @package Zee Zeestore Theme Framework for Zeestore 1.5.x
 * @version 2.0
 * @author http://www.zeescripts.com
 * @copyright	Copyright (C) October 2013 ZeeScripts.com <@emai:zeescripts@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
*******************************************************/

class ModelSampleModule extends Model {
	
	private $extensions = array();
	
	/**
	 * get data sample by actived theme
	 */
	public function getSamplesByTheme( $theme ){
		$this->load->model('setting/extension');
		$extensions = $this->model_setting_extension->getInstalled('module');
	
		$output = array();
		$files = glob(  dirname(__FILE__).'/'.$theme.'/*.php' );
		if( $files ){
			foreach( $files as $dir ){
				$module = str_replace(".php","",basename( $dir ));
				if( !is_file(DIR_APPLICATION."controller/module/".$module.".php") ){	
					$moduleName = $module;
					$existed = 0;
				}else {
					$this->language->load( 'module/'.$module );		
					$moduleName = $this->language->get('heading_title');
					$existed = 1;
				}
				
				$data = $this->config->get($module . '_module');
				 
				$output[$module] = array('extension_installed' => in_array($module,$extensions), 
										 "module"    => $module ,
										 'existed'   => $existed, 
										 'installed' => empty($data)?0:1, 
										 'moduleName'=> $moduleName );
		
			}		
		}	

		return $output;
	}
	
	/**
	 *
	 */
	public function getModuleInstalled(){

		if( !$this->extensions ){
			$this->load->model('setting/extension');
			$extensions = $this->model_setting_extension->getInstalled('module');
			foreach ($extensions as $key => $value) {
				if (!file_exists(DIR_APPLICATION . 'controller/module/' . $value . '.php')) {
					$this->model_setting_extension->uninstall('module', $value);
					unset($extensions[$key]);
				}
			}
			$this->extensions = $extensions;
		}

		return $this->extensions;
	}

	/**
	 * get modules having queries
	 */
	public function getModulesQuery( $theme ){

		if( is_file(dirname(__FILE__).'/'.$theme.'_query.php') ) {

			require( dirname(__FILE__).'/'.$theme.'_query.php' );
			$dir = dirname(__FILE__).'/'.$theme.'/'; 

			$this->load->model('setting/extension');
		 	

			$modules    = array();
			if( isset($query) ) { 
				$extensions = $this->model_setting_extension->getInstalled('module');

				foreach( $query as $key=>$q ) {
					if(  in_array($key,$extensions) ){
						$this->language->load('module/' . $key);
						$modules[$key] = $this->language->get( 'heading_title' );
					}
				}
			}

			return $modules;
		}	
		return array();
	}
	
	/**
	 *
	 */
	public function importProfiles( $profile, $exmodules=array() ){ 

 
		$this->load->model('setting/setting');
		if( isset($profile['modules']) && is_array($profile['modules']) ){
			foreach( $profile['modules'] as $module => $data ){
				if( !empty($data) && is_array($data) ){
			 		$output = array();
			 		$output[$module."_module"] = $data;
				 	$this->model_setting_setting->editSetting( $module, $output );
			 	}
			}
		}
		if( isset($profile['store']) && is_array($profile['store']) ){
			$this->load->model('setting/setting');
			foreach( $profile['store'] as $key => $value ){
				$group = 'config';
				$store_id = 0;	
				$this->db->query("UPDATE " . DB_PREFIX . "setting SET `value` = '" . $this->db->escape($value) . "' WHERE `group` = '" . $this->db->escape($group) . "' AND `key` = '" . $this->db->escape($key) . "' AND store_id = '" . (int)$store_id . "'");
			}
		}
	}

	public function installModule( $extension ){


		$this->load->model('setting/extension');

		$this->model_setting_extension->install( 'module', $extension );

		$this->load->model('user/user_group');

		$this->model_user_user_group->addPermission($this->user->getId(), 'access', 'module/' . $extension );
		$this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'module/' . $extension );
		if( file_exists(DIR_APPLICATION . 'controller/module/' . $extension . '.php') ){
			require_once( DIR_APPLICATION . 'controller/module/' . $extension . '.php' );

			$class = 'ControllerModule' . str_replace('_', '', $extension );
			$class = new $class($this->registry);

			if (method_exists($class, 'install')) {
				$class->install();
			}
		}
	}

	
	public function massInstallSample( $theme, $modules ){ 
		$extensions = $this->getModuleInstalled();
		foreach( $modules as $mod ){
			$module = $mod['module'];
			if( file_exists(DIR_APPLICATION . 'controller/module/' . $module . '.php') ){
				if ( !in_array($module, $extensions))  {
					$this->installModule(  $module );	
				}
				$this->installSampleQuery(  $theme, $module );	
				$this->installSample( $theme, $module );
			}	
		}
	}

	
	/**
	 *
	 */
	public function exportProfiles( $theme ){
		$this->load->model('setting/themecontrol');
		$modules = array();
		$extensions = $this->model_setting_themecontrol->getExtensions('module');	
		foreach ($extensions as $extension) {	
			$msetting = $this->config->get($extension['code'] . '_module');
			if ($msetting) {
				$modules[$extension['code']] = $extension['code'];
			}
		}	
 		$output = array( 'modules'=> array(), 'store'=> array() );


		foreach( $modules as $module ) {
			$mdatas = $this->config->get($module . '_module')? ($this->config->get($module . '_module')):array();

			foreach( $mdatas as $idx => $data ){
				foreach( $data as $key => $value ){
					if( !is_array($value) ) {
						$data[$key] = preg_replace("#\r\n#", "  ",  $value );
					}else {
						foreach( $value  as $v=> $k ){
							if( !is_array($k)){
								$value[$v] =  preg_replace("#\r\n#", "  ",  $k );
							}
						}
						$data[$key] = $value;
					}	
				}
				$mdatas[$idx] = $data;
			}
			$output['modules'][$module] = $mdatas; 
		}					
		//
		$sc =  array(
				'config_image_category_width' =>873,
				'config_image_category_height' => 294,
				
				'config_image_thumb_width' =>550,
				'config_image_thumb_height' => 414,
				
				'config_image_popup_width' =>650,
				'config_image_popup_height' => 489,
				
				'config_image_product_width' =>270,
				'config_image_product_height' => 203,
				
				'config_image_additional_width' =>100,
				'config_image_additional_height' => 75,
				
				'config_image_related_width' =>270,
				'config_image_related_height' => 203,
				
				'config_image_compare_width' =>90,
				'config_image_compare_height' => 68,
				
				'config_image_wishlist_width' =>70,
				'config_image_wishlist_height' => 53,
				
				'config_image_cart_width' =>70,
				'config_image_cart_height' => 53,
		);
		foreach($sc as $key => $value ){
			$sc[$key] = $this->config->get( $key );
		}
		$output['store'] = $sc; 
		$dir = DIR_CACHE;
		if( !is_dir($dir) ){
			mkdir($dir,0777);
		}

 	
		header('Content-type: text/plain');
		header('Content-Disposition: attachment; filename="'.$theme.'_profile_setting_'.time().'.txt'.'"');

		print( serialize($output)  ); exit;
		
	 
	 
	}

	public function export( $theme ) {
		if( is_file(dirname(__FILE__).'/'.$theme.'.php') ) {
			require( dirname(__FILE__).'/'.$theme.'.php' );
			$dir = dirname(__FILE__).'/'.$theme.'/';
			$modules = ModuleSample::getModules();
			if( isset($modules) ){
				foreach( $modules as $module ){
					$data = serialize($this->config->get($module . '_module'));
					$fp = fopen( $dir.$module.'.php', 'w');
					fwrite($fp, $data );
					fclose($fp);
				}
		
			}
		}
	}

	/**
	 *
	 */
	public function backup( $theme ){
		$expdir = DIR_CACHE.'backup_'.trim($theme).'/';
		
		if( !is_dir($expdir) ){
			mkdir( $expdir, 0777 );
		}


		if( is_file(dirname(__FILE__).'/'.$theme.'/sample.php') ) {
			require( dirname(__FILE__).'/'.$theme.'/sample.php' );
			$dir =  $expdir;
			$modules = ModuleSample::getModules();
			if( isset($modules) ){
				foreach( $modules as $module ){
					$data = serialize($this->config->get($module . '_module'));
					$fp = fopen( $dir.$module.'.php', 'w');
					fwrite($fp, $data );
					fclose($fp);
				}
		
			}
		}
		return ;
	}

	/**
	 *
	 */
	public function getBackupByTheme( $theme ){
		$output = array();

		$files = glob(  DIR_CACHE.'backup_'.trim($theme).'/*.php');
		if( $files ){
			foreach( $files as $dir ){
				$module = str_replace(".php","",basename( $dir ));
				$output[$module] = $module;
			}
		}	
		return $output;
	}

	/**
	 *
	 */
	public function restoreDataModule( $theme, $module ){
		$this->load->model('setting/setting');
		$dir = DIR_CACHE.'backup_'.trim($theme).'/';
		if( is_file($dir.$module.'.php') ){
			$data = unserialize(file_get_contents( $dir.$module.'.php' ));
			if( is_array($data) ){
				$output = array();
				$output[$module."_module"] = $data; 
				$this->model_setting_setting->editSetting( $module, $output );	
			}
		}	 
	}
	
	/**
	 *
	 */
	public function isTableExisted( $table ){
		$sql = " SHOW TABLES LIKE '".DB_PREFIX.$table."'";

		$query = $this->db->query( $sql );
		$sql = array();

		return count($query->rows);
	}

	/**
	 * install sample query
	 */
	public function installSampleQuery( $theme, $module ){
		if( is_file(dirname(__FILE__).'/'.$theme.'.php') ) {
			require( dirname(__FILE__).'/'.$theme.'.php' );
			$dir = dirname(__FILE__).'/'.$theme.'/';
			
			$this->load->model('setting/extension');
			
			
			$query =  ModuleSample::getModulesQuery();
			
			$modules = array();
			 
			if( isset($query[$module]) ){
				foreach( $query[$module] as $query ){
					$this->db->query( $query );
				}
				return ('done');
			}
		}	
		return ( 'could not install data sample for this' );
	}

	/**
	 * install store sample
	 */
	public function installStoreSample( $theme ){
		if( is_file(dirname(__FILE__).'/'.$theme.'.php') ) {
			require( dirname(__FILE__).'/'.$theme.'.php' );
			$dir = dirname(__FILE__).'/'.$theme.'/';
			$configs = ModuleSample::getStoreConfigs();
			if( isset($configs) ){
				$this->load->model('setting/setting');
				foreach( $configs as $key => $value ){
					$group = 'config';
					$store_id = 0;
					
				//	 $this->model_setting_setting->editSettingValue( 'config', $key, $value );			
					$this->db->query("UPDATE " . DB_PREFIX . "setting SET `value` = '" . $this->db->escape($value) . "' WHERE `group` = '" . $this->db->escape($group) . "' AND `key` = '" . $this->db->escape($key) . "' AND store_id = '" . (int)$store_id . "'");
				}
			}
		}
	}
	
	/**
	 * install sample module
	 */
	public function installSample( $theme, $module ){

		$this->load->model('setting/setting');
		$dir = dirname(__FILE__).'/'.$theme.'/'; 
		if( is_file($dir.$module.'.php') ){
			$data = unserialize(file_get_contents( $dir.$module.'.php' ));

			if( is_array($data) ){
				$output = array();
				$output[$module."_module"] = $data; 
				$this->model_setting_setting->editSetting( $module, $output );	
			}
		}	 
	}
}
?>