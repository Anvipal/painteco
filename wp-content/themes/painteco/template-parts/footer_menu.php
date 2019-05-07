<div class="row">
    <div class="col-sm-4 col-xs-6">

        <div class="footer-menu">
            <h4 class="footer-menu-title">
                <?php icl_link_to_element(19, 'page'); ?>
            </h4>
            <?php wp_nav_menu([
                'theme_location' => 'about_us',
                'container' => false,
                'menu_class' => 'footer-menu-items',
            ]); ?>
        </div>

    </div>
    <div class="col-sm-4 col-xs-6">

        <div class="footer-menu">
            <h4 class="footer-menu-title">
                <?php icl_link_to_element(21, 'page'); ?>
            </h4>
            <?php wp_nav_menu([
                'theme_location' => 'products',
                'container' => false,
                'menu_class' => 'footer-menu-items',
            ]); ?>
        </div>
        <div class="footer-menu">
            <h4 class="footer-menu-title">
                <?php icl_link_to_element(27, 'page'); ?>
            </h4>
            <?php wp_nav_menu([
                'theme_location' => 'contacts',
                'container' => false,
                'menu_class' => 'footer-menu-items',
            ]); ?>
        </div>

        <div class="footer-menu">
            <h4 class="footer-menu-title no-border">
                <?php icl_link_to_element(8, 'category'); ?>
            </h4>
        </div>

    </div>
    <div class="col-sm-4 col-xs-6">

        <div class="footer-menu">
            <h4 class="footer-menu-title">
                <?php
                $categoryId = apply_filters( 'wpml_object_id', 25, 'painteco_gallery_category' );
                ?>
                <a href="<?php echo get_term_link($categoryId, 'painteco_gallery_category'); ?>">
                    <?php esc_html_e('Galerija', 'painteco'); ?>
                </a>
            </h4>
            <?php wp_nav_menu([
                'theme_location' => 'gallery',
                'container' => false,
                'menu_class' => 'footer-menu-items',
            ]); ?>
        </div>

    </div>
</div>