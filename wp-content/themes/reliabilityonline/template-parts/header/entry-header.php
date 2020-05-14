<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Reliability_Online
 * @since 1.0.0
 */

$discussion = ! is_page() && reliabilityonline_can_show_post_thumbnail() ? reliabilityonline_get_discussion_data() : null; ?>

<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

<?php if ( ! is_page() ) : ?>
<div class="entry-meta">
	<?php reliabilityonline_posted_by(); ?>
	<?php reliabilityonline_posted_on(); ?>
	<span class="comment-count">
		<?php
		if ( ! empty( $discussion ) ) {
			reliabilityonline_discussion_avatars_list( $discussion->authors );
		}
		?>
		<?php reliabilityonline_comment_count(); ?>
	</span>
	<?php
	// Edit post link.
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'reliabilityonline' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">' . reliabilityonline_get_icon_svg( 'edit', 16 ),
			'</span>'
		);
	?>
</div><!-- .entry-meta -->
<?php endif; ?>
