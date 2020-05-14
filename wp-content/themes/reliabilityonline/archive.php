<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
				the_archive_title( '<h2 class="page-title">', '</h2>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
			<?php if ( have_posts() ) : ?>
       <?php while ( have_posts() ) : the_post() ; ?>
        <div id="post-<?php the_ID();?>" class="post_single">
        <?php if ( is_sticky() ) :?>
         <hgroup>
          <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
          <h3 class="entry-format"><?php _e( 'Featured', 'reliabilityonline' ); ?></h3>
         </hgroup>
        <?php else : ?>
         <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
        <?php endif ;?>
        <div class="date-blog">Posted On: <?php echo get_the_date();?></div>
        <p><?php the_excerpt();?></p>
        <a href="<?php the_permalink(); ?>" class="button btn-gray btn-more"><span>Read More</span></a> 
        </div>
       <?php endwhile ; ?>
         <?php if(function_exists('wp_page_numbers')) : wp_page_numbers(); endif;?>
      <?php endif ; ?>
            </div>
            <?php get_sidebar(); ?>
         </div>
      </div>
   </section>
</main>

<?php
get_footer();
