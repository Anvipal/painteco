<div class="container why" id="why">
    <div class="row">
        <div class="col-lg-4 text">
            <h2 class="page-section-title"><?php esc_html_e('Kāpēc Paint ECO?', 'painteco')?></h2>
            <p><?php the_field('why_reasons_description', 'options'); ?></p>
            <img src="<?php echo get_stylesheet_directory_uri();?>/images/painteco-slogan-sm<?php if (ICL_LANGUAGE_CODE) { echo '-' . ICL_LANGUAGE_CODE; } ?>.png" alt="<?php echo get_bloginfo( 'description', 'display' ); ?>">

        </div>
        <div class="col-lg-8 text text-center">
            <div class="flower">
                <?php $idx = 1; ?>
                <?php if(have_rows('why_reasons', 'options')): ?>
                    <?php while( have_rows('why_reasons', 'options') ): the_row(); ?>
                        <div class="leaf leaf-<?php echo $idx; ?>" data-bg="<?php echo get_stylesheet_directory_uri();?>/images/painteco-flower-<?php echo $idx; ?>.png">
                            <a href="#"><?php echo get_sub_field('why_reasons_title'); ?></a>
                            <div class="popup-info">
                                <h4>
                                    <a href="#" title="" class="leaf-close"><img src="<?php echo get_stylesheet_directory_uri();?>/images/close.png" alt="X"></a>
                                    <?php echo get_sub_field('why_reasons_title'); ?>
                                </h4>
                                <p><?php echo get_sub_field('why_reasons_description'); ?></p>
                            </div>
                        </div>
                        <?php ++$idx; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>