<?php
get_header();
?>
    <section class="cabinet">
        <div class="container">
            <?= do_shortcode('[woocommerce_my_account]'); ?>
        </div>
    </section>

<?php
include('template-parts/follow.php');
get_footer();
