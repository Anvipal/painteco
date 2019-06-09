<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package painteco
 */

global $headBackground;
$headBackground = get_field('title_image_home', 'options');

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <?php get_template_part('template-parts/front_page_banner'); ?>

            <?php get_template_part('template-parts/front_page_products'); ?>

            <?php get_template_part('template-parts/front_page_tools'); ?>

            <?php get_template_part('template-parts/front_page_gallery')?>

            <?php get_template_part('template-parts/front_page_testimonial')?>

            <?php get_template_part('template-parts/front_page_news'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
