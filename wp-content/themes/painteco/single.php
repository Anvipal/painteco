<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
            $tipsSubCategories = get_categories(['child_of' => $tipsCategoryId]);

            $showTipsSubmenu = false;
            foreach ($tipsSubCategories as $subcat) {
                foreach ($theCategory as $theCat) {
                    if ($theCat->term_id == $subcat->term_id) {
                        $showTipsSubmenu = true;
                    }
                }
            }


            if ($tipsSubCategories && $showTipsSubmenu) :
                ?>
                <nav class="page-navigation">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="submenu list-unstyled list-inline narrow">
                                    <?php foreach ($tipsSubCategories as $category): ?>
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


            <div class="container single-post">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="content-box">
                            <?php
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content', get_post_format() );

                                //the_post_navigation();

                                // If comments are open or we have at least one comment, load up the comment template.
                                //if ( comments_open() || get_comments_number() ) :
                                //	comments_template();
                                //endif;

                            endwhile; // End of the loop.
                            ?>
                            <p>
                                <?php
                                $category = get_the_category();
                                if (isset($category[0])) :
                                    $categoryUrl = get_category_link($category[0]->cat_ID);

                                ?>
                                    <a href="<?php echo $categoryUrl; ?>" class="btn-back"><?php esc_html_e('Atpakaļ', 'painteco'); ?> </a>
                                <?php endif; ?>
                            </p>
                            <p>
                                <?php if(function_exists('pf_show_link')){echo pf_show_link();} ?>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
