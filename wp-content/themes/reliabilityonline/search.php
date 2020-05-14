<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
             <?php if ( have_posts() ) : ?>
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'reliabilityonline' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		<?php else : ?>
			<h1 class="page-title"><?php _e( 'Nothing Found', 'reliabilityonline' ); ?></h1>
		<?php endif; ?>
						<?php if ( have_posts() ) : ?>
               <?php /* Start the Loop */ ?>
               <?php while ( have_posts() ) : the_post(); ?>
               <div id="post-<?php the_ID(); ?>" class="post_single">
                  <?php if ( is_sticky() ) : ?>
                  <hgroup>
                     <h2><a href="<?php the_permalink(); ?>"  rel="bookmark"><?php the_title(); ?></a></h2>
                     <h3 class="entry-format"><?php _e( 'Featured', 'reliabilityonline' ); ?></h3>
                  </hgroup>
                  <?php else : ?>
                  <h2><a href="<?php the_permalink(); ?>"  rel="bookmark"><?php the_title(); ?></a></h2>
                  <?php endif; ?>
          <p>  <?php echo wp_trim_words( get_the_content(), 10); ?></p>
                  
                     <a href="<?php the_permalink(); ?>" class="btn btn-sm">Read More</a> 
                 
               </div>
               <!-- #post-<?php the_ID(); ?> -->
               <?php endwhile; ?>
               <?php if(function_exists('wp_page_numbers')) : wp_page_numbers(); endif; ?>
               <?php else : ?>
               <article id="post-0" class="post no-results not-found">
                
                  <!-- .entry-header -->
                  <div class="entry-content">
                     <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'reliabilityonline' ); ?></p>
                  </div>
                  <!-- .entry-content -->
               </article>
               <!-- #post-0 -->
               <?php endif; ?>  
            </div>
            <?php get_sidebar(); ?>
         </div>
      </div>
   </section>
</main>

<?php
get_footer();
