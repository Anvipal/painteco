<?php
/**
 * Template Name: Produkti
 *
 * @package painteco
 */

global $headBackground;
$headBackground = get_field('title_image_products', 'options');

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <!-- Components -->
            <div class="container components">
                <h2 class="page-section-title text-uppercase"><?php esc_html_e('Dabīgās sastāvdaļas', 'painteco'); ?></h2>
                <!--div class="col-sm-4">
                    <?php //get_template_part('template-parts/products_components'); ?>
                </div -->
                <div class="text product-overall-description">
                    <div class="cat-default">
                        <?php the_content(); ?>
                    </div>
                    <div class="cat-furniture" style="display: none;">
                        <?php the_field('products_purpose_furniture', 'options'); ?>
                    </div>
                    <div class="cat-yard" style="display: none;">
                        <?php the_field('products_purpose_yard', 'options'); ?>
                    </div>
                    <div class="cat-floor" style="display: none;">
                        <?php the_field('products_purpose_floor', 'options'); ?>
                    </div>
                    <div class="cat-facade" style="display: none;">
                        <?php the_field('products_purpose_facade', 'options'); ?>
                    </div>
                    <div class="cat-restoration" style="display: none;">
                        <?php the_field('products_purpose_restoration', 'options'); ?>
                    </div>
                    <div class="cat-toys" style="display: none;">
                        <?php the_field('products_purpose_toys', 'options'); ?>
                    </div>
                    <div class="cat-sauna" style="display: none;">
                        <?php the_field('products_purpose_sauna', 'options'); ?>
                    </div>
                </div>
            </div>


            <!-- Options / Filter -->
            <div class="container products-list-paint-options">
                <p class="want-to-color"><?php esc_html_e('Vēlos krāsot...', 'painteco'); ?></p>
                <ul class="products-list-paint-options-items list-unstyled list-inline">
                    <li class="furniture"><a href="#" class="filter" data-filter=".cat-furniture"><?php esc_html_e('Mēbeles', 'painteco'); ?></a></li>
                    <li class="yard"><a href="#" class="filter" data-filter=".cat-yard"><?php esc_html_e('Pagalms', 'painteco'); ?></a></li>
                    <li class="floor"><a href="#" class="filter" data-filter=".cat-floor"><?php esc_html_e('Grīda', 'painteco'); ?></a></li>
                    <li class="facade"><a href="#" class="filter" data-filter=".cat-facade"><?php esc_html_e('Māja', 'painteco'); ?></a></li>
                    <li class="restoration"><a href="#" class="filter" data-filter=".cat-restoration"><?php esc_html_e('Restaurācija', 'painteco'); ?></a></li>
                    <li class="toys"><a href="#" class="filter" data-filter=".cat-toys"><?php esc_html_e('Rotaļlietas', 'painteco'); ?></a></li>
                    <li class="sauna"><a href="#" class="filter" data-filter=".cat-sauna"><?php esc_html_e('Pirts', 'painteco'); ?></a></li>
                </ul>
            </div>

            <!-- Product list -->
            <div class="container products-list">
                <div class="row">
                    <div id="paint-products-list">
                        <?php
                        $productsQuery = new WP_Query(['post_type' => 'painteco_product']);
                        if ($productsQuery->have_posts()) :
                            while ($productsQuery->have_posts()) : $productsQuery->the_post();
                        ?>

                            <?php
                                $mixClasses = '';
                                foreach (get_field('product_usage') as $usage) {
                                    $mixClasses .= ' cat-' . $usage;
                                }

                                $thumbnailUrl = wp_get_attachment_url( get_post_thumbnail_id() );
                            ?>

                            <div class="col-sm-4 mix <?php echo $mixClasses; ?>">
                                <div class="product-item">
                                    <a href="<?php the_permalink(); ?>" title=""><img src="<?php echo $thumbnailUrl; ?>" alt="<?php the_title(); ?>"></a>
                                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                                </div>
                            </div>

                        <?php endwhile; endif; ?>

                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>


        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
