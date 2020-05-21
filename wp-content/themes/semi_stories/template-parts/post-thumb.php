<?
  $currentPostId = isset($template_args['post']) ? $template_args['post'] : '';
  $className = isset($template_args['className']) ? $template_args['className'] : '';
  $url = wp_get_attachment_url( get_post_thumbnail_id() );
?>

<article class="post-card <?= $className ?> "
  data-anim="scroll"
  data-offset="-300" >

  <!-- Article Image -->
  <? if ( has_post_thumbnail() ) { ?>
    <div class="thumb-wrapper">
      <a href="<? the_permalink(); ?>" title="<? the_title_attribute(); ?>" class="post-thumb bg-image-wrapper">
        <div class="bg-image">
          <? $image = get_post_thumbnail_id(); ?>
          <img
            <?php acf_responsive_image($image); ?>
            sizes="auto"
            class="lazyload lazy-fade"
            alt="<?= $image['alt'] ?>"
            data-anim="scale"
            />
        </div>
        <!-- <div style="background-image: url(<?= $url ?>);" class=" bg-image"></div> -->
      </a>
    </div>
  <? } ?>


  <!-- Text Content -->
  <div class="text-content">
    <div class="title-and-meta">
      <? hm_get_template_part( 'template-parts/masthead-category' ); ?>
      <h2 data-anim="slide" data-anim-order="1">
        <a href="<? the_permalink() ?>">
          <? if (get_field('article_title', $currentPostId)) { ?>
            <?= the_field('article_title', $currentPostId) ?>
          <? } else { ?>
            <? the_title(); ?>
          <? } ?>
        </a>
      </h2>
    </div>
    <div class="desc" data-anim="slide" data-anim-order="1"><? the_excerpt(); ?></div>
  </div>

</article>
