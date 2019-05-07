<?php
/**
 * Template Name: Galerijas bildes
 *
 * @package painteco
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">


            <!-- Gallery images -->
            <div class="container gallery-images">
                <div class="row">

                    <div class="col-lg-6 col-xs-12">
                        <a href="/galerija/" title="Galerija" class="btn-back">Atpakaļ uz galeriju</a>
                    </div>

                    <div class="col-lg-6 col-xs-12">
                        <h1 class="gallery-title"><?php the_title(); ?></h1>
                    </div>

                    <div class="gallery-images-cnt">

                        <?php for($i=0; $i<15; $i++):?>
                        <div class="gallery-image col-sm-4 col-xs-12">
                            <div class="gallery-image-thumb">
                                <img src="<?php echo get_stylesheet_directory_uri();?>/images/painteco-gallery-image-1.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit.">
                                <a href="<?php echo get_stylesheet_directory_uri();?>/images/painteco-gallery-image-1_b.jpg" rel="gallery" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit." class="fancybox gallery-image-title">
                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                </a>
                            </div>
                        </div>
                        <?php endfor; ?>

                    </div>

                </div>
            </div>


        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
