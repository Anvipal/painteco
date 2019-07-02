<p><?php esc_html_e('Mēs sociālajos tīklos', 'painteco'); ?></p>
<ul class="list-unstyled list-inline social-networks">
    <?php
        $socials = ['youtube', 'facebook'/*, 'twitter', 'linkedin'*/];
        foreach ($socials as $socialName):
            if (get_field('social_' . $socialName, 'options')):
    ?>
        <li class="<?php echo $socialName ?>"><a href="<?php the_field('social_' . $socialName, 'options'); ?>" target="_blank"></a></li>
    <?php endif; endforeach; ?>
        <li class="search-item"><?php echo get_search_form(); ?></li>
</ul>