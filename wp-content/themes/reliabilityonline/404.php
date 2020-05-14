<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
              <h2>Missing Page</h2>
           <p>We can't locate what you're looking for. Please select a navigation item above.</p>    
            </div>
            <?php get_sidebar(); ?>
         </div>
      </div>
   </section>
</main>
<?php
get_footer();
