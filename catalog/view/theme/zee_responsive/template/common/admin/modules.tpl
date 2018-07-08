<?php 
	$d = array(
		'advertising_top'=>'<img src="image/data/adv-top.png" alt="" src="saleoff"/>',
		'delivery_data_module' => '
		
			<div class="box-services"><span class="iconbox pull-left"><i class="fa fa-truck">&nbsp;</i></span>
			<div class="media-body">
			<h4>Free shipping</h4>
			<span>all order over $150 </span></div>
			</div>

			<div class="box-services"><span class="iconbox pull-left"><i class="fa fa-refresh">&nbsp;</i></span>
			<div class="media-body">
			<h4>Return &amp; Exchange</h4>
			<span>in 3 working days </span></div>
			</div>

			<div class="box-services"><span class="iconbox pull-left"><i class="fa fa-phone">&nbsp;</i></span>
			<div class="media-body">
			<h4>04 123 456 789</h4>
			<span>Sed ullamcorper mattis sit</span></div>
			</div>

		',
		'footer_columns_2'=>'
			<h3>Newsletter</h3>
				<p>Send your email a newsletter.</p>
				<div class="email"><input type="text" value="" placeholder="email" name="email">
					<div class="button-email">GO</div>
				</div>
				
				<h3>Order online</h3>
				<p>Phone: +123 456 789</p>
				<p>Fax: +123 456 789</p>
				<p>Email: admin@admin.com</p>
		',
		'footer_columns_3'=>'
			<h3>Stay Connected</h3>
			<ul>
				<li class="facebook"><span class="fa fa-facebook">&nbsp;</span><a href="#">Triads Facebook</a></li>
				<li class="twitter"><span class="fa fa-twitter">&nbsp;</span><a href="#">Triads Twitter</a></li>
				<li class="google"><span class="fa fa-google-plus">&nbsp;</span><a href="#">Triads Google</a></li>
				<li class="youtube"><span class="fa fa-youtube">&nbsp;</span><a href="#">Triads Youtube</a></li>
				<li class="rss"><span class="fa fa-rss">&nbsp;</span><a href="#">Triads RSS Feed</a></li>
			</ul>
		',
		'username_facebook_module' => 'http://www.facebook.com/ZeeScripts'
		
	);
	$module = array_merge( $d, $module );
?>

<div class="inner-modules-wrap clearix">
	<div class="vtabs mytabs" id="my-tab-innermodules">
		<a onclick="return false;" href="#tab-imodule-topbar"><?php echo $this->language->get('Top Bar');?></a>
		<a onclick="return false;" href="#tab-imodule-header"><?php echo $this->language->get('Header');?></a>
		<a onclick="return false;" href="#tab-imodule-footer"><?php echo $this->language->get('Footer');?></a>
	 </div>

	  <div class="page-tabs-wrap clearfix">
	  		<div id="tab-imodule-topbar">
				<table class="form">
					<tr>
						<td><?php echo $this->language->get('Advertising Widget');?></td>
						<td>
							<h4><label><?php echo $this->language->get('Module HTML Content');?></label></h4>
							<textarea name="themecontrol[advertising_top]" id="advertising_top" rows="5" cols="60"><?php echo $module['advertising_top'];?></textarea>
							<p><i><?php echo $this->language->get('this module appear in header top position');?></i></p>
						</td>
					</tr>
				</table><div class="clearfix clear"></div>
	  		</div>

	  		<div id="tab-imodule-header">
	  				<table class="form">
	  					<tr>
							<td><?php echo $this->language->get('Online Phone Widget');?></td>
							<td>
								<h4><label><?php echo $this->language->get('Module HTML Content');?></label></h4>
								<textarea name="themecontrol[delivery_data_module]" id="delivery_data_module" rows="5" cols="60"><?php echo $module['delivery_data_module'];?></textarea>
								<p><i><?php echo $this->language->get('this module appear in header right position');?></i></p>
							</td>
						</tr>
					</table><div class="clearfix clear"></div>
	  		</div>

	  		<div id="tab-imodule-footer">
	  				<table class="form">
							<tr>
								<td><?php echo $this->language->get('Facebook Module');?></td>
								<td>
									<h4><label><?php echo $this->language->get('Url Facebook');?></label></h4>
									<input name="themecontrol[username_facebook_module]"  value="<?php echo $module['username_facebook_module'];?>" size="60"/>
									<p><i><?php echo $this->language->get('this module appear in Footer [1] position');?></i></p>
								</td>
							</tr>
							<tr>
								<td><?php echo $this->language->get('Footer Columns 2');?></td>
								<td>
									<h4><label><?php echo $this->language->get('Module HTML Content');?></label></h4>
									<textarea name="themecontrol[footer_columns_2]" id="footer_columns_2" rows="5" cols="60"><?php echo $module['footer_columns_2'];?></textarea>
									<p><i><?php echo $this->language->get('this module appear in Footer [2] position');?></i></p>
								</td>
							</tr>
							<tr>
								<td><?php echo $this->language->get('Footer Columns 3');?></td>
								<td>
									<h4><label><?php echo $this->language->get('Module HTML Content');?></label></h4>
									<textarea name="themecontrol[footer_columns_3]" id="footer_columns_3" rows="5" cols="60"><?php echo $module['footer_columns_3'];?></textarea>
									<p><i><?php echo $this->language->get('this module appear in Footer [3] position');?></i></p>
								</td>
							</tr>		
					</table><div class="clearfix clear"></div>
	  		</div>
	  </div>
	<div class="clearfix clear"></div>
</div>


<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<script type="text/javascript"><!--
$("#my-tab-innermodules a").tabs();
CKEDITOR.replace('advertising_top', {
	filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
});

CKEDITOR.replace('delivery_data_module', {
	filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
});

CKEDITOR.replace('footer_columns_2', {
	filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
});
CKEDITOR.replace('footer_columns_3', {
	filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
});

//--></script> 