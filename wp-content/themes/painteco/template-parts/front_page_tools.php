<div class="container tools">
    <div class="row">
        <div class="col-sm-6 col-md-3 col-md-offset-3">
            <div class="tools-text-container">
                <div class="tools-text">
                    <h3><?php esc_html_e('Izkrāso pats!', 'painteco'); ?></h3>
                    <p><?php esc_html_e('Izmanto mūsu modelēšanas rīku, lai ieraudzītu pasauli mūsu krāsās.', 'painteco'); ?></p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 text-center">
            <?php
            $colorModelQuery = new WP_Query(['post_type' => 'painteco_color_model']);
            $permalink = '#';
            if ($colorModelQuery->have_posts()) {
                while($colorModelQuery->have_posts()) {
                    $colorModelQuery->the_post();
                    $permalink = get_the_permalink();
                    break;
                }
            }
            ?>
            <div class="tools-image house">
                <a href="<?php echo $permalink; ?>"><img src="<?php echo get_stylesheet_directory_uri();?>/images/constructor.png"></a>
            </div>
        </div>
        <!-- <div class="col-sm-6 col-md-3 text-center">
            <?php
            $categoryId = apply_filters( 'wpml_object_id', 25, 'painteco_gallery_category' );
            ?>
            <div class="tools-image">
                <a href="<?php echo get_term_link($categoryId, 'painteco_gallery_category'); ?>"><img src="<?php echo get_stylesheet_directory_uri();?>/images/gallery.png"></a>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="tools-text-container">
                <div class="tools-text">
                    <h3><?php esc_html_e('Galerija', 'painteco'); ?></h3>
                    <p><?php esc_html_e('Aplūko cik krāsaina var būt pasaule ar mūsu krāsām.', 'painteco'); ?></p>
                </div>
            </div>
        </div> -->
    </div>
</div>