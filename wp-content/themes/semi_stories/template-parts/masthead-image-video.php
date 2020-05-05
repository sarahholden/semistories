
<!-- ==============================
VIDEO
=================================== -->
<? if(get_field('show_video_in_masthead')) { ?>
  <div class="featured-video-wrapper">
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
  </div>

  <!-- ==============================
  FEATURED IMAGE
  =================================== -->
<? } else if ( has_post_thumbnail() ) { ?>

  <div class="featured-image-wrapper">
    <div class="featured-image">
      <? the_post_thumbnail() ?>
    </div>

    <? $thumbnail_caption = get_post(get_post_thumbnail_id())->post_excerpt; ?>
    <? if (!empty($thumbnail_caption)) { ?>
      <div class="featured-caption desc-sans-sm">
        <?= $thumbnail_caption ?>
      </div>
    <? } ?>
  </div>
<? } ?>
