<?php
/* Template Name: ThankYou */
get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <h1>
            <?php echo __('Paldies, ka pieteicātiem mūsu jaunumiem!', 'painteco'); ?>
            </h1>
            <div style="margin: 30px 0">
                <a href="/" class="btn-back"><?php esc_html_e('Uz galveno', 'painteco'); ?> </a>
            </div>
        </div>
    </main>
</div>
<?php
get_footer();