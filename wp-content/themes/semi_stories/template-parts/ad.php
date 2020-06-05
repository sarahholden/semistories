

<div class="full-width-ad">
  <? if (have_rows('ads', 'option')) { ?>
    <?
      $whileLoopIndex = 0;
      $currentAdIndex = $previousAdIndex = isset($_COOKIE["adIndex"]) ? $_COOKIE["adIndex"] : 0;
      $currentAdIndex = (int)$currentAdIndex;

    ?>

    <? while( have_rows('ads', 'option') ): the_row(); ?>
      <? if ($whileLoopIndex == $currentAdIndex) { ?>
        <? $image = get_sub_field('ad_image_monitor'); ?>
        <a class="ga-ad" href="<?= get_sub_field('ad_link')['url']; ?>" target="_blank" aria-label="<?= $image['alt'] ?> - opens in new window">
          <? if(get_sub_field('ad_image_monitor')) { ?>
            <img
            <?php acf_responsive_image($image['id']); ?>
            sizes="auto"
            class="lazyload lazy-fade show-monitor"
            alt="<?= $image['alt'] ?>"
            data-anim="scale"
            />
          <? } ?>
          <? if(get_sub_field('ad_image_desktop')) { ?>
            <? $image = get_sub_field('ad_image_desktop'); ?>
            <img
            <?php acf_responsive_image($image['id']); ?>
            sizes="auto"
            class="lazyload lazy-fade hide-mobile hide-monitor"
            alt="<?= $image['alt'] ?>"
            data-anim="scale"
            />
          <? } ?>
          <? if(get_sub_field('ad_image_mobile')) { ?>
            <? $image = get_sub_field('ad_image_mobile'); ?>
            <img
            <?php acf_responsive_image($image['id']); ?>
            sizes="auto"
            class="lazyload lazy-fade show-mobile"
            alt="<?= $image['alt'] ?>"
            data-anim="scale"
            />
          <? } ?>
        </a>
      <? } ?>
      <? $whileLoopIndex++; ?>
    <? endwhile; ?>
  <? } ?>

</div>
