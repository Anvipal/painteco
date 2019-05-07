<?php if (get_field('front_page_banner_image', 'options')): ?>
    <div class="container banner">
        <div class="row">
            <div class="col-sm-12 text-center">
                <a href="<?php the_field('front_page_banner_url', 'options'); ?>">
                    <img src="<?php the_field('front_page_banner_image', 'options'); ?>" alt="" class="img-responsive">
                </a>
            </div>
        </div>
    </div>
<?php endif; ?>