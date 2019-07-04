<!-- FRONT GALLERY START -->
<div class="container tools front-gallery">
    <div class="tools-text text-center">
        <h3><?php esc_html_e('Galerija', 'painteco'); ?></h3>
    </div>
    <?php $images = get_field('gallery_images', FRONT_GALLERY_POST_ID); ?>
    <div class="front-gallery-slider">
        <?php foreach ($images as $image) : ?>
        <div class="tools-image front-gallery-slide">
            <div class="front-gallery_content" style="background-image: url('<?php echo $image['url'] ?>')"></div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- FRONT GALLERY END -->