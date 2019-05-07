<?php
/*
Template Name: Rules
Template Post Type: faq
*/
get_header();
$post_id = 138;
$rules_content = get_field('faq_content', $post_id);
?>

    <section class="content rules">
        <div class="container">
            <div class="content__frame content__frame--1 rules__frame rules__frame--1">
                <picture>
                    <?php $rules_first_image = get_field('faq_first_image', $post_id) ?>
                    <img src="<?= $rules_first_image['url'] ?>"
                         alt="Photo of Circul shoes" class="content__img rules__img">
                </picture>
            </div>
            <div class="content__wrapper rules__wrapper">
                <h1 class="content__heading rules__heading">
                    <?= $rules_content['faq_title'] ?>
                </h1>
                <div class="rules-description">
                    <?= $rules_content['faq_description'] ?>
                </div>
            </div>
            <div class="content__frame content__frame--2 rules__frame rules__frame--2 rules__frame--high">
                <picture>
                    <?php $rules_second_image = get_field('faq_second_image', $post_id) ?>
                    <img src="<?= $rules_second_image['url'] ?>"
                         alt="Photo of Circul shoes" class="content__img rules__img">
                </picture>
            </div>
        </div>
    </section>

<?php
get_footer();

