<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package painteco
 */

?>

<section class="no-results not-found">

		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'Neko neatradām', 'painteco' ); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">
				<?php
				if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

					<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'painteco' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

				<?php elseif ( is_search() ) : ?>

					<p><?php esc_html_e( 'Ak vai! Neko neizdevās atrast. Varbūt mēģini ar citu atslēgvārdu?', 'painteco' ); ?></p>

				<?php else : ?>

					<p><?php esc_html_e( 'Izskatās, ka nevaram neko atrast. Varbūt mēģini meklēšanu pēc atslēgvārda?', 'painteco' ); ?></p>

				<?php endif; ?>
		</div><!-- .page-content -->

</section><!-- .no-results -->
