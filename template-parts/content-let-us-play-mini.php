<?php
/**
 * Template part for displaying a Contact page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2_Denmark
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Get parent page.
$loop_parent = get_page_by_path( 'contact', OBJECT, 'page' );

// Skip rendering if we can't find the Contact page.
if ( $loop_parent instanceof WP_Post ) :

	// Add "fade-in" class to Post classes.
	//add_filter( 'post_class', 'the_ball_v2_dk_post_class_fade_in', 10, 3 );

	// Define query args.
	$loop_include_args = [
		'post_type'   => 'page',
		'post_status' => 'publish',
		'page_id'     => $loop_parent->ID,
	];

	// The query.
	$loop_include = new WP_Query( $loop_include_args );

	if ( $loop_include->have_posts() ) :

		// Start the loop.
		while ( $loop_include->have_posts() ) :

			$loop_include->the_post(); ?>

			<!-- content-let-us-play.php -->
			<section id="sof-contact" class="page-teaser content-area clear">
				<div class="loop-include-inner">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
						</header><!-- .entry-header -->

						<div class="entry-content">
							<?php $page_image = get_field( 'svg_feature_image' ); ?>
							<?php if ( ! empty( $page_image ) ) : ?>
								<div class="text-align-center contact-feature-image">
									<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
									<?php echo $page_image; ?>
								</div>
							<?php endif; ?>

							<h3 class="include-eyebrow-title"><?php esc_html_e( 'Get started', 'theball-v2-dk' ); ?></h3>
							<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

							<?php

							the_content(
								sprintf(
									/* translators: %s: Name of current post. */
									wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'theball-v2-dk' ), [ 'span' => [ 'class' => [] ] ] ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								)
							);

							$args = [
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'theball-v2-dk' ),
								'after'  => '</div>',
							];

							wp_link_pages( $args );

							?>
						</div><!-- .entry-content -->

						<footer class="entry-footer">
							<?php /* the_ball_v2_entry_footer(); */ ?>
						</footer><!-- .entry-footer -->
					</article><!-- #post-->
				</div><!-- .loop-include-inner -->
			</section><!-- .content-area -->

			<?php

		endwhile;

	endif;

	// Remove Post class filter.
	//remove_filter( 'post_class', 'the_ball_v2_dk_post_class_fade_in' );

endif;

// Prevent weirdness.
wp_reset_postdata();
unset( $loop_parent, $loop_include_args, $loop_include );
