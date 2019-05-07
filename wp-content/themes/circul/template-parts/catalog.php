<?php $images = get_field('catalog_gallery', 14);
if (!is_null($images)): ?>
    <section class="gender">
        <h2 class="visually-hidden">
            Gender selection
        </h2>
        <ul class="gender__list slide-up">
            <?php
            foreach ($images as $image) :
                ?>
                <li class="gender__item">
                    <picture>
                        <img class="gender__img" src="<?= $image['url'] ?>"
                             alt="Foto of men's shoes">
                    </picture>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php
        $prod_cat_args = array(
            'taxonomy' => 'product_cat',
            'include' => [16, 17],
            'hide_empty' => false, // скрывать категории без товаров или нет
        );
        $woo_categories = get_categories($prod_cat_args);
        if (!is_null($woo_categories)) :
            foreach ($woo_categories as $woo_cat) :
                $woo_cat_id = $woo_cat->term_id;
                $woo_cat_name = $woo_cat->name;
                $woo_cat_slug = $woo_cat->slug;
                ?>
                <a href="<?= get_term_link($woo_cat_id, 'product_cat'); ?>"
                   class="gender__link slide-up">
                    <?= $woo_cat_name; ?>
                </a>
            <?php endforeach; endif; ?>
    </section>
<?php endif; ?>