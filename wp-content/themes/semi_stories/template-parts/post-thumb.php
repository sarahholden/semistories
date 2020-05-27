<?
  $currentPostId = isset($template_args['post']) ? $template_args['post'] : '';
  $className = isset($template_args['className']) ? $template_args['className'] : '';
  $url = wp_get_attachment_url( get_post_thumbnail_id() );
?>

<article class="post-card <?= $className ?> ">

  <!-- Article Image -->
  <? if ( has_post_thumbnail() ) { ?>
    <div class="thumb-wrapper" data-anim="scroll">
      <a href="<? the_permalink(); ?>" title="<? the_title_attribute(); ?>" class="post-thumb bg-image-wrapper">
        <div class="bg-image" data-anim="slide">
          <div class="scaling-image-wrapper">
            <? $image = get_post_thumbnail_id(); ?>
            <img
              <?php acf_responsive_image($image); ?>
              sizes="auto"
              class="lazyload lazy-fade"
              alt="<?= $image['alt'] ?>"
              />
          </div>
        </div>
        <!-- <div style="background-image: url(<?= $url ?>);" class=" bg-image"></div> -->
      </a>
    </div>
  <? } ?>


  <!-- Text Content -->
  <div class="text-content" data-anim="scroll">
    <div class="title-and-meta">
      <? hm_get_template_part( 'template-parts/category-only' ); ?>
      <h2 data-anim="slide" data-anim-order="2">
        <a href="<? the_permalink() ?>">
          <? if (get_field('article_title', $currentPostId)) { ?>
            <?= the_field('article_title', $currentPostId) ?>
          <? } else { ?>
            <? the_title(); ?>
          <? } ?>
        </a>
      </h2>
    </div>
    <? if (get_field('lead_caption', $currentPostId)) { ?>
      <div class="desc" data-anim="slide" data-anim-order="3"><?= get_field('lead_caption', $currentPostId) ?></div>
    <? } else { ?>
      <div class="desc" data-anim="slide" data-anim-order="3"><? the_excerpt(); ?></div>

    <? } ?>

  </div>

</article>
