<?php if (have_rows('sliders')) : ?>
    <section class="promo">
        <link rel="stylesheet" href="<?= get_theme_file_uri('jQuery/slick/slick.css') ?>">
        <h2 class="visually-hidden">
            Circul shoes promotion
        </h2>
        <ul class="promo__list">
            <?php while (have_rows('sliders')) : the_row(); ?>
                <li class="promo__item promo__item--1"
                    style="background-image:url('<?php the_sub_field('sliders_image')['url'] ?>');">
                    <p class="promo__slogan">
                        <?php the_sub_field('sliders_title') ?>
                    </p>
                </li>
            <?php endwhile; ?>
        </ul>
    </section>
<?php endif;