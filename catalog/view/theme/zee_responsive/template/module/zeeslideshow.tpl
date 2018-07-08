	<?php $id = rand(1,10);?>
   <div id="zeeslideshow<?php echo $id;?>" class="carousel slide zeeslideshow">
		<div class="carousel-inner">
			 <?php foreach ($banners as $i => $banner) { ?>
				<div class="item <?php if($i==0) {?>active<?php } ?>">
					<?php if ($banner['link']) { ?>
					<a href="<?php echo $banner['link']; ?>"><img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>" /></a>
					<?php } else { ?>
					<img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>" />
					<?php } ?>
				</div>
			<?php } ?>
		</div>
		<?php if( count($banners) > 1 ){ ?>	
		<a class="carousel-control left" href="#zeeslideshow<?php echo $id;?>" data-slide="prev">&lsaquo;</a>
		<a class="carousel-control right" href="#zeeslideshow<?php echo $id;?>" data-slide="next">&rsaquo;</a>
		<?php } ?>
    </div>
<?php if( count($banners) > 1 ){ ?>
<script type="text/javascript"><!--
 $('#zeeslideshow<?php echo $id;?>').carousel({interval:8000});
--></script>
<?php } ?>