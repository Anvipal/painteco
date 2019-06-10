<?php
/**
 * Template Name: Distributors
 *
 * @package painteco
 */

global $headBackground;
$headBackground = get_field('title_image_contacts', 'options');

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php get_template_part('template-parts/contacts_distributors'); ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
