<? get_header(); ?>
<main id="content">
  <? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <? get_template_part( 'entry' ); ?>
  <? endwhile; endif; ?>
</main>

<? get_footer(); ?>
