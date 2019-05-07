<?php

get_header();

?>
    <h1 class="visually-hidden">
        Circul FAQ topics
    </h1>
    <section class="faq">
        <div class="container">
            <h2 class="visually-hidden">
                FAQ topics
            </h2>
            <ul class="faq__list">
                <?php
                $faq = new WP_Query(array(
                    'post_type' => 'faq',
                    'orderby' => 'data',
                    'order' => 'asc'
                ));
                $count = 0;
                if ($faq->have_posts()):
                    while ($faq->have_posts()): $faq->the_post();
                        $count++; ?>
                        <li class="faq__item faq__item--<?= $count ?> <?php if ($count == 1) {
                            echo 'faq__item--dark';
                        } else {
                            echo 'faq__item--light';
                        } ?> ">
                            <div class="faq-item__img"
                                 style="background-image:url(<?= the_post_thumbnail_url(); ?>);"></div>
                            <a href="<?= the_permalink(); ?>" class="faq__link">
                                <h2 class="faq__topic">
                                    <?= the_title() ?>
                                </h2>
                            </a>
                        </li>
                    <?php endwhile; endif;
                wp_reset_postdata(); ?>
            </ul>
        </div>
    </section>


<?php
include('template-parts/follow.php');
get_footer();