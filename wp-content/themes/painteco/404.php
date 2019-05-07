<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package painteco
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <section class="error-404 not-found text-center">
                <header class="page-header">
                    <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/404.png" alt="404"></p>

                    <h1 class="page-title"><?php esc_html_e('Ak vai! Šo lapu mēs nevaram atrast.', 'painteco'); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content"></div><!-- .page-content -->
            </section><!-- .error-404 -->

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
