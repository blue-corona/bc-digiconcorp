	<?php if(get_field('add_subpage_banner') ) {  ?>
<?php $image = get_field('add_subpage_banner'); ?>
	<section  class="lazy sub-banner" data-src="<?php echo $image['url']; ?>">
	<?php } else { ?>
	<section class="lazy sub-banner" data-src="<?php echo get_template_directory_uri();?>/assets/images/sub_banner_img.jpg">
	<?php } ?>
			
				<div class="container">
					<div class="row align-items-center text-center">
						<div class="col-md-12">
							<?php if(is_404() ) { ?>
						<h1>404</h1>
							<?php } elseif(is_home())  {  ?>
								<h1>Our Blog</h1>
							<?php } elseif(is_category() ) {  ?>
								<?php foreach((get_the_category()) as $category) { echo '<h1>'.$category->cat_name . ' </h1>'; } ?>
							<?php } else { ?>
							<h1><?php the_title();?></h1>
							<?php } ?>
						</div>
						
					
					
					
					</div>
				
				
				</div>
			
			
			</section>  <!---End of Banner--->