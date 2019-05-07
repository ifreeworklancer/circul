<?php $sliders = get_field('sliders', 14); ?>
<section class="promo">
    <link rel="stylesheet" href="<?= get_theme_file_uri('jQuery/slick/slick.css')?>">
    <h2 class="visually-hidden">
        Circul shoes promotion
    </h2>
    <ul class="promo__list">
        <?php foreach ($sliders as $slider) : ?>
            <li class="promo__item promo__item--1" style="background-image:url('<?= $slider['sliders_image']['url']?>');">
                <p class="promo__slogan">
                   <?= $slider['sliders_title']?>
                </p>
            </li>
        <?php endforeach; ?>
    </ul>
</section>