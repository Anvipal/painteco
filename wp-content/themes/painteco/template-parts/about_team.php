<div class="team" id="team">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <h2 class="page-section-title text-uppercase text-center"><?php esc_html_e('Paint Eco - Linum Color komanda', 'painteco')?></h2>
                <div class="team-members-list">
                    <?php if(have_rows('team_members', 'options')): ?>
                        <?php while( have_rows('team_members', 'options') ): the_row(); ?>
                        <div class="col-sm-4 team-members-list-item">

                            <div class="row">
                                <div class="col-sm-5">
                                    <a>
                                        <img src="<?php echo get_sub_field('team_member_image'); ?>" alt="<?php echo get_sub_field('team_member_name'); ?>">
                                    </a>
                                </div>
                                <div class="col-sm-7">
                                    <p class="name"><?php echo get_sub_field('team_member_name'); ?></p>
                                    <p class="position"><?php echo get_sub_field('team_member_role'); ?></p>
                                    <p class="moto-memo"><?php echo get_sub_field('team_member_description'); ?></p>

                                </div>
                            </div>

                        </div>
                    <?php endwhile; endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>