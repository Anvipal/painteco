<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package painteco
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

            <div class="container news">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="content-box blog-list">

                            <!-- Blog items -->
                            <?php if ( have_posts() ) : ?>
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
