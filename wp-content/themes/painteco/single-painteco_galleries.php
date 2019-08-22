<?php
/**
 * Created by PhpStorm.
 * User: uldis
 * Date: 02/04/16
 * Time: 16:39
 */

global $headBackground;
$headBackground = get_field('title_image_gallery', 'options');

get_header(); ?>

    <?php

    ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <!-- Submenu -->
            <?php /*
            $postTerms = get_the_terms($post->ID, 'painteco_gallery_category');
            $allTerms = get_terms('painteco_gallery_category');
            if ( ! empty($allTerms)) :
                ?>
                <nav class="page-navigation">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="submenu list-unstyled list-inline narrow">
                                    <?php foreach ($allTerms as $term) : ?>
                                        <li class="<?php if (isset($postTerms[0]) && $postTerms[0]->term_id == $term->term_id): ?>active<?php endif; ?>">
                                            <a href="<?php echo get_term_link($term, 'painteco_gallery_category'); ?>"
                                               title="<?php echo $term->name ?>"><?php echo $term->name ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            <?php endif; */ ?>

            <!-- Gallery images -->
            <div class="container gallery-images">
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="gallery-title"><?php the_title(); ?></h1>
                    </div>

                    <div class="col-lg-6 gallery-nav">
                        <?php
                        $terms = get_the_terms($post->ID, 'painteco_gallery_category');
                        if (0 < count($terms)) :
                            $categoryName = $terms[0]->name;
                            $categoryUrl = get_term_link($terms[0], 'painteco_gallery_category');
                            ?>
                            <a href="<?php echo $categoryUrl; ?>" class="btn-back"><?php esc_html_e('Atpakaļ uz', 'painteco'); ?> "<?php echo $categoryName; ?>"</a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="gallery-images-big">
                        <?php if ('image' == get_field('gallery_type')) : ?>
                            <?php $images = get_field('gallery_images'); ?>

                            <?php foreach ($images as $image) : ?>
                                <div class="gallery-image-big" style="background-image: url(<?php echo $image['url']; ?>)">
                                    <!-- <div class="gallery-image-thumb">
                                        <img src="" alt="<?php echo $image['alt']; ?>">
                                        <a href="<?php echo $image['url']; ?>" rel="gallery" title="<?php echo $image['title']; ?> / <?php echo $image['description']; ?>" class="fancybox gallery-image-title">
                                            <span><?php echo $image['title'] ? $image['title'] : $image['filename']; ?></span>
                                        </a>
                                    </div> -->
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <?php $videos = get_field('gallery_video') ?>

                            <?php foreach ($videos as $video) : ?>
                                <?php
                                $videoId = str_replace('https://youtu.be/', '', $video['gallery_video_item']);
                                ?>
                                <div class="">
                                    <div class="gallery-image-thumb">
                                        <img src="<?php echo $video['gallery_video_thumbnail']; ?>" alt="<?php echo $video['gallery_video_item_title']; ?>">
                                        <a href="https://www.youtube.com/embed/<?php echo $videoId ?>" rel="gallery" title="<?php echo $video['gallery_video_item_title']; ?>" class="fancybox.iframe fancybox-video gallery-image-title">
                                            <span><?php echo $video['gallery_video_item_title']; ?></span>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="gallery-images-cnt">
                        <?php if ('image' == get_field('gallery_type')) : ?>
                            <?php $images = get_field('gallery_images'); ?>

                            <?php foreach ($images as $image) : ?>
                                <div class="gallery-image col-xs-2">
                                    <div class="gallery-image-thumb">
                                        <img src="<?php echo $image['sizes']['news-image']; ?>" alt="<?php echo $image['alt']; ?>">
                                        <a href="<?php echo $image['url']; ?>" rel="gallery" title="<?php echo $image['title']; ?> / <?php echo $image['description']; ?>" class="fancybox gallery-image-title">
                                            <span><?php echo $image['title'] ? $image['title'] : $image['filename']; ?></span>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <?php $videos = get_field('gallery_video') ?>

                            <?php foreach ($videos as $video) : ?>
                                <?php
                                $videoId = str_replace('https://youtu.be/', '', $video['gallery_video_item']);
                                ?>
                                <div class="gallery-image col-sm-4 col-xs-12">
                                    <div class="gallery-image-thumb">
                                        <img src="<?php echo $video['gallery_video_thumbnail']; ?>" alt="<?php echo $video['gallery_video_item_title']; ?>">
                                        <a href="https://www.youtube.com/embed/<?php echo $videoId ?>" rel="gallery" title="<?php echo $video['gallery_video_item_title']; ?>" class="fancybox.iframe fancybox-video gallery-image-title">
                                            <span><?php echo $video['gallery_video_item_title']; ?></span>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                </div>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
