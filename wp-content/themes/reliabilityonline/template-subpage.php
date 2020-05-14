<?php
/**
* Template Name: Subpage
*
 * @package WordPress
 * @subpackage Reliability_Online
 * @since 1.0.0
 */

get_header();
?>

		
		<main class="subpage-content-section">
		<?php include"banner.php"; ?>
		
		
		
		
		<section class="subpage-content">
				<div class="container">
					<div class="row">
						<div class="<?php if(!get_field('full_width') ) {  ?>col-lg-8 col-xl-9<?php } else { ?>col-12 <?php } ?>">
							<?php if(has_post_thumbnail( ) ): ?>
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
								<div class="sub-top-img"><img class="lazy" data-src="<?php echo $image[0]; ?>" alt="" /></div>
							<?php endif; ?>
							<?php 
							if ( have_posts() ) {
								while ( have_posts() ) {
									the_post(); 
									the_content();
								} // end while
							} // end if
							?>
<?php

$highlighted_title = get_field('highlighted_title');
$highlighted_content = get_field('highlighted_content');

?>

							<?php if($highlighted_title && $highlighted_content)
							{
								?>
								<div class="rounded-content">
									<div class="rounded-title"><?php echo $highlighted_title; ?></div>
									<div class="rounded-text"><?php echo $highlighted_content; ?></div>
								</div>
								<?php
							}
							?>
							<?php

// check if the repeater field has rows of data
if( have_rows('full_width_button') ):
	?><div class="content-btns"><?php
 	// loop through the rows of data
    while ( have_rows('full_width_button') ) : the_row();
?>
<?php
$link = get_sub_field('add_link');

if( $link ): 
	$link_url = $link['url'] ? $link['url'] : '#';
             $link_title = $link['title'] ? $link['title'] : 'get a quote';
             $link_target = $link['target'] ? $link['target'] : '_self';	?>
	<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
<?php endif; ?>


<?php
    endwhile;
	?></div><?php
else :

    // no rows found

endif;

?>
					
<?php

// check if the repeater field has rows of data
if( have_rows('image_block') ):
?><div class="double-img"><?php
 	// loop through the rows of data
    while ( have_rows('image_block') ) : the_row();

?>
<?php 

$image = get_sub_field('add_single_image');

if( !empty($image) ): ?>

	<img  class="lazy alignleft" data-src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

<?php else: ?>
<?php endif; ?>

<?php
    endwhile;
?></div>

<?php
else :

    // no rows found

endif;

?>
						
							
						<?php the_field('content_part'); ?>
						
						<div class="video">
							<?php if(get_field('embedded_video') ) {  ?>
						<?php the_field('embedded_video'); ?>
							<?php  } else { ?>
							<img class="lazy" data-src="<?php echo get_template_directory_uri();?>/assets/images/video_img.jpg" alt="Sub Content Image" />
							
							<?php } ?>
						</div>
						
						</div>
					
					<?php if(!get_field('full_width') ) {  ?>
					
					<?php get_sidebar(); ?>
					
					<?php } ?>
					</div>
				
				
				</div>
			
			
			</section>
		
		
		
		
		
		</main>

<?php
get_footer();
