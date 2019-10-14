<section class="products">
    <div class="container">
        <h2 class="visually-hidden">
            Our popular products
        </h2>
        <ul class="products__list">
            <?php
            $prod_cat_args = array(
                'taxonomy' => 'product_cat',
                'orderby' => 'slug',
                'hide_empty' => false,
                'exclude' => 15,
            );
            $count = -1;
            $woo_categories = get_categories($prod_cat_args);

            if (!is_null($woo_categories)) :
                foreach ($woo_categories as $woo_cat) :
                    $woo_cat_id = $woo_cat->term_id; //category ID
                    $show_main_page = get_field('show_main_page', 'product_cat_' . $woo_cat_id);

                    if ($show_main_page) :
                        $count++;

                        $woo_cat_name = $woo_cat->name; //category name
                        $woo_cat_description = $woo_cat->description; //category description
                        $category_thumbnail_id = get_woocommerce_term_meta($woo_cat_id, 'thumbnail_id', true);
                        $thumbnail_image_url = wp_get_attachment_url($category_thumbnail_id);
                        ?>
                        <li class="products__item <?php if ($count == 0 || $count == 1) {
                            echo 'products__item--light';
                        } elseif ($count == 2) {
                            echo 'products__item--dark products__item--discover products__item--name';
                        } elseif ($count == 3 || $count == 4 || $count == 5) {
                            echo 'products__item--light products__item--name';
                        } elseif ($count >= 6) {
                            echo 'products__item--dark products__item--name';
                        } ?>">
                            <a href="<?= get_term_link($woo_cat_id, 'product_cat'); ?>"
                               class="products__link" title="<?php _e('[:ru]В магазин[:en]Shop now[:]') ?>">
                                <div class="products__image"
                                     style="background-image: url('<?= $thumbnail_image_url ?>');"></div>
                                <p class="products__name">
                                    <?php if ($woo_cat_description) {
                                        echo $woo_cat_description;
                                    }
                                    ?>
                                    <span class="products__highlight"><?= $woo_cat_name ?></span>
                                </p>
                            </a>
                        </li>
                    <?php endif; endforeach; endif; ?>
        </ul>
    </div>
</section>