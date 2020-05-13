<h1 class="main-heading">
  <a href="<? the_permalink(); ?>" title="<? the_title_attribute(); ?>" rel="bookmark">
    <? if(get_field('article_title')) { ?>
      <?= the_field('article_title') ?>
    <? } else { ?>
      <? the_title(); ?>
    <? } ?>
  </a>
</h1>

<? hm_get_template_part( 'template-parts/masthead-authors' ); ?>
