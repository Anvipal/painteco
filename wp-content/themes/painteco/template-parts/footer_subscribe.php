<section class="footer-subscribe">
    <div class="container">
        <form action="" method="post" class="form-horizontal">
            <input type="hidden" name="form_name" value="Jaunumu forma"/>
            <input type="hidden" name="return_url" value="<?php esc_html(get_permalink()) ?>"/>
            <div class="form-group">
                <label for="" class="col-sm-5"><?php echo __("Pierakstaties mūsu jaunumiem", 'painteco'); ?>:</label>
                <div class="col-sm-4">
                    <input type="email" name="subscribe_email" class="form-control" placeholder="my.email@gmail.com" />
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-success btn-block"><?php echo __('Abonēt', 'painteco'); ?></button>
                </div>
            </div>
        </form>
    </div>
</section>