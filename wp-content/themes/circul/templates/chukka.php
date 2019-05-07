<?php
/*
Template Name: Chukka
Template Post Type: faq
*/
get_header();
$post_id = 136;
$chukka_content = get_field('faq_content', $post_id);
?>
    <section class="content chukka">
        <div class="container">
            <div class="content__frame content__frame--1 chukka__frame chukka__frame--1">
                <picture>
                    <?php $faq_first_image = get_field('faq_first_image', $post_id) ?>
                    <img src="<?= $faq_first_image['url'] ?>"
                         alt="Photo of Circul chukka shoes" class="content__img chukka__img">
                </picture>
            </div>
            <div class="content__wrapper chukka__wrapper">
                <h1 class="content__heading chukka__heading">
                    <?= $chukka_content['faq_title'] ?>
                </h1>
                <div class="chukka-description">
                    <?= $chukka_content['faq_description'] ?>
                </div>
            </div>
            <div class="content__frame content__frame--2 chukka__frame chukka__frame--2">
                <picture>
                    <?php $faq_second_image = get_field('faq_second_image', $post_id) ?>
                    <img src="<?= $faq_second_image['url'] ?>"
                         alt="Photo of Circul chukka shoes" class="content__img chukka__img">
                </picture>
            </div>
        </div>
    </section>

<?php
get_footer();
