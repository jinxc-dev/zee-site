<div class="box category">
  <div class="box-heading"><h2><?php echo $heading_title; ?></h2></div>
  <div class="box-content">
    <ul class="box-category">
      <?php foreach ($categories as $category) {
	     $class = "";
		 if(isset($category["children"]) && !empty($category["children"])){
			$class = "haschild";
		 }
      $name = str_replace("(", '<span class="">(',  $category['name'] );
      $category['name'] = str_replace(")", ')</span>', $name);
	  ?>
      <li class="<?php echo $class; ?>">
        <?php if ($category['category_id'] == $category_id) { ?>
        <a href="<?php echo $category['href']; ?>" class="active"><?php echo $category['name']; ?></a>
        <?php } else { ?>
        <a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
        <?php } ?>
        <?php if ($category['children']) { ?>
				<div class="head pull-right"><a href="javascript:void(0);" class="fa fa-plus"></a></div>
        <ul>
          <?php foreach ($category['children'] as $child) { ?>
          <?php
             $child['name'] = str_replace("(", '<span class="">(',  $child['name'] );
             $child['name'] = str_replace(")", ')</span>', $child['name']);  
          ?>
          <li>
            <?php if ($child['category_id'] == $child_id) { ?>
            <a href="<?php echo $child['href']; ?>" class="active"> - <?php echo $child['name']; ?></a>
            <?php } else { ?>
            <a href="<?php echo $child['href']; ?>"> - <?php echo $child['name']; ?></a>
            <?php } ?>
          </li>
          <?php } ?>
        </ul>
        <?php } ?>
      </li>
      <?php } ?>
    </ul>
		<script type="text/javascript">
		$(function(){
			//Toggle Sub Categories
			var activeCat = '.box-category li a.active';
			if($(activeCat).length > 0){
				$(activeCat).parent('li').find('ul').show();	
				$(activeCat).parent('li').find('a.fa').toggleClass('aToggle');		
        $(activeCat).parent('li').find('a.fa').toggleClass('fa-minus');
			}	
			$('.head a').click(function(){
				$('.head a').removeClass('aToggle');
        $('.head a').removeClass('fa-minus');
				var ul = $(this).parent('div').parent('li').find('ul');
				if(!ul.is(':visible')){
					$('.box-category ul li > ul').slideUp();
					$(this).toggleClass('aToggle');
          $(this).toggleClass('fa-minus');
				}else{			
					$(this).removeClass('aToggle');
          $(this).removeClass('fa-minus');
				}
				ul.stop(true,true).slideToggle();
			});
		});
		</script>	
  </div>
</div>
