<?php

get_header('secondary'); ?>



	<?php
	while ( have_posts() ) :
        the_post(); ?>
        
        <section class="checkout-section ">
            <div class="container-fluid">
                <?= do_shortcode('[woocommerce_checkout]') ?>
            </div>
        </section>

    <?php
	endwhile; // End of the loop.
	?>

<?php
get_footer();