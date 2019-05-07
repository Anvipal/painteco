<div class="container philosophy" id="philosophy">
    <div class="row">
        <?php $post = get_post(icl_object_id(196, 'page')); ?>

        <h2 class="page-section-title col-sm-12 text-uppercase"><?php esc_html_e('Filozofija', 'painteco')?></h2>
        <?php if (has_post_thumbnail($post->ID)) : ?>
            <div class="col-md-6 col-md-push-6 text text-center">
                <!-- wp-image-xx default class for images -->
                <?php  echo get_the_post_thumbnail($post->ID, [600, 400], ['class' => 'wp-image-8783']); ?>
            </div>
        <?php endif; ?>

        <div class="col-md-6 col-md-pull-6 text">
            <?php echo apply_filters('the_content', $post->post_content); ?>
        </div>
    </div>
</div>