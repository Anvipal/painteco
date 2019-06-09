<!-- FRONT GALLERY START -->
<div class="container tools front-gallery">
    <?php $images = get_field('gallery_images', 3594); ?>

    <div class="row">
        <?php foreach ($images as $image) : ?>
        <div class="col-sm-4"><img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt']; ?>" style="width: 100%"></div>
        <?php endforeach; ?>
    </div>

</div>
<!-- FRONT GALLERY END -->