<?php

get_header('secondary'); ?>

    <?= do_shortcode('[woocommerce_checkout]') ?>
        
    <?php get_template_part('template-parts/follow'); ?>

<?php
get_footer();