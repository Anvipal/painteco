<?php if(have_rows('testimonial_provider', 'options')): ?>
    <div class="testimonial-slider" id="testimonial">
        <div class="container">
            <div class="tools-text text-center">
                <h3><?php echo __('Atsauksmes') ?><br><br></h3>
            </div>
            <div class="row">
                <div class="col-sm-12 testimonial-slider-items">
                    <?php while( have_rows('testimonial_provider', 'options') ): the_row(); ?>
                        <div class="container testimonial-item">
                            <div class="row team-slider-nav">
                                <div class="col-xs-2"><a href="#" class="nav-slide prev"></a></div>
                                <div class="col-xs-8 text-center">
                                    <p class="name"><?php echo get_sub_field('testimonial_name'); ?></p>
                                    <p class="position"><?php echo get_sub_field('testimonial_title'); ?></p>
                                </div>
                                <div class="col-xs-2"><a href="#" class="nav-slide next"></a></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9 memo">
                                    <?php echo get_sub_field('testimonial_quote'); ?>
                                </div>
                                <?php  if(get_sub_field('testimonial_image')) : ?>
                                    <div class="col-sm-3 text-center">
                                        <a href="#">
                                            <img src="<?php echo get_sub_field('testimonial_image'); ?>"
                                                    alt="<?php echo get_sub_field('testimonial_name'); ?>">
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                    <?php endwhile; ?>
                </div>
            </div>
        </div>

    </div>
<?php endif; ?>