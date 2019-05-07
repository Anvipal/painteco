<?php
/**
 * Created by PhpStorm.
 * User: uldis
 * Date: 26/03/16
 * Time: 17:18
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">


            <?php
            global $post; $modelId = $post->ID;
            $colorModelQuery = new WP_Query(['post_type' => 'painteco_color_model']);
            ?>

            <?php if ($colorModelQuery->have_posts()) : ?>
                <nav class="page-navigation">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="submenu list-unstyled list-inline narrow">
                                    <?php while ($colorModelQuery->have_posts()) : $colorModelQuery->the_post(); ?>
                                        <li<?php if ($modelId == $post->ID) : ?> class="active"<?php endif; ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                    <?php endwhile; ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>

            <div class="container single-post">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="content-box hidden-sm hidden-xs">
                            <h1><?php the_title(); ?></h1>

                            <?php
                                $baseImgUrl = get_field('color_model_base');
                                if ($baseImgUrl) :
                            ?>
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <div id="modelContainer">
                                            <div id="layerBase"><img src="<?php  echo $baseImgUrl; ?>" alt="Base image"></div>
                                            <div id="layerRoof"></div>
                                            <div id="layerFacade"></div>
                                            <div id="layerDoors"></div>
                                            <div id="layerWindows"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row pattern-switch">
                                    <?php
                                    $layers = [
                                        'color_model_layer_roof' => [
                                            'title' => esc_html__('Jumts', 'painteco'),
                                            'target' => 'layerRoof',
                                        ],
                                        'color_model_layer_windows' => [
                                            'title' => esc_html__('Logi', 'painteco'),
                                            'target' => 'layerWindows',
                                        ],
                                        'color_model_layer_doors' => [
                                            'title' => esc_html__('Durvis', 'painteco'),
                                            'target' => 'layerDoors',
                                        ],
                                        'color_model_layer_facade' => [
                                            'title' => esc_html__('Fasāde', 'painteco'),
                                            'target' => 'layerFacade',
                                        ]
                                    ];

                                    foreach ($layers as $layerName => $layer) :
                                        $items = get_field($layerName);
                                        if ( ! empty($items)) :
                                    ?>
                                        <div class="col-xs-3 text-center">
                                            <h4><?php echo $layer['title']; ?></h4>

                                            <ul class="pattern">
                                                <li><a class="color-sample" href="#" data-layer="" data-target="<?php echo $layer['target']; ?>"><i class="fa fa-eye-slash fa-2x"></i></li>
                                                <?php foreach ($items as $item) : ?>
                                                    <li><a class="color-sample" href="#" data-layer="<?php echo $item['color_model_layer'] ?>" data-target="<?php echo $layer['target']; ?>"><img src="<?php echo $item['color_model_sample'] ?>" /></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="visible-sm-block visible-xs-block">
                            <p class="text-center">
                                <strong><?php esc_html_e('Diemžēl, šī sadaļa pieejama tikai uz lielāka ekrāna.', 'painteco'); ?></strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                (function($) {
                    var ColorModeler = {
                        init: function()
                        {
                            this.handleSwitch();
                        },

                        handleSwitch: function()
                        {
                            $('.color-sample').click(function(e) {
                                $('#' + $(this).attr('data-target')).css('background-image', 'url(' + $(this).attr('data-layer') + ')');
                                return false;
                            });
                        }
                    }

                    ColorModeler.init();
                })(jQuery)
            </script>

        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();
