<?php $slides = get_field('sliders', 14); ?>

<?php if ($slides) : ?>
    <section class="promo">
        <link rel="stylesheet" href="<?= get_theme_file_uri('jQuery/slick/slick.css') ?>">
        <h2 class="visually-hidden">
            Circul shoes promotion
        </h2>
        <ul class="promo__list">
            <?php foreach ($slides as $slide) : ?>
                <li class="promo__item promo__item--1"
                    style="background-image:url('<?= $slide['sliders_image']['url'] ?>');">
                    <p class="promo__slogan">
                        <?= $slide['sliders_title'] ?>
                    </p>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
<?php endif;