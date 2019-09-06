<div class="custom-modal custom-modal--choose">
    <div class="custom-modal-body">
        <h2 class="title">
            <?= __('[:ru]Выберите язык и валюту[:en]Choose language and currency[:]') ?>
        </h2>
        <form action="<?= get_theme_file_uri('incl/choose-send.php') ?>" method="POST" id="choose-form">
            <div class="form-row">
                <div class="form-group">
                    <select name="languages" id="languages">
                        <?php $lang = wpm_get_lang_option();
                        foreach ($lang as $item) :
                            ?>
                            <option value="<?= get_site_url() . '/' . substr($item['locale'], 0, 2) ?>">
                                <?= substr($item['locale'], 0, 2) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="currencies" id="currencies">
                        <?php $currencies = premmerce_multicurrency()->getCurrencies();
                        foreach ($currencies as $val) :
                            ?>
                            <option value="<?= $val['id'] ?>"><?= $val['code']; ?></option>
                        <? endforeach; ?>
                    </select>
                </div>
                <button class="btn btn-primary">
                    <?= __('[:ru]в магазин[:en]go shopping[:]') ?>
                </button>
            </div>
        </form>
    </div>
</div>

<div class="modal-mask"></div>