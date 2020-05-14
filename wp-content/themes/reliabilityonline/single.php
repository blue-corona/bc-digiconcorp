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
            <div class="col-lg-8 col-xl-9">
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
            <?php get_sidebar(); ?>
         </div>
      </div>
   </section>
</main>



<?php
get_footer();
