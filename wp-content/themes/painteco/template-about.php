<?php
/**
 * Template Name: Par mums
 *
 * @package painteco
 */

global $headBackground;
$headBackground = get_field('title_image_about', 'options');

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php get_template_part('template-parts/about_submenu')?>

            <?php get_template_part('template-parts/about_philosophy')?>
            
            <?php get_template_part('template-parts/about_why')?>

            <?php get_template_part('template-parts/about_team')?>

            <?php get_template_part('template-parts/about_research')?>

            <?php get_template_part('template-parts/about_projects')?>

            <?php get_template_part('template-parts/about_testimonial')?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
