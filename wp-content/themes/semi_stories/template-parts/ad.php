<? if(get_field('ad_image')) { ?>
  <a href="<?= get_field('ad_link') ?>">
    <? $image = get_field('ad_image'); ?>
    <img
      <?php acf_responsive_image($image['id']); ?>
      sizes="auto"
      class="lazyload lazy-fade hide-mobile"
      alt="<?= $image['alt'] ?>"
      data-anim="scale"
      />
      <? $image = get_field('ad_mobile_image'); ?>
      <img
        <?php acf_responsive_image($image['id']); ?>
        sizes="auto"
        class="lazyload lazy-fade show-mobile"
        alt="<?= $image['alt'] ?>"
        data-anim="scale"
        />
  </a>
<? } ?>
