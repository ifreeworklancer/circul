<?php

get_header();
?>
    <section class="content about">
        <div class="container">
            <div class="content__wrapper about__wrapper">
                <?php
                $args = array(
                    'page_id' => '69'
                );

                $query = new WP_Query( $args );

                // Цикл
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        echo  get_the_content();
                    }
                }
                wp_reset_postdata();
                ?>
                <address class="about__contacts">
                    <a href="mailto:circulstore@gmail.com" class="about__email">
                        E-mail: <?= get_field('email', $post_id) ?>
                    </a>
                    <div class="about__owner">
                        <?= get_field('owner', $post_id) ?>
                    </div>
                </address>
            </div>
            <div class="content__frame content__frame--1 about__frame about__frame--1">
                <picture>
                    <img src="<?= get_the_post_thumbnail(); ?>"
                         alt="Photo of Circul about shoes" class="content__img about__img">
                </picture>
            </div>
        </div>
    </section>

<?php
include('template-parts/follow.php');
get_footer();