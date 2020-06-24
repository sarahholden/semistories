
<? get_header(); ?>

<main id="content" class="page-category">

  <!-- <? if ($categoryDescription) { ?>
    <? hm_get_template_part( 'template-parts/blocks-category-intro' ); ?>
  <? } else { ?> -->
    <div class="container">
      <h1 class="entry-title"><?php the_author_link(); ?></h1>
      <!-- <div class="archive-meta"><?php if ( '' != get_the_author_meta( 'user_description' ) ) { echo esc_html( get_the_author_meta( 'user_description' ) ); } ?></div> -->
    </div>
  <!-- <? } ?> -->

  <? if ( have_posts() ) { ?>
    <div class="container padded thumbs-wrapper">
      <div class="cols-3">
        <?while ( have_posts() ) : the_post(); ?>
          <? hm_get_template_part( 'template-parts/post-thumb' ); ?>
        <? endwhile; ?>
      </div>
    </div>
  <? } ?>
</main>
<? get_footer(); ?>
