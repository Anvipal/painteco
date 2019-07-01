<section class="footer-subscribe">
    <div class="container">
        <form action="<?php echo esc_url(admin_url('admin-post.php')) ?>" method="post" class="form-horizontal">
            <input type="hidden" name="action" value="contact_form">
            <input type="hidden" name="form_name" value="Jaunumu forma">
            <div class="form-group">
                <label for="" class="col-sm-5"><?php echo __('Pierakstaties mūsu jaunumiem:', 'painteco'); ?></label>
                <div class="col-sm-4">
                    <input type="email" name="subscribe_email" class="form-control" placeholder="my.email@gmail.com" />
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-success btn-block"><?php echo __('Send', 'painteco'); ?></button>
                </div>
            </div>
        </form>
    </div>
</section>