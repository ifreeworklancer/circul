<?php
/*
Template Name: Terms
Template Post Type: faq
*/
get_header();
$post_id = 132;
?>
    <section class="terms">
        <div class="container">
            <h1 class="visually-hidden">
                Information about payment and delivery terms of Circul shop
            </h1>
            <div class="terms__frame terms__frame--large">
                <picture>
                    <?php $faq_first_image = get_field('faq_first_image', $post_id)?>
                    <img src="<?= $faq_first_image['url']?>"
                         alt="Image of Circul shoes"
                         class="terms__img terms__img--large">
                </picture>
            </div>
            <?php
            $faq_terms_content = get_field('faq_terms_content', $post_id);
            $count = 0;
            if (!is_null($faq_terms_content)) :
                foreach ($faq_terms_content as $faq_terms_content_item) : $count++;
                    foreach ($faq_terms_content_item as $item) :
                        ?>
                        <div class="terms__item  <?php if ($count == 1) {
                            echo 'terms__item--payment';
                        } elseif ($count == 2) {
                            echo 'terms__item--delivery';
                        } elseif ($count == 3) {
                            echo 'terms__item--return';
                        } ?>">
                            <h2 class="terms__heading">
                                <?= $item['faq_terms_title']; ?>
                            </h2>
                            <div class="faq-content">
                                <?= $item['faq_terms_description']; ?>
                            </div>
                        </div>
                    <?php endforeach; endforeach; endif; ?>
            <div class="terms__frame terms__frame--small">
                <picture>
                    <?php $faq_second_image = get_field('faq_second_image', $post_id)?>
                    <img src="<?= $faq_second_image['url']?>"
                         alt="Image of Circul shoes" class="terms__img terms__img--small">
                </picture>
            </div>
        </div>
    </section>
<?php
get_footer();
