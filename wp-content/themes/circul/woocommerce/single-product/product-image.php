<?php


global $product;

$attachment_ids = $product->get_gallery_image_ids();

?>
<div class="card__slider">
    <ul class="card__list">
        <?php
        $count = 0;
        if ($attachment_ids && $product->get_image_id()) {

            foreach ($attachment_ids as $attachment_id) {
                $count++;
                ?>

                <li class="card__item cards__item--<?= $count ?>">
                    <picture>
                        <img src="<?php echo wp_get_attachment_image_url($attachment_id, 'large'); ?>"
                             alt="Product photo"
                             class="card__img">
                    </picture>
                </li>

                <?php
            }
        } ?>

    </ul>
</div>
