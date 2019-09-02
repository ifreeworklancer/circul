<?php $page_id = 114; ?>
<!-- .smm--sent - класс для сокрытия компонентов запроса почты пользователя и вывода сообщения об успешной отправке. Вешается на section.smm -->
<section class="smm smm--all">
  <div class="container">
    <h2 class="visually-hidden">
        <?= __('[:ru]Следите за нашими новостями и обновлениями[:en]Follow our news and updates[:]'); ?>
    </h2>
    <div class="smm__instagram">
      <p class="smm__invitation smm__invitation--instagram">
          <?= get_the_title($page_id); ?>
      </p>
      <a href="<?= get_field('follow_link', $page_id); ?>" class="smm__link">
          <?= get_field('follow_link_text', $page_id); ?>
      </a>
      <ul class="smm__list">
          <?php $gallery = get_field('follow_gallery', $page_id);
          if (!is_null($gallery)) :
              foreach ($gallery as $item) :
                  ?>
                <li class="smm__item">
                  <picture>
                    <img src="<?= $item['url'] ?>"
                         alt="Instagram photo example" class="smm__img">
                  </picture>
                </li>
              <?php endforeach; endif; ?>
      </ul>
    </div>
    <div class="smm__newsletter">
      <div class="container">
        <p class="smm__invitation">
            <?= __('[:ru]Подписаться на новостную рассылку[:en]Subscribe to newsletter[:]'); ?>
        </p>
        <div class="smm__form">
            <?php echo do_shortcode('[newsletter_form type="minimal"]'); ?>
        </div>
        <!--                <form class="smm__form" action="#">-->
        <!--                    <input type="text" class="smm__email" placeholder="Enter e-mail adress">-->
        <!--                    <button class="smm__btn visually-hidden" type="submit">-->
        <!--                        --><? //= __('[:ru]Отправить письмо[:en]Send email[:]'); ?>
        <!--                    </button>-->
        <!--                </form>-->
        <p class="smm__success">
            <?= __('[:ru]Спасибо! Вы начнете получать ваши письма в ближайшее время[:en]Thank you! You will start to receive your e-mails shortly[:]'); ?>
        </p>
      </div>
    </div>
  </div>
</section>