<div class="box ">
	<div class="box-heading"><?php echo $heading_title; ?></div>
	<div class="box-content" id="zee-categorymenu" >

		 <?php echo $tree;?>
		 
	</div>
 </div>
<script>
$(document).ready(function(){
		// applying the settings
		$("#zee-categorymenu li.active span.head").addClass("selected");
			$('#zee-categorymenu ul').Accordion({
				active: 'span.selected',
				header: 'span.head',
				alwaysOpen: false,
				animated: true,
				showSpeed: 400,
				hideSpeed: 800,
				event: 'click'
			});
});

</script>