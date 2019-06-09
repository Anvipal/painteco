<div class="lang">
    <div class="lang-switch">
        <?php
        $languages = apply_filters('wpml_active_languages', NULL, 'orderby=id&order=desc');
        foreach ($languages as $language) :
            $name = strtoupper( $language['code']);
            ?>
            <?php if (1 == $language['active']): ?>
                <strong><?php echo $name ?></strong>
            <?php else: ?>
                <a href="<?php echo $language['url'] ?>"><?php echo $name ?></a>
            <?php endif; ?>
        <?php endforeach; ?>
        <!-- <?php print_r($languages) ?> -->
    </div>

    <!--?php $cataloguePage = get_post(icl_object_id(557, 'page')); ?>
    <div class="catalog-download ">
        <a href="#" title="<?php echo esc_html__('Lejuplādēt katalogu', 'painteco'); ?>"
           data-toggle="modal" data-target="#cataloguesModal"><img src="<?php echo get_stylesheet_directory_uri();?>/images/catalog-download.png" alt="<?php echo esc_html__('Lejuplādēt katalogu', 'painteco'); ?>"></a>
    </div -->
</div>