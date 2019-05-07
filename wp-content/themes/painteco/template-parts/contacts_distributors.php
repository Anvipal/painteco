<div class="distributors" id="distributors">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php
                $distributors = get_field('contacts_distributors', 'options');
                $sorted = [];
                foreach ($distributors as $distributor) {
                    $country = $distributor['contacts_distributors_country'];
                    $sorted[$country][] = $distributor;
                }
                ?>

                <h2 class="page-section-title text-uppercase text-center"><?php esc_html_e('Ārvalstu pārstāvji', 'painteco')?></h2>
                <div class="team-members-list">

                    <?php foreach ($sorted as $country => $distributors) : ?>

                        <?php foreach($distributors as $distributor) :?>
                            <div class="col-sm-4 team-members-list-item">
                                <div class="row">
                                    <h4 class="col-sm-12">
                                        <?php echo $country; ?>
                                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/flags/24/<?php echo $distributor['contacts_distributors_flag']; ?>.png" alt="<?php echo $country; ?>">
                                    </h4>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <a href="http://<?php echo $distributor['contacts_distributors_url']; ?>"
                                                    target="_blank"
                                                    title="<?php echo $distributor['contacts_distributors_name']; ?>">
                                            <img src="<?php echo $distributor['contacts_distributors_image']; ?>" alt="<?php echo $distributor['contacts_distributors_name']; ?>">
                                        </a>
                                    </div>
                                    <div class="col-sm-7">
                                        <p class="name"><?php echo $distributor['contacts_distributors_name']; ?></p>
                                        <div class="moto-memo">
                                            <?php echo $distributor['contacts_distributors_memo']; ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
</div>