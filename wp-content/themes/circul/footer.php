</div>
</main>

<footer class="footer">
    <div class="container">
        <dl class="footer__list">
            <dt class="footer__item footer__item--1">
                <?= __('[:ru]Магазин[:en]Shop[:]'); ?>
            </dt>
            <dd class="footer__content">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'first_footer_menu',
                    'menu_class' => 'footer__submenu',
                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    'depth' => 0,
                    'list_item_class'  => 'footer__subitem',
                    'link_class'   => 'footer__link'
                ));
                ?>
            </dd>
            <dt class="footer__item footer__item--2">
                <?= __('[:ru]Обслуживание клиентов[:en]Customer services[:]'); ?>
            </dt>
            <dd class="footer__content">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'second_footer_menu',
                    'menu_class' => 'footer__submenu',
                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    'depth' => 0,
                    'list_item_class'  => 'footer__subitem',
                    'link_class'   => 'footer__link'
                ));
                ?>
                <?= do_shortcode('[multicurrency]') ?>
            </dd>
            <dt class="footer__item footer__item--3">
                <?= __('[:ru]Социальное[:en]Social[:]'); ?>
            </dt>
            <dd class="footer__content">
                <ul class="footer__submenu">
                    <li class="footer__subitem">
                        <a href="<?= get_theme_mod('instagram');?>" class="footer__link">
                            Instagram
                        </a>
                    </li>
                    <li class="footer__subitem">
                        <a href="<?= get_theme_mod('facebook');?>" class="footer__link">
                            Facebook
                        </a>
                    </li>
                    <li class="footer__subitem">
                        <a href="tg://resolve?<?= get_theme_mod('telegram');?>" class="footer__link">
                            Telegram
                        </a>
                    </li>
                </ul>
            </dd>
        </dl>
        <div class="footer__credits">
            <p class="footer__copyright">
                <?= date('Y') ?> © <?php bloginfo('title') ?>
              <span class="footer__origin">Made in Ukraine</span>
            </p>
            <p class="footer__designer"></p>
        </div>
    </div>
</footer>


<?php wp_footer(); ?>
</body>

</html>