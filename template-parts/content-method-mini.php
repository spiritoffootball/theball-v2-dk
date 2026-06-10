<?php
/**
 * Template part for displaying a Method in a loop include.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2_Denmark
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!-- content-method-mini.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php /* the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); */ ?>
		<div class="loop-step-num"><?php echo esc_html( $args['method_counter'] ); ?></div>
		<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
		<?php $page_subheading = get_field( 'page_subheading' ); ?>
		<?php if ( ! empty( $page_subheading ) ) : ?>
			<div class="loop-page-subheading">
				<p><?php echo esc_html( $page_subheading ); ?></p>
			</div>
		<?php endif; ?>
		<?php $page_excerpt = get_field( 'page_excerpt' ); ?>
		<?php if ( ! empty( $page_excerpt ) ) : ?>
			<div class="loop-page-excerpt">
				<p><?php echo esc_html( $page_excerpt ); ?></p>
			</div>
		<?php endif; ?>
		<?php $page_sub_excerpt = get_field( 'page_sub_excerpt' ); ?>
		<?php if ( ! empty( $page_sub_excerpt ) ) : ?>
			<div class="loop-page-sub-excerpt">
				<p><?php echo esc_html( $page_sub_excerpt ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</article><!-- #post-->
