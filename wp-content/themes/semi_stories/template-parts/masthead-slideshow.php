<?
  $currentPostId = $template_args['post'];
  $className = $template_args['className'];

?>

<div class="swiper-slide <?= $className ?>"
  data-anim="scroll"
  data-offset="-300" >

  <!-- Article Image -->
  <? if ($className == 'blog-landing-article') { ?>
    <? if(has_post_thumbnail()) { ?>
      <div class="slide--right">
        <div class="sliding-bg"></div>
        <? $image = the_post_thumbnail('full', ['class' => 'image-with-sliding-bg image-with-sliding-bg--horizontal post-thumb'])?>
      </div>
    <? } ?>
  <? } else { ?>
    <? if ( has_post_thumbnail() ) { ?>
      <a href="<? the_permalink(); ?>" title="<? the_title_attribute(); ?>" class="post-thumb">
        <? the_post_thumbnail(); ?>
      </a>
    <? } ?>
  <? }?>


  <!-- Text Content -->
  <div class="text-content">
    <div class="title-and-meta">
      <? hm_get_template_part( 'template-parts/masthead-category' ); ?>
      <h2 data-anim="slide" data-anim-order="1">
        <a href="<? the_permalink() ?>">
          <? the_title(); ?>
        </a>
      </h2>
    </div>
    <div class="desc" data-anim="slide" data-anim-order="1"><? the_excerpt(); ?></div>
  </div>

</div>
