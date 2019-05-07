<ul class="contact-information list-unstyled">
    <li class="address">
        <span class="company-name"><?php the_field('company_title', 'options'); ?></span><br>
        <?php the_field('contact_address', 'options'); ?>
    </li>
    <li class="phone">
        <h4><?php esc_html_e( 'Tālrunis', 'painteco' ); ?></h4>
        <p class="phone"><a href="tel:<?php the_field('contact_phone', 'options'); ?>"><?php the_field('contact_phone', 'options'); ?></a></p>

    </li>
    <li class="email">
        <h4><?php esc_html_e( 'E-pasts', 'painteco' ); ?></h4>
        <p class="email"><a href="mailto:<?php the_field('contact_email', 'options'); ?>"><?php the_field('contact_email', 'options'); ?></a></p>
    </li>
</ul>