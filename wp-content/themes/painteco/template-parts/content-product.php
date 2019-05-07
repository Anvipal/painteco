<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package painteco
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('product-body'); ?>>

	<header class="entry-header"></header><!-- .entry-header -->

	<div class="entry-content text">
		<?php
		the_content( sprintf(
		/* translators: %s: Name of current post. */
			wp_kses( __( 'Turpini lasīt %s <span class="meta-nav">&rarr;</span>', 'painteco' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );

		//			wp_link_pages( array(
		//				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'painteco' ),
		//				'after'  => '</div>',
		//			) );
		?>
		<div class="clearfix"></div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //painteco_entry_footer(); ?>
	</footer><!-- .entry-footer -->



</article><!-- #post-## -->
