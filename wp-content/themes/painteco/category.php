<?php
/**
 * Category layout
 *
 * @package painteco
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

            <!-- Submenu -->
            <?php

            $theCategory = get_the_category();
            $theCategoryId = $theCategory[0]->cat_ID;

            $tipsCategoryId = painteco_lang_category_id(15);
            $categories = get_categories(['child_of' => $tipsCategoryId]);
            if ($categories) :
                ?>
                <nav class="page-navigation">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="submenu list-unstyled list-inline narrow">
                                    <?php foreach ($categories as $category): ?>
                                        <li<?php if ($theCategoryId == $category->term_id) : ?> class="active"<?php endif; ?>>
                                            <a href="<?php echo get_category_link($category->term_id) ?>"><?php echo $category->name; ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            <?php endif; ?>

            <div class="container articles">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="content-box blog-list">

                            <!-- Blog items -->
                            <?php
                            if ( have_posts() ) : ?>
                                <?php while ( have_posts() ) : the_post();?>
                                    <?php get_template_part( 'template-parts/content-blog-list-item');?>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <!-- Pagination -->
                            <?php
                            $pages = paginate_links( array(
                                'current' => max( 1, get_query_var('paged') ),
                                'total' => $wp_query->max_num_pages,
                                'prev_next' => false,
                                'type' => 'array',
                            ) );
                            if ($pages) :
                                ?>
                                <nav class="text-center">
                                    <ul class="pagination">
                                        <li class="prev">
                                            <?php echo get_previous_posts_link('<img src="' . get_stylesheet_directory_uri() . '/images/arrow-prev.png">');   ?>
                                        </li>

                                        <?php foreach ($pages as $idx => $pageLink) : ?>
                                            <li<?php if (strpos($pageLink, 'current')): ?> class="active"<?php endif; ?>><?php echo $pageLink; ?></li>
                                        <?php endforeach; ?>

                                        <li class="next">
                                            <?php echo get_next_posts_link('<img src="' . get_stylesheet_directory_uri() . '/images/arrow-next.png">');   ?>
                                        </li>
                                    </ul>
                                </nav>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>
            </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
