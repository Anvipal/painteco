<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package painteco
 */

?>

	</div><!-- #content -->

    <?php get_template_part('template-parts/footer_subscribe'); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">

            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <?php get_template_part('template-parts/footer_contacts'); ?>
                    </div>
                    <div class="col-md-5 col-sm-8">
                        <?php get_template_part('template-parts/footer_menu'); ?>
                    </div>
                    <div class="col-md-3 col-sm-12 hidden-xs hidden-sm">
                        <?php echo get_search_form(); ?>
                    </div>
                    <div class="col-md-4 col-xs-12 social">
                        <?php get_template_part('template-parts/social_links'); ?>
                    </div>
                </div>
            </div>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php get_template_part('template-parts/catalogues_modal'); ?>

<?php wp_footer(); ?>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-40161395-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>
