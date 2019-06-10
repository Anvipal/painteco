<style>
    .front-gallery-slider {
        margin: 0 -25px;
        position: relative;
    }
    .front-gallery-slider .slick-track {
        margin: 20px 0;
    }
    .front-gallery-slide {
        height: 300px;
        margin: 0 25px;
    }
    .front-gallery_content {
        height: 100%;
        background: no-repeat center/cover;
        border-radius: 8px;
        border: 1px solid #dedbdb;
    }

    .front-gallery-slider .slick-arrow {
/*  @include tablet-landscape-down {
    width: 145px;
    margin: 0 auto 20px;
  }*/

/*  a {
    position: absolute;
    top: 95px;
*/
/*    @include tablet-landscape-down {
      top: 0;
      position: relative;
      margin-left: 20px;
    }*/
        background: url('<?php echo get_stylesheet_directory_uri();?>/images/carousel-arrows.png') no-repeat;
        width: 51px;
        height: 51px;
        display: inline-block;
        text-indent: -999999px;
    }

    .front-gallery-slider .slick-arrow.slick-prev {
        background-position: 0 0;
        left: -55px;
        /*@include tablet-landscape-down {
          left: 0;
        }*/
    }
    .front-gallery-slider .slick-arrow.slick-next {
        background-position: -51px 0;
        right: -55px;
        /*@include tablet-landscape-down {
          right: auto;
        }*/
    }
}


</style>

<!-- FRONT GALLERY START -->
<div class="container tools front-gallery">
    <div class="tools-text text-center">
        <h3><?php esc_html_e('Galerija', 'painteco'); ?></h3>
    </div>
    <?php $images = get_field('gallery_images', 3594); ?>
    <div class="front-gallery-slider">
        <?php foreach ($images as $image) : ?>
            <div class="tools-image front-gallery-slide">
                <div class="front-gallery_content" style="background-image: url('<?php echo $image['url'] ?>')"></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- FRONT GALLERY END -->