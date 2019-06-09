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

            <!-- Submenu -->
            <nav class="page-navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="submenu list-unstyled list-inline narrow">
                                <li><a href="#contacts"><?php esc_html_e('Kontakti', 'painteco')?></a></li>
                                <li><a href="#map"><?php esc_html_e('Kur iegādāties', 'painteco')?></a></li>
                                <li><a href="/arvalstu-parstavji"><?php esc_html_e('Ārvalstu pārstāvji', 'painteco')?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <?php get_template_part('template-parts/contacts_overall'); ?>

            <?php get_template_part('template-parts/contacts_map'); ?>

            <!-- ?php get_template_part('template-parts/contacts_distributors'); ? -->
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
