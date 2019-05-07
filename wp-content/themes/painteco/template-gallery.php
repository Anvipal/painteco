<?php
/**
 * Template Name: Galerija
 *
 * @package painteco
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <!-- Submenu -->
            <nav class="page-navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="submenu list-unstyled list-inline narrow">
                                <li><a href="#" title="Mūsu darbi">Mūsu darbi</a></li>
                                <li><a href="#" title="Izstādes">Izstādes</a></li>
                                <li><a href="#" title="Tā darām mēs">Tā darām mēs</a></li>
                                <li><a href="#" title="Pasākumi">Pasākumi</a></li>
                                <li><a href="#" title="Video">Video</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <?php
            $images = array(
                '1' => 'Galdniecība',
                '2' => 'Koka rotaļlietas',
                '3' => 'Aksesuāri',
                '4' => 'Dari pats - ķīmiskās krāsas noņemšana',
                '5' => 'Populārākie objekti',
                '6' => 'Citi',
                '7' => 'Iekšdarbi',
                '8' => 'Ārdarbi'
            );
            ?>

            <!-- Gallery list -->
            <div class="container gallery-list">
                <div class="row">
                    <?php foreach($images as $key => $image): ?>

                        <div class="col-sm-4">
                            <div class="gallery-item">
                                <a href="/galerija/galerijas-nosaukums/" title="" class="darken"><img src="<?php echo get_stylesheet_directory_uri();?>/images/painteco-gallery-<?php echo $key;?>.jpg" alt=""></a>
                                <h2><a href="/galerija/galerijas-nosaukums/" title="<?php echo $image; ?>"><?php echo $image; ?></a></h2>
                            </div>
                        </div>

                        <?php echo ($key % 3 == 0 ? '<div class="clearfix"></div>' : ''); ?>

                    <?php endforeach; ?>
                </div>
            </div>


        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
