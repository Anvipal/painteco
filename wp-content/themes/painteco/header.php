<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package painteco
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
	switch (ICL_LANGUAGE_CODE) {
		case 'lv':
			$keywords = 'Pernica, lineļļa, lineļļas pernica, eļļa kokam, beice, dabīga beice, krāsa, dabīga krāsa, eko, eko krāsa, ekoloģisks, dabīgs, dabīgi produkti, būvniecība, krāsošana, atjaunošana, remonts, restaurācija, vasks, koka virsmas, māja, mēbeles, grīdas eļļa, terase, terases eļļa, lineļļa terasēm, beice terasēm, krāsa terasēm, koka rotaļļietas, grīda, ārdarbi, interjers, pirtis, pirts lāvas, eļļa pirtīm, lineļļa pirtīm';
			break;
		case 'en':
			$keywords = 'Boiled linseed oil, linseed oil, oil, wood, stain, natural stain, paint, natural paint, eco, eco paint, ecological, natural, natural products, construction, painting, renovation, restoration, wax, wooden surfaces, house, furniture, floor oil, terrace, patio oil, terrace stain, terrace paint, wooden toys, flooring, exterior, interior, bathroom, sauna, wood finishes';
			break;
		case 'ru':
			$keywords = 'Льняное масло, олифа, масло, дерево, морилка, натуральное, покраска, краски, натуральная краска, эко, эко краска, экологическая, натуральные продукты, строительство, ремонт, реставрация, воск, дерева, дом, мебель, пол, терраса, льняная олифа для террасы, деревянные игрушки, полы, наружные работы, внутренние работы, интерьер, интерьер, ремонт, ванная, баня, масло для бани';
			break;
		default:
			$keywords = '';
	}
	?>
<meta name="keywords" content="<?php echo $keywords ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<style>
	.home.front-page .site-branding {
	  min-height: calc(100vh - 150px);
	}
	.home.front-page .site-header {
		background-position: center;
	}
	.page .site-header {
		background: none;
		height: 200px;
		max-height: 200px;
	}
</style>

</head>
<body <?php body_class((is_front_page() ? 'front-page':'')); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Virzīties uz saturu', 'painteco' ); ?></a>

	<?php global $headBackground; ?>
	<header id="masthead" class="site-header" role="banner"<?php if (isset($headBackground) && $headBackground): ?> style="background: url('<?php echo $headBackground; ?>')"<?php endif; ?>>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-4">
					<div class="logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>"><img src="<?php echo get_stylesheet_directory_uri();?>/images/painteco-logo.jpg" alt="<?php bloginfo( 'name' ); ?>"></a>
					</div>
				</div>
				<div class="col-sm-6 col-xs-8">
					<?php get_template_part('template-parts/language_switch'); ?>
				</div>

			</div>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<button type="button" class="btn btn-default menu-toggle pull-right" aria-controls="primary-menu" aria-expanded="false"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></button>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</div>
				</div>
			</div>
		</nav><!-- #site-navigation -->

		<div class="site-branding">
		<?php if ( is_front_page() ) : ?>
			<div class="container">
				<!-- <div class="row">
					<div class="col-sm-5">
						<div class="slogan">
							<div class="what-is">
								<h2><?php esc_html_e('Kas ir Paint Eco?', 'painteco'); ?></h2>
								<p><?php the_field('front_page_intro', 'options'); ?></p>
							</div>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="embed-video"<?php if ('' == get_field('front_page_video', 'options')): ?> style="display: none;"<?php endif ?>>
							<iframe width="560" height="315" src="<?php the_field('front_page_video', 'options'); ?>" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6"></div>
					<div class="col-sm-6">
						<div class="certificates">
							<ul class="list-inline list-unstyled">
								<li class="a"></li>
								<li class="b"></li>
								<li class="c"></li>
							</ul>
						</div>
					</div>
				</div> -->
			</div>
		<?php endif; ?>
		</div><!-- .site-branding -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
