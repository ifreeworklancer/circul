<?php
/*
Template Name: Leather
Template Post Type: faq
*/
get_header();
$post_id = 142;
$leather_content = get_field('faq_content', $post_id);
?>

    <section class="content leather">
        <div class="container">
            <div class="content__frame content__frame--1 leather__frame leather__frame--1">
                <picture>
                    <?php $faq_first_image = get_field('faq_first_image', $post_id)?>
                    <img src="<?= $faq_first_image['url']?>"
                         alt="Photo of Circul leather shoes" class="content__img leather__img">
                </picture>
            </div>
            <div class="content__wrapper leather__wrapper">
                <h1 class="content__heading leather__heading">
                    <?= $leather_content['faq_title'] ?>
                </h1>
                <div class="leather-description">
                    <?= $leather_content['faq_description'] ?>
                </div>
            </div>
        </div>
    </section>

<?php
include(__DIR__ . '../../template-parts/follow.php');
get_footer();

