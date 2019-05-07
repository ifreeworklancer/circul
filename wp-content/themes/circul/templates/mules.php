<?php
/*
Template Name: Mules
Template Post Type: faq
*/
get_header();
$post_id = 140;
$rules_content = get_field('faq_content', $post_id);
?>

    <section class="content mules">
        <div class="container">
            <div class="content__frame content__frame--1 mules__frame mules__frame--1">
                <picture>
                    <?php $faq_second_image = get_field('faq_second_image', $post_id)?>
                    <img src="<?= $faq_second_image['url']?>"
                         alt="Photo of Circul mules shoes" class="content__img mules__img">
                </picture>
            </div>
            <div class="content__wrapper mules__wrapper">
                <h1 class="content__heading mules__heading">
                    <?= $rules_content['faq_title'] ?>
                </h1>
                <div class="mules-description">
                    <?= $rules_content['faq_description'] ?>
                </div>
            </div>
            <div class="content__frame content__frame--2 mules__frame mules__frame--2">
                <picture>
                    <?php $faq_first_image = get_field('faq_first_image', $post_id)?>
                    <img src="<?= $faq_first_image['url']?>"
                         alt="Photo of Circul mules shoes" class="content__img mules__img">
                </picture>
            </div>
        </div>
    </section>

<?php
include(__DIR__ . '../../template-parts/follow.php');
get_footer();

