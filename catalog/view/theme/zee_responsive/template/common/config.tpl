<?php 
/******************************************************
 * @package Zee Megamenu module for Zeestore 1.5.x
 * @version 1.0
 * @author http://www.zeescripts.com
 * @copyright	Copyright (C) Feb 2013 ZeeScripts.com <@emai:zeescripts@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
*******************************************************/
?>
<?php
$column_left  = trim($column_left);
$column_right  = trim($column_right);
 
if( !empty($column_left) && !empty($column_right) ){
		$layout = 'full';
	} elseif( empty($column_left) && !empty($column_right) ){
		$layout = 'center-right';
	}elseif( !empty($column_left) && empty($column_right) ){
		$layout = 'center-left';
	}else {
		$layout = 'center';
	}
	
	$spans = array( 'full' 			=> array(3,6,3),
					'center-right'  => array(0,9,3), 
					'center-left'   => array(3,9,0),
					'center'		=> array(0,12,0)
	);
	$SPAN = $spans[$layout];
?>