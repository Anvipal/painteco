<?php
/**
 * Created by PhpStorm.
 * User: uldis
 * Date: 02/04/16
 * Time: 16:25
 */

global $headBackground;
$headBackground = get_field('title_image_gallery', 'options');

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <!-- Submenu -->
            <?php
            $currentTerm = get_queried_object()->term_id;

            $terms = get_terms('painteco_gallery_category'); //print_r($terms);
            if ( ! empty($terms)) :
            ?>
                <nav class="page-navigation">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="submenu list-unstyled list-inline narrow">
                                    <?php foreach ($terms as $term) : ?>
                                        <li class="<?php if ($currentTerm == $term->term_id): ?>active<?php endif; ?>">
                                            <a href="<?php echo get_term_link($term, 'painteco_gallery_category'); ?>"
                                               title="<?php echo $term->name ?>"><?php echo $term->name ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            <?php endif; ?>

            <!-- Gallery list -->
            <div class="container gallery-list">
                <div class="row">
                    <?php
                    $idx = 1;
                    if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post();?>

                        <div class="col-sm-4">
                            <div class="gallery-item">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="darken"><img
                                        src="<?php the_post_thumbnail_url('news-image'); ?>" alt="<?php the_title(); ?>"></a>
                                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                            </div>
                        </div>

                        <?php echo ($idx % 3 == 0 ? '<div class="clearfix"></div>' : ''); ?>

                        <?php ++$idx; ?>

                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>


        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
