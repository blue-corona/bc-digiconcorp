<?php get_header(); ?>
<main class="home-content-section">
				<?php 
				$image = get_field('banner_image');
				if( !empty($image) ): ?>
					<section class="banner" style="background:url(<?php echo $image['url']; ?>) no-repeat 0 0/cover;">
					<?php
				else:
				?>
					<section class="banner" style="background:url(<?php echo get_template_directory_uri(); ?>/assets/images/home_banner@2x.jpg) no-repeat 0 0/cover;">
				<?php endif; ?>

			
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-7">
							<div class="banner-content">
							<?php if(get_field('banner_title')){ ?>
							<div class="banner-title"><?php the_field('banner_title'); ?></div>
							<?php } ?>
							<?php if(get_field('banner_subtitle')){ ?>
							<div class="banner-sub-title"><?php the_field('banner_subtitle'); ?></div>
							<?php } ?>
							<?php
							$link = get_field('banner_link');
							if( $link ): 								
								$link_url = $link['url'] ? $link['url'] : '#';
								$link_title = $link['title'] ? $link['title'] : 'get a quote';
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<a class="banner-btn button-mob" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
							<?php endif; ?>							
							</div>
						
						</div>
						<div class="col-lg-5">
							<div class="banner-form">
								<div class="banner-form-title">
								<?php if(get_field('form_title')){ ?>
								<?php the_field('form_title'); ?>
								<?php }else{
									?>Get a Free Quote<?php
								} ?>
								</div>
								<div class="form-col">
								<?php $form_shortcode = get_field('add_shorcode_for_form') ? get_field('add_shorcode_for_form') : '[gravityform id="1" title="false" description="false"]'; ?>
								<?php echo do_shortcode($form_shortcode); ?>
								</div>
							</div>
						
						</div>
					
					
					
					</div>
				
				
				</div>
			
			
			</section> 
			

<?php 

								$get_a_quote = get_field('get_a_quote', $settings_id);

								if( $get_a_quote ): 
									$link_url = $get_a_quote['url'];
									$link_title = $get_a_quote['title'];
									$link_target = $get_a_quote['target'] ? $get_a_quote['target'] : '_self';
									?>
									<a class=" d-block d-lg-none free-quote-mob" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">Request a Free Quote</a>
								<?php endif; ?>
			
			<!---End of Banner--->
		
		<section class="service-section">
			<div class="container">
				<h2 class="d-block d-md-none d-lg-none"> Our Services </h2>
				<?php
				$args = array(
				'post_type' => 'service',
				'posts_per_page' => -1,
				);
				$the_query = new WP_Query( $args );

				// The Loop
				if ( $the_query->have_posts() ) {
				echo '<div class="service-slider">';
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					?>
					<div class="service-col">
						<div class="img-col">
						<?php if (has_post_thumbnail( $the_query->ID ) ): ?>
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $the_query->ID ), 'full' ); ?>
							<img src="<?php echo $image[0]; ?>" alt="" />
						<?php endif; ?>
						</div>
						<div class="service-discription">
							<div class="title-col"><?php the_title(); ?></div>
							<?php $link = get_field('service_link');
if( $link ): 								
	$link_url = $link['url'] ? $link['url'] : '#';
	$link_title = $link['title'] ? $link['title'] : 'Read more';
	$link_target = $link['target'] ? $link['target'] : '_self';
	?>
	<a class="read-more" href="<?php echo get_field('service_link'); ?>" >Read more</a>
<?php endif; ?>
						
						</div>
					</div>
					<?php
				}
				echo '</div>';
				} else {
				// no posts found
				}
				/* Restore original Post Data */
				wp_reset_postdata();
				?>	
				</div>
				
				

			
			
	    </section>  <!---End of Services--->
		
		<section class="home-text">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<div class="home-title"><?php the_field('left_intro_content'); ?> </div>
					</div>
					<div class="col-lg-6">
						<div class="text-col">
							<?php the_field('right_intro_content'); ?>
							<?php
							$link = get_field('intro_button');

							if( $link ): 
								$link_url = $link['url'] ? $link['url'] : '#';
										 $link_title = $link['title'] ? $link['title'] : 'Read more';
										 $link_target = $link['target'] ? $link['target'] : '_self';	?>
								<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
							<?php endif; ?>

						</div>
					</div>
				</div>
				
				
			</div>
			
			
	    </section>
		
		<section class="home-about">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<div class="about-img-col">
							<?php 
							$image = get_field('left_image');
							if( !empty($image) ): ?>
								<img class="lazy big-img" data-src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							<?php else: ?>
								<img lass="lazy big-img" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/home_img4.jpg" alt="content img" />
							<?php endif; ?>
							<?php 
							$image = get_field('overlapped_image');
							if( !empty($image) ): ?>
								<img class="positioned-img lazy"  data-src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							<?php else: ?>
								<img class="positioned-img lazy"  data-src="<?php echo get_template_directory_uri(); ?>/assets/images/home_img5.jpg" alt="content img" />
							<?php endif; ?>
							
							
						
						
						</div>
					</div>
					<div class="col-lg-6">
						<div class="text-col">
						<h1 class="about-title"><?php the_title(); ?> </h1>
						<?php the_field('about_content'); ?>
						<?php
						$link = get_field('about_link');
						if( $link ): 
							$link_url = $link['url'] ? $link['url'] : '#';
									 $link_title = $link['title'] ? $link['title'] : 'Read more';
									 $link_target = $link['target'] ? $link['target'] : '_self';	?>
							<a class="button-mob" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
						<?php endif; ?>
						</div>
					</div>
				</div>
				
				
			</div>
			
			
	    </section>
		
		<section class="how-it-works text-center">
			<div class="how-it-works-top">
			
				<div class="container">
					<div class="top-title"><?php the_field('work_subtitle'); ?></div>
					<div class="how-it-works-text"><?php the_field('work_title'); ?></div>
					<div class="how-it-works-image">
					<?php 

					$image = get_field('work_image');

					if( !empty($image) ): ?>

						<img class="lazy" data-src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

					<?php else: ?>
					<img class="lazy" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/home_img6.jpg" alt="How It Works Img" />
					<?php endif; ?>

					 </div>
					
				</div>
			</div>
			
		
			
			
	    </section>
		
		<section class="home-tabs-sections">
			
				<div id="horizontalTab">
					<div class="top-tab-list">
						<div class="container">
					  
					  <?php

if( have_rows('add_tabs') ):
?><ul class="resp-tabs-list"><?php
    while ( have_rows('add_tabs') ) : the_row();
		?><li><?php the_sub_field('tab_title'); ?></li><?php
    endwhile;
?></ul><?php
else :

    // no rows found

endif;

?>

					  
					  </div>
					  </div>
					  <div class="resp-tabs-container container">
					  					  <?php

if( have_rows('add_tabs') ):
    while ( have_rows('add_tabs') ) : the_row();
		?>
		
		<div class="tab-content">
			<div class="content-row">
				<div class="tab-img-sec"><img src="<?php the_sub_field('tab_left_image');?>"></div>
		  <div class="tab-text">
		

			
			<?php the_sub_field('tab_content'); ?>
		  
		  </div>
		  </div>
		</div>
		<?php
		
		
		
    endwhile;
else :
    // no rows found
endif;

?>

						
						
						
						
					 
					  </div>
				</div>
				
				
			</div>
			
			
	    </section>
		</main>
<?php get_footer(); ?>