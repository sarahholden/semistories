<?php get_header(); ?>
<main id="content">
  <article id="post-0" class="post not-found container padded">
    <div class="inner">
      <? if(get_field('404_heading', 'option')) { ?>
        <h2><?= the_field('404_heading', 'option') ?></h2>
      <? } ?>
      <? if(get_field('404_image', 'option')) { ?>
        <? $image = get_field('404_image', 'option'); ?>
        <img
          <?php acf_responsive_image($image['id']); ?>
          sizes="auto"
          class="lazyload lazy-fade"
          alt="<?= $image['alt'] ?>"
          data-anim="scale"
          />
      <? } ?>
    </div>
  </article>
</main>
<?php get_footer(); ?>
