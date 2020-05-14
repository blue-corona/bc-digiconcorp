<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
            <div class="subpage-content-main <?php if(!get_field('hide_sidebar')) { ?>col-lg-8 col-xl-9<?php } else { ?>col-12<?php } ?>">
			
               <?php if(has_post_thumbnail( ) ): ?>
               <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
               <div class="sub-top-img"><img src="<?php echo $image[0]; ?>" alt="" /></div>
               <?php endif; ?>
               <?php 
                  if ( have_posts() ) {
                  	while ( have_posts() ) {
                  		the_post(); 
                  		the_content();
                  	} // end while
                  } // end if
                  ?>
            </div>
            <?php if(!get_field('hide_sidebar')){ ?><?php get_sidebar(); ?><?php } ?>	
         </div>
      </div>
   </section>
</main>

<?php
get_footer();
