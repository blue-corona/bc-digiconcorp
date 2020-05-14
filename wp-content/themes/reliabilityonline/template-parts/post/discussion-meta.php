<?php
/**
 * The template for displaying Current Discussion on posts
 *
 * @package WordPress
 * @subpackage Reliability_Online
 * @since 1.0.0
 */

/* Get data from current discussion on post. */
$discussion    = reliabilityonline_get_discussion_data();
$has_responses = $discussion->responses > 0;

if ( $has_responses ) {
	/* translators: %1(X comments)$s */
	$meta_label = sprintf( _n( '%d Comment', '%d Comments', $discussion->responses, 'reliabilityonline' ), $discussion->responses );
} else {
	$meta_label = __( 'No comments', 'reliabilityonline' );
}
?>

<div class="discussion-meta">
	<?php
	if ( $has_responses ) {
		reliabilityonline_discussion_avatars_list( $discussion->authors );
	}
	?>
	<p class="discussion-meta-info">
		<?php echo reliabilityonline_get_icon_svg( 'comment', 24 ); ?>
		<span><?php echo esc_html( $meta_label ); ?></span>
	</p>
</div><!-- .discussion-meta -->
