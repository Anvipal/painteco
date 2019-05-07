<?php
/**
 * Template Name: Sadarbības partneri
 *
 * @package painteco
 */

global $headBackground;
$headBackground = get_field('title_image_about', 'options');

get_header(); ?>


    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php get_template_part('template-parts/about_submenu')?>

            <!-- Gallery images -->
            <div class="container partners">
                <div class="row">
                    <h2 class="page-section-title col-sm-12 text-uppercase">
                        <?php the_title() ?>
                    </h2>
                    
                    <?php if(have_rows('partners', 'options')): ?>
                        <?php while( have_rows('partners', 'options') ): the_row(); ?>
                            <div class="col-sm-4 col-lg-3 partner-logo text-center">
                                <a href="<?php echo get_sub_field('partner_url'); ?>">
                                    <img src="<?php echo get_sub_field('partner_logo'); ?>" alt="<?php echo get_sub_field('partner_name'); ?>">
                                </a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>


        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();


