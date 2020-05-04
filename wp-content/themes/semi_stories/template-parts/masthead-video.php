<? if(get_sub_field('hero_video_placholder_image')) { ?>
    <? $image = get_sub_field('hero_video_placholder_image'); ?>
    <img
      <?php acf_responsive_image($image['id']); ?>
      sizes="auto"
      class="lazyload lazy-fade"
      alt="<?= $image['alt'] ?>"
      data-anim="scale"
      />
<? } ?>
<? if(get_field('hero_video_link')) { ?>
  <?= the_field('hero_video_link') ?>
<? } ?>
