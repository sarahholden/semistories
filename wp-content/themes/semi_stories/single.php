<? get_header(); ?>
<main id="content">
  <? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <? get_template_part( 'entry' ); ?>
    <? if ( comments_open() && ! post_password_required() ) { comments_template( '', true ); } ?>
  <? endwhile; endif; ?>
  <footer class="footer">
    <? get_template_part( 'nav', 'below-single' ); ?>
  </footer>
</main>

<? get_footer(); ?>
