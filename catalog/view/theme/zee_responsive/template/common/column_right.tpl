<?php 
/******************************************************
 * @package Zee Megamenu module for Zeestore 1.5.x
 * @version 1.0
 * @author http://www.zeescripts.com
 * @copyright	Copyright (C) Feb 2013 ZeeScripts.com <@emai:zeescripts@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
*******************************************************/
?>
<?php if ($modules) { ?>
<div id="column-right" class="sidebar">
  <?php foreach ($modules as $module) { ?>
  <?php echo $module; ?>
  <?php } ?>
</div>
<?php } ?>
