<?php
/*
Template Name: Suede
Template Post Type: faq
*/
get_header();
$post_id = 134;
$suede_content = get_field('faq_content', $post_id);
?>

    <section class="content suede">
        <div class="container">
            <div class="content__frame content__frame--1 suede__frame suede__frame--1">
                <picture>
                    <?php $faq_second_image = get_field('faq_second_image', $post_id) ?>
                    <img src="<?= $faq_second_image['url'] ?>"
                         alt="Photo of Circul suede shoes" class="content__img suede__img">
                </picture>
            </div>
            <div class="content__wrapper suede__wrapper">
                <h1 class="content__heading suede__heading">
                    <?= $suede_content['faq_title']; ?>
                </h1>
                <div class="suede-description">
                    <?= $suede_content['faq_description']; ?>
                </div>
            </div>
            <div class="content__frame content__frame--2 suede__frame suede__frame--2">
                <picture>
                    <?php $faq_first_image = get_field('faq_first_image', $post_id) ?>
                    <img src="<?= $faq_first_image['url'] ?>"
                         alt="Photo of Circul suede shoes" class="content__img suede__img">
                </picture>
            </div>
        </div>
    </section>

<?php
include(__DIR__ . '../../template-parts/follow.php');
get_footer();