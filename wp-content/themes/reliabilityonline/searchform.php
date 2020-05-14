<?php
/**
 * Template for displaying search forms in Reliability Online
 *
 * @package WordPress
 * @subpackage Reliability_Online
 * @since 1.0
 * @version 1.0
 */
?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

  <form role="search"  method="get" class="search-form"  action="<?php echo esc_url(home_url('/'))?>">
							<label for="<?php echo $unique_id; ?>">
								<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'reliabilityonline' ); ?></span>
							</label>
							<input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'reliabilityonline' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
							<button type="submit" class="search-submit"><i class="fas fa-search"></i> <use href="#icon-search" xlink:href="#icon-search"></use> </svg><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'reliabilityonline' ); ?></span></button>
						</form>
