<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package painteco
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
	<div class="col-sm-3">
		<?php if ( has_post_thumbnail() ):
			the_post_thumbnail('news-list-thumb');
		endif; ?>
	</div>

	<div class="col-sm-9">
		<header class="entry-header">
			<?php
				if ( is_single() ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}

			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php painteco_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<a href="<?php echo esc_url(get_permalink()); ?>" title="<?php esc_html(get_the_title()); ?>" class="read-more blog"><?php echo esc_html__( 'Atvērt', 'painteco' ); ?> <span class="glyphicon glyphicon-play" aria-hidden="true"></span></a>
			<?php //painteco_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
