<?php
/**
 * Template part for displaying an Activity in a loop include.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2_Denmark
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!-- content-activity-mini.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="text-align-center entry-header">
		<?php $page_image = get_field( 'svg_feature_image' ); ?>
		<?php if ( ! empty( $page_image ) ) : ?>
			<div class="text-align-center activity-feature-image">
				<?php /* <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo $page_image; ?></a> */ ?>
				<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
				<?php echo $page_image; ?>
			</div>
		<?php endif; ?>
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php /* the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); */ ?>
		<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>

		<?php $page_excerpt = get_field( 'page_excerpt' ); ?>
		<?php if ( ! empty( $page_excerpt ) ) : ?>
			<div class="loop-page-excerpt">
				<p><?php echo esc_html( $page_excerpt ); ?></p>
			</div>
		<?php endif; ?>
	</div>

</article><!-- #post-->
