<?php 
/******************************************************
 * @package Zee blog module for Zeestore 1.5.x
 * @version 1.0
 * @author http://www.zeescripts.com
 * @copyright	Copyright (C) Feb 2013 ZeeScripts.com <@emai:zeescripts@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
*******************************************************/

/**
 * class ModelZeeblogcategory 
 */
class ModelZeenewsletterSubscribe extends Model {		
	
	public function getDefaultSetting(){
		return array(
			'theme' => 'default',
			'latest' => 1,
			'limit' => 9,
			'width' => 180,
			'height' => 180,
			'auto_play' => '0',
			'auto_play_mode' => '',
			'interval' => 1000,
			'cols' => 1,
			'itemsperpage' => 2
		);
	}
	public function checkExists($email = ""){
		if(!empty($email)){
			$query = $this->db->query("SELECT `subscribe_id` FROM ".DB_PREFIX."zeenewsletter_subscribe WHERE `email`='".$this->db->escape($email)."'");
			if($query->num_rows > 0)
				return true;
		}
		return false;
	}
	public function storeSubscribe($data = array()){
		if(!empty($data)){
			if(!$this->checkExists($data['email'])){
				$sql = "INSERT INTO ".DB_PREFIX."zeenewsletter_subscribe ( `";
				$tmp = array();
				$vals = array();
				foreach( $data as $key => $value ){
					$tmp[] = $key;
					$vals[]=$this->db->escape($value);
				}
				$sql .= implode("` , `",$tmp)."`) VALUES ('".implode("','",$vals)."') ";
				$this->db->query( $sql );
				return true;
			}
			
		}
		return false;
	}

}
?>
