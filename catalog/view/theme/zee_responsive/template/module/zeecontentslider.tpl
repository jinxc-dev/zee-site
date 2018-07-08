<?php if( count($banners) ) { ?>
	<?php $id = rand(1,10)+rand(1,110 );?>
   <div id="zeecontentslider<?php echo $id;?>" class="carousel slide zeecontentslider">
	
		<div class="carousel-inner">
			 <?php foreach ($banners as $i => $banner) {  ?>
				<div class="item <?php if($i==0) {?>active<?php } ?>">
					<?php if ($banner['link']) { ?>
					<a href="<?php echo $banner['link']; ?>"><img src="<?php echo $banner['thumb']; ?>" alt="<?php echo $banner['title']; ?>" /></a>
					<?php } else { ?>
					<img src="<?php echo $banner['thumb']; ?>" alt="<?php echo $banner['title']; ?>" />
					<?php } ?>
							<?php if( $banner['title']  || $banner['description'] ) { ?>
							<div class="banner-info">
								<h4><?php echo $banner['title']; ?></h4>
								<div><?php echo $banner['description']; ?></div>
							</div>
							<?php } ?>
		
				</div>
			<?php } ?>
		</div>
		<?php if( count($banners) > 1 ){ ?>	
		<a class="carousel-control left" href="#zeecontentslider<?php echo $id;?>" data-slide="prev">&lsaquo;</a>
		<a class="carousel-control right" href="#zeecontentslider<?php echo $id;?>" data-slide="next">&rsaquo;</a>
		<?php } ?>
		<?php if( count($banners)  > 1 ) { ?>
		<ol class="carousel-indicators">
		<?php foreach ( $banners as $j=>$item )  : ?>
			<li data-target="#zeecontentslider<?php echo $id;?>" data-slide-to="<?php echo $j;?>" class="<?php if($j==0) {?>active<?php } ?>"></li>
		<?php endforeach ?>
		</ol>
		<?php } ?>
    </div>
<?php if( count($banners) > 1 ){ ?>
	<script type="text/javascript">
	<!--
		$('#zeecontentslider<?php echo $id;?>').carousel({interval:<?php echo ( $auto_play_mode?$interval:'false') ;?>,auto:<?php echo $auto_play;?>,pause:'hover'});
	-->
	</script>
	<?php } ?>
<?php } ?>