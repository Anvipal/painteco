<?php
query_posts([
    'category_name' => 'aktualitates', 
    'posts_per_page' => 3, 
    'suppress_filters' => 0]);

if ( have_posts() ) : ?>
    <!-- News -->
    <div class="news">

        <div class="container">
            <div class="row">
                <?php while ( have_posts() ) : the_post();?>
                    <div class="col-sm-4 news-item">
                        <?php get_template_part( 'template-parts/content-news-list-item');?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

    </div>
<?php endif; ?>