<?php
/**
 * Template Name: Par mums (lapa)
 *
 * @package painteco
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php get_template_part('template-parts/about_submenu')?>
			

			<div class="container single-post">
				<div class="row">
					<div class="col-sm-12">

						<div class="content-box">
							<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', 'page' );

							endwhile;
							?>
						</div>
					</div>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
