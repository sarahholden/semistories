<? $mastheadIcon = isset($template_args['mastheadIcon']) ? $template_args['mastheadIcon'] : ''; ?>
<!-- ==============================
VIDEO
=================================== -->
<? if(get_field('show_video_in_masthead')) { ?>
  <div class="featured-video-wrapper">
    <? if(get_sub_field('hero_video_placholder_image')) { ?>
        <? $image =  get_sub_field('hero_video_placholder_image'); ?>
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
      <? if ($mastheadIcon) { ?>
        <div class="featured-icon">
          <? $image = $mastheadIcon; ?>
          <img
          <?php acf_responsive_image($image['id']); ?>
          sizes="auto"
          class="lazyload lazy-fade"
          alt="<?= $image['alt'] ?>"
          data-anim="scale"
          />
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" class="corner-icon" viewBox="0 0 168.83 154.016">
          <path id="Path_66" data-name="Path 66" d="M8930.782,1577.017l33.89,154.016h134.94V1577.017Z" transform="translate(-8930.782 -1577.017)" fill="#fff"/>
        </svg>

      <? } ?>
      <? if (get_field('full_hero_image')) { ?>
        <? $image = get_field('full_hero_image'); ?>
        <img
          <?php acf_responsive_image($image['id']); ?>
          sizes="auto"
          class="lazyload lazy-fade"
          alt="<?= $image['alt'] ?>"
          data-anim="scale"
          />
      <? } else { ?>
        <? the_post_thumbnail() ?>
      <? }?>
    </div>

    <? $thumbnail_caption = get_post(get_post_thumbnail_id())->post_excerpt; ?>
    <? if (!empty($thumbnail_caption)) { ?>
      <div class="featured-caption desc-sans-sm">
        <?= $thumbnail_caption ?>
      </div>
    <? } ?>
  </div>
<? } ?>
