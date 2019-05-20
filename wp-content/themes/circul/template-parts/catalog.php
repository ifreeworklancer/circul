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
        <a href="<?= get_category_link(16)?>"
           class="gender__link slide-up">
            <?= __('[:ru]Мужская[:en]Men[:]'); ?>
        </a>
        <a href="<?= get_category_link(17)?>"
           class="gender__link slide-up">
            <?= __('[:ru]Женская[:en]Women[:]'); ?>
        </a>
    </section>
<?php endif; ?>