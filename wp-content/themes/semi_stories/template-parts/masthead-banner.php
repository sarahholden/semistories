<? if(get_field('hero_image_banner_with_cutout')) { ?>
  <div class="banner-image">
    <? $image = get_field('hero_image_banner_with_cutout'); ?>
    <img
    <?php acf_responsive_image($image['id']); ?>
    sizes="auto"
    class="lazyload lazy-fade"
    alt="<?= $image['alt'] ?>"
    data-anim="scale"
    />
    <!-- IMAGE MASK -->
    <svg class="image-mask"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 101.647">
      <path id="Path_39" data-name="Path 39" d="M6383.315,1535.037,5780.088,1433.39l-836.773,101.647h1440Z" transform="translate(-4943.315 -1433.39)" fill="#fff"/>
    </svg>
  </div>
<? } ?>
