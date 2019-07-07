<div class="row">
    <div class="col-sm-6">
        <div class="product-featured-image">
			<?php if ( has_post_thumbnail() ):
				the_post_thumbnail( 'product-image' );
			endif; ?>
        </div>

        <div class="row product-color-picker">
			<?php
			$tones = get_field( 'product_tones' );
			if ( ! empty( $tones ) ) :
				$palette = painteco_get_palette();
				foreach ( $tones as $toneCode ) :
					?>
                    <div class="col-xs-3">
                        <div class="color"
                             style="background: url('<?php echo $palette[ $toneCode ]['palette_sample']; ?>');">
                            <div class="color-info">
                                <span><?php echo $palette[ $toneCode ]['palette_name']; ?></span>
                            </div>
                        </div>
                    </div>
				<?php endforeach; endif; ?>
        </div>
    </div>
    <div class="col-sm-6">

        <ul class="product-components-list list-unstyled">
			<?php
			$components = [
				'linseed-oil'       => [
					'title' => esc_html__( 'Linsēklu eļļa', 'painteco' ),
					'icon'  => 'painteco-component-1.jpg',
				],
				'heating-tehnology' => [
					'title' => esc_html__( 'Īpaša karsēšanas tehnoloģija', 'painteco' ),
					'icon'  => 'painteco-component-2.jpg',
				],
				'uc'                => [
					'title' => esc_html__( 'Kalifonijs', 'painteco' ),
					'icon'  => 'painteco-component-4.jpg',
				],
				'natural-pigments'  => [
					'title' => esc_html__( 'Dabīgie minerāl- pigmenti', 'painteco' ),
					'icon'  => 'painteco-component-5.jpg',
				],
				'natural-filling'   => [
					'title' => esc_html__( 'Dabīgās pildvielas', 'painteco' ),
					'icon'  => 'painteco-component-6.jpg',
				],
				'vax'               => [
					'title' => esc_html__( 'Vasks', 'painteco' ),
					'icon'  => 'painteco-component-7.jpg',
				],
			];
			$codes      = get_field( 'product_components' );
			if ( is_array( $codes ) ):
				foreach ( $codes as $code ) :
					?>
                    <li><a href="#" title="<?php echo $components[ $code ]['title']; ?>"
                           style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/<?php echo $components[ $code ]['icon']; ?>) no-repeat;">
                        </a><span><?php echo $components[ $code ]['title']; ?></span></li>
				<?php endforeach; endif; ?>
        </ul>

        <div class="text pf-content">
            <p><?php the_field( 'product_short_description' ) ?></p>
        </div>

        <div class="certificates">
            <ul class="list-inline list-unstyled">
                <li class="a"></li>
                <li class="b"></li>
                <li class="c"></li>
            </ul>
        </div>

        <a href="#" class="calc" data-toggle="modal" data-target="#myModal">
			<?php esc_html_e( 'Patēriņa kalkulators', 'painteco' ); ?>
        </a>

    </div>
</div>