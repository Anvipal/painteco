<div class="container contacts" id="contacts">
    <div class="row">
        <div class="col-sm-4">
            <div class="contacts-info address">
                <?php the_field('contacts_overall', 'options'); ?>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="contacts-info working-hours">
                <?php the_field('contacts_worktimes', 'options'); ?>
            </div>

        </div>

        <div class="col-sm-4">
            <div class="contacts-info bank">
                <?php the_field('contacts_properties', 'options'); ?>
            </div>
        </div>
    </div>
</div>