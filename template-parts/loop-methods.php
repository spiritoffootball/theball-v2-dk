<?php
/**
 * Template part for embedding a display of all Methods.
 *
 * These are, in fact, pages with the "Metoden" page as parent.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2_Denmark
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Get parent page.
$loop_parent = get_page_by_path( 'metoden', OBJECT, 'page' );

// Skip rendering if we can't find the parent page.
if ( $loop_parent instanceof WP_Post ) :

	// Define query args.
	$loop_include_args = [
		'post_type'      => 'page',
		'post_status'    => 'publish',
		'post_parent'    => $loop_parent->ID,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'posts_per_page' => -1,
	];

	// The query.
	$loop_include = new WP_Query( $loop_include_args );

	if ( $loop_include->have_posts() ) : ?>

		<!-- loop-methods.php -->
		<section id="methods" class="loop-include loop-include-three content-area clear">
			<div class="loop-include-inner">

				<header class="loop-include-header">
					<h3 class="loop-include-title"><?php esc_html_e( 'Fair Play Football', 'theball-v2-dk' ); ?></h3>
					<h2 class="loop-include-title"><?php echo esc_html( get_the_title( $loop_parent ) ); ?></h2>
					<?php $page_excerpt = get_field( 'page_excerpt', $loop_parent->ID ); ?>
					<?php if ( ! empty( $page_excerpt ) ) : ?>
						<div class="methods-page-excerpt">
							<p><?php echo esc_html( $page_excerpt ); ?></p>
						</div>
					<?php endif; ?>
				</header><!-- .loop-include-header -->

				<div class="loop-include-posts">
					<?php

					// Start the loop.
					while ( $loop_include->have_posts() ) :

						$loop_include->the_post();

						// Get mini template.
						get_template_part( 'template-parts/content-method-mini' );

					endwhile;

					?>
				</div><!-- .loop-include-posts -->

				<footer class="loop-include-footer">
					<?php /* the_posts_navigation(); */ ?>
				</footer><!-- .loop-include-footer -->

			</div><!-- .loop-include-inner -->
		</section><!-- .loop-include -->

		<?php

	endif;

endif;

// Prevent weirdness.
wp_reset_postdata();
unset( $loop_parent, $loop_include_args, $loop_include );
