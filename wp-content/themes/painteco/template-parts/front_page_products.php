<!-- Options / Filter -->
<div class="container paint-options">
    <p class="want-to-color"><?php esc_html_e('Vēlos krāsot...', 'painteco'); ?></p>

    <ul class="paint-options-items list-unstyled list-inline">
        <?php
        $productPermalink = get_permalink(wpml_object_id_filter(21, 'page'));
        ?>
        <li class="furniture"><a href="<?php echo $productPermalink; ?>#cat-furniture" class="filter1" data-filter=".cat-furniture"><?php esc_html_e('Mēbeles', 'painteco'); ?></a></li>
        <li class="yard"><a href="<?php echo $productPermalink; ?>#cat-yard" class="filter1" data-filter=".cat-yard"><?php esc_html_e('Pagalms', 'painteco'); ?></a></li>
        <li class="floor"><a href="<?php echo $productPermalink; ?>#cat-floor" class="filter1" data-filter=".cat-floor"><?php esc_html_e('Grīda', 'painteco'); ?></a></li>
        <li class="facade"><a href="<?php echo $productPermalink; ?>#cat-facade" class="filter1" data-filter=".cat-facade"><?php esc_html_e('Māja', 'painteco'); ?></a></li>
        <li class="restoration"><a href="<?php echo $productPermalink; ?>#cat-restoration" class="filter1" data-filter=".cat-restoration"><?php esc_html_e('Restaurācija', 'painteco'); ?></a></li>
        <li class="toys"><a href="<?php echo $productPermalink; ?>#cat-toys" class="filter1" data-filter=".cat-toys"><?php esc_html_e('Rotaļlietas', 'painteco'); ?></a></li>
        <li class="sauna"><a href="<?php echo $productPermalink; ?>#cat-sauna" class="filter1" data-filter=".cat-sauna"><?php esc_html_e('Pirts', 'painteco'); ?></a></li>
    </ul>
</div>

<!-- Products -->
<div class="container paint-products">
    <div class="tools-text text-center">
        <h3><br>Our Products</h3>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?php
                $productsQuery = new WP_Query(['post_type' => 'painteco_product']);
                if ($productsQuery->have_posts()) :?>

                <div class="paint-products-item-nav hidden-xs">
                    <a href="#" title="" class="paint-products-item-nav-prev">Previous</a>
                    <a href="#" title="" class="paint-products-item-nav-next">Next</a>
                </div>

                <div class="paint-products-item-cnt products-list">
                    <?php while ($productsQuery->have_posts()) : $productsQuery->the_post(); ?>
                    <?php
                        $mixClasses = '';
                        $usages = get_field('product_usage');
                        if (is_array($usages)) {
	                        foreach ( $usages as $usage ) {
		                        $mixClasses .= ' cat-' . $usage;
	                        }
                        }

                        $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                        $thumbnailUrl = $thumbnail[0];
                    ?>
                   <!--  <div class="paint-products-item-box">
                        <div class="paint-products-item">
                            <div class="paint-products-item-content" style="background-image:url('<?php echo $thumbnailUrl; ?>'); background-size: contain;">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <div class="paint-products-item-overlay">
                                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/painteco-symbol.png" alt="">
                                        <h2><?php the_title(); ?></h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div> -->

                    <!-- Product list -->

                    <!-- <div class="col-sm-3 mix <?php echo $mixClasses; ?>"> -->
                        <div class="paint-products-item-box">
                            <div class="product-item">
                                <a href="<?php the_permalink(); ?>" title=""><img src="<?php echo $thumbnailUrl; ?>" alt="<?php the_title(); ?>"></a>
                                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                            </div>
                        </div>
                    <!-- </div> -->

                <?php endwhile; ?>
                </div>

                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
        </div>
    </div>
</div>