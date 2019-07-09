<?php
/**
 * Template Name: Kontakti
 *
 * @package painteco
 */

global $headBackground;
$headBackground = get_field('title_image_contacts', 'options');

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php get_template_part('template-parts/contacts_overall'); ?>
            <?php get_template_part('template-parts/contacts_shops'); ?>
            <?php get_template_part('template-parts/contacts_map'); ?>
            <!-- ?php get_template_part('template-parts/contacts_distributors'); ? -->
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
