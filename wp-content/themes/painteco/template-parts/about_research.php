<div class="container research" id="research">
    <div class="row">
        <?php $post = get_post(icl_object_id(248, 'page')); ?>
        <div class="col-sm-6 col-sm-push-6 text text-center">
            <!-- wp-image-xx default class for images -->
            <?php  echo get_the_post_thumbnail($post->ID, [600, 400], ['class' => 'wp-image-8783']); ?>
        </div>
        <div class="col-sm-6 col-sm-pull-6 text">
            <h2 class="page-section-title text-uppercase"><?php echo apply_filters('the_title', $post->post_title); ?></h2>

            <?php the_field('page_advanced_excerpt'); ?>

            <a href="<?php echo get_permalink($post); ?>" title="" class="read-more dark"><?php echo esc_html__( 'Lasīt vairāk', 'painteco' ); ?> <span class="glyphicon glyphicon-play" aria-hidden="true"></span></a>
        </div>
    </div>
</div>