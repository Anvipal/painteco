<?php
/**
 * Created by PhpStorm.
 * User: uldis
 * Date: 26/03/16
 * Time: 17:18
 */

global $headBackground;
$headBackground = get_field('title_image_products', 'options');

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <div class="container product-options">
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="products-sidebar-menu list-unstyled">
                            <?php
                            global $post; $productId = $post->ID;
                            $productsQuery = new WP_Query(['post_type' => 'painteco_product']);
                            if ($productsQuery->have_posts()) :
                                while ($productsQuery->have_posts()) : $productsQuery->the_post(); ?>
                                    <li class="<?php the_field('product_type'); echo ((get_the_ID() == $productId)? ' active':'') ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                <?php endwhile; endif; ?>
                            <?php wp_reset_postdata(); ?>
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <h1 class="product-title product-type-<?php echo the_field('product_type'); ?>"><?php the_title(); ?></h1>

                        <?php if (get_field('product_use_customized')) : ?>
                            <?php echo the_field('product_customized'); ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row product-color-picker">
                                        <?php
                                        $tones = get_field('product_tones');
                                        if ( ! empty($tones)) :
                                            $palette = painteco_get_palette();
                                            foreach ($tones as $toneCode) :
                                                ?>
                                                <div class="col-xs-3">
                                                    <div class="color" style="background: url('<?php echo $palette[$toneCode]['palette_sample']; ?>');">
                                                        <div class="color-info">
                                                            <span><?php echo $palette[$toneCode]['palette_name']; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php else : ?>
                            <?php  get_template_part('template-parts/products_head'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="container single-post">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="content-box">
                            <?php
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/content-product' );
                            endwhile;
                            ?>
                            <p>
                                <?php if(function_exists('pf_show_link')){echo pf_show_link();} ?>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

    <?php get_template_part('template-parts/consumption-calculator'); ?>

<?php
get_footer();
