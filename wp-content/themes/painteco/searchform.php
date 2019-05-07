<form role="search" method="get" class="search-form" action="<?php echo home_url();?>">
    <div class="input-group">
        <label>
            <span class="screen-reader-text"><?php echo __( 'Meklēt:', 'painteco' ); ?></span>
            <input type="search" class="search-field" placeholder="<?php esc_html_e( 'Meklēt ...', 'painteco' ); ?>"  name="s" title="<?php esc_html_e( 'Meklēt ...', 'painteco' ); ?>" value="<?php echo get_search_query(); ?>">
        </label>
        <span class="input-group-btn">
            <button type="submit" class="search-submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
        </span>
    </div>
</form>