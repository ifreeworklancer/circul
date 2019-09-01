<?php get_header(); ?>
  <section class="stores">
    <div class="container">
      <h1 class="stores__heading">
        Stores
      </h1>
      <a href="#" class="stores__back">
        <svg class="stores__icon-back" width="6" height="12" viewbox="0 0 8 14">
          <use xlink:href="#back"></use>
        </svg>
        Back
      </a>
      <ul class="stores__list">
          <?php
          $stores_address_phone = get_field('stores_address_phone', 43);
          $count = 0;
          if (!is_null($stores_address_phone)) :
              foreach ($stores_address_phone as $stores_address_phone_item) :
                  $count++;
                  foreach ($stores_address_phone_item as $item) :
                      ?>
                    <li class="stores__item <?php if ($count == 1) {
                        echo 'stores__item--ukr stores__item--active';
                    } elseif ($count == 2) {
                        echo 'stores__item--rus';
                    } ?> ">
                      <dl class="stores__contacts">
                        <dt class="stores__location stores__location--city">
                                            <span class="stores__country">
                                                <?= $item['country']; ?>
                                                <svg class="stores__icon" width="19" height="29" viewbox="0 0 19 29">
                                                  <use xlink:href="#pin"></use>
                                                </svg>
                                              </span>
                          <span class="stores__city">
                                                <?= $item['city']; ?>
                                            </span>
                        </dt>
                        <dd class="stores__address">
                          <p class="stores__contact">
                              <?= $item['address']; ?>
                          </p>
                          <p class="stores__contact">
                              <?= $item['phone']; ?>
                          </p>
                        </dd>
                      </dl>
                    </li>
                  <?php endforeach; endforeach; endif; ?>
          <?php
          $item = get_field('stores_name_address', 43);
          if (!is_null($item)) :
              ?>
            <li class="stores__item stores__item--crimea">
              <dl class="stores__contacts">
                <dt class="stores__location stores__location--city">
                                      <span class="stores__country">
                                         <?= $item['country']; ?>
                                        <svg class="stores__icon" width="19" height="29" viewbox="0 0 19 29">
                                          <use xlink:href="#pin"></use>
                                        </svg>
                                      </span>
                  <span class="stores__city">
                                        <?= $item['city']; ?>
                                      </span>
                </dt>
                <dd class="stores__address">
                  <p class="stores__contact">
                      <?= $item['name']; ?>
                  </p>
                  <p class="stores__contact">
                      <?= $item['address']; ?>
                  </p>
                </dd>
              </dl>
            </li>
          <?php endif; ?>
          <?php
          $item = get_field('stores_email_site', 43);
          if (!is_null($item)) :
              ?>
            <li class="stores__item stores__item--eng">
              <dl class="stores__contacts">
                <dt class="stores__location">
                                      <span class="stores__country">
                                          <?= $item['country']; ?>
                                        <svg class="stores__icon" width="19" height="29" viewbox="0 0 19 29">
                                          <use xlink:href="#pin"></use>
                                        </svg>
                                      </span>
                </dt>
                <dd class="stores__address">
                  <a class="stores__contact" href="mailto:<?= $item['email']; ?>">
                      <?= $item['email']; ?>
                  </a>
                  <a class="stores__contact" href="https://<?= $item['site_link']; ?>">
                      <?= $item['site_link']; ?>
                  </a>
                </dd>
              </dl>
            </li>
          <?php endif; ?>
      </ul>

        <?php
        $stores_address_phone = get_field('stores_address_phone', 43);
        $count = 0;
        if (!is_null($stores_address_phone)) :
            foreach ($stores_address_phone as $stores_address_phone_item) :
                $count++;
                foreach ($stores_address_phone_item as $item) :
                    ?>
                  <div class="stores__frame stores__frame--map <?php if ($count == 1) {
                      echo 'stores__frame--ukr stores__frame--active';
                  } elseif ($count == 2) {
                      echo 'stores__frame--rus';
                  } ?>" style="margin-bottom: 10px;">
                    <iframe class="stores__map"
                            src="<?= $item['iframe_link']; ?>"
                            allowfullscreen></iframe>
                  </div>
                <?php endforeach; endforeach; endif; ?>

        <?php
        $item = get_field('stores_name_address', 43);
        if (!is_null($item)) :
            ?>
          <div class="stores__frame stores__frame--map stores__frame--crimea">
            <iframe class="stores__map"
                    src="<?= $item['iframe_link']; ?>"
                    allowfullscreen></iframe>
          </div>
        <?php endif; ?>
    </div>
  </section>


<?php get_footer();