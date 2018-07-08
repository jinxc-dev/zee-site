<?php  echo $header;  ?>
 <div id="content">
	  <div class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
		<?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
		<?php } ?>
	  </div>
	  <?php if ($error_warning) { ?>
	  <div class="warning"><?php echo $error_warning; ?></div>
	  <?php } ?>
		<div class="box">
		   
		   <div class="toolbar"><?php require( dirname(__FILE__).'/toolbar.tpl' ); ?></div>
		  
			<div class="heading">
			  <h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
				<div class="buttons">
				  <a onclick="$('#form').submit();" class="button"><?php echo $this->language->get("button_save"); ?></a>
				</div>  
			</div>
			
			<div class="content">
					
						<div id="tab-support">
					
					<h4>Zeeo Blogs Management</h4>
					<p><i>
					We are proud to announce the next release of our Zee Blogs Module, version 1.0. 
					This release coincides with the new version of Zeestore released which is version 1.5.5.1. 
				
					
					</i>
					</p>
					
					<h4>About The Module</h4>
					<div>
						<p class="zees-copyright">Its is Free Zeestore Module released under license GPL/V2. Powered by <a href="http://www.zeescripts.com" title="ZeeScripts - Zeestore Theme Clubs">ZeeScripts</a></p>
					</div>
					<h4>Supports</h4>
					<div>
						Follow me on <b>twitter </b>or join my <b>facebook </b>page to get noticed about all theme updates and news!
						<ul>
							<li><a href="http://www.zeescripts.com">Forum</a></li>
							<li><a href="http://www.zeescripts.com">Ticket</a></li>
							<li><a href="http://www.zeescripts.com">Contact us</a></li>
							<li>Email: <a href="mailto:zeescripts@gmail.com">zeescripts@gmail.com</a> </li>
							<li>Skype Support: hatuhn</li>
							<li><a href="">YouTuBe</a></li>
						</ul>
					</div>
					
					<h4>CheckUpdate</h4>
					<ul>
						<li><a href="http://www.zeethemes.com/updater/?product=zeeblog&list=1" title="ZeeScripts - Zeestore Themes Club">Check</a></li>
					</ul>
				</div>
				
			</div>
		</div>	
 </div>
  
 <script type="text/javascript">
	$(".zeehtabs a").tabs();
	$(".zeemodshtabs a").tabs();
	function __submit( val ){
		$("#action_mode").val( val );
		$("#form").submit();
	}
	
 </script>
<?php echo $footer; ?>