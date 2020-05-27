<?
  $currentPostId = $template_args['post'];
  $className = $template_args['className'];
  $url = has_post_thumbnail() ? wp_get_attachment_url( get_post_thumbnail_id() ) : '';
?>


<div class="swiper-slide masthead-slide-wrapper <?= $className ?>"
  data-offset="-300"
  style="background-image: url(<?= $url ?>)">
  <div class="overlay-bg"></div>
  <!-- Text Content -->
  <div class="text-content">
    <div class="title-and-meta">
      <!-- <? hm_get_template_part( 'template-parts/masthead-category' ); ?> -->
      <!-- <h1 data-anim="slide" data-anim-order="1">Semi<em>Stories</em></h1> -->
      <h2 class="h1" data-anim="slide" data-anim-order="2">
        <a href="<? the_permalink() ?>">
          <? the_title(); ?>
        </a>
      </h2>
    </div>
    <div class="desc-sans" data-anim="slide" data-anim-order="3"><? the_excerpt(); ?></div>
    <div class="circle-link-wrapper">
      <a href="<? the_permalink() ?>" class="text-only circle-link" >
        <? hm_get_template_part( 'template-parts/vector-circle-arrow' ); ?>
      </a>
    </div>
  </div>

</div>
