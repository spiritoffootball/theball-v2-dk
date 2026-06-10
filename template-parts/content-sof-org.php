<?php
/**
 * Template part for displaying an SOF Organisation.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2_Denmark
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!-- content-sof-org.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header"<?php the_ball_v2_feature_image_style(); ?>>
		<?php if ( is_single() ) : ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php else : ?>
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<?php endif; ?>
		<?php the_ball_v2_feature_image_caption(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php $page_image = get_field( 'svg_feature_image' ); ?>
		<?php if ( ! empty( $page_image ) ) : ?>
			<div class="text-align-center sof-org-feature-image">
				<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
				<?php echo $page_image; ?>
			</div>
		<?php endif; ?>

		<?php $page_excerpt = get_field( 'page_excerpt' ); ?>
		<?php if ( ! empty( $page_excerpt ) ) : ?>
			<div class="sof-org-page-excerpt">
				<?php echo esc_html( $page_excerpt ); ?>
			</div>
		<?php endif; ?>

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
