
<div class="modal fade" tabindex="-1" role="dialog" id="cataloguesModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <?php $cataloguePage = get_post(icl_object_id(557, 'page')); ?>
                    <?php echo get_the_title($cataloguePage); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php //echo apply_filters('the_content', $cataloguePage->post_content); ?>
                <?php echo $cataloguePage->post_content; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo esc_html__('Aizvērt', 'painteco'); ?></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->