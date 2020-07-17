<? get_header(); ?>

<?
  $category = get_queried_object();
  $categoryPageId = $category->term_id;

  $q = new WP_Query( array(
      'nopaging' => true,
      'tax_query' => array(
          array(
              'taxonomy' => 'category',
              'field' => 'id',
              'terms' => $category->term_id,
              'include_children' => true,
          ),
      ),
      'fields' => 'ids',
  ) );
  $totalPosts = $q->post_count;

  $numberPostsPerPage = 18;
  // $totalPosts = $category->category_count;
?>

<main id="content" class="page-category">

  <!-- <? if ($categoryDescription) { ?>
    <? hm_get_template_part( 'template-parts/blocks-category-intro' ); ?>
  <? } else { ?> -->
    <div class="container">
      <h1 class="entry-title"><?php single_term_title(); ?></h1>
    </div>
  <!-- <? } ?> -->

  <? if ( have_posts() ) { ?>
    <div class="container padded thumbs-wrapper">
      <div id="ajax-posts" class="cols-3">
        <?while ( have_posts() ) : the_post(); ?>
          <? hm_get_template_part( 'template-parts/post-thumb' ); ?>
        <? endwhile; ?>
      </div>
    </div>
  <? } ?>



  <!-- ==============================
  LOAD MORE POSTS
  =================================== -->
  <? global $wp_query; ?>
  <? if ($totalPosts > $numberPostsPerPage) { ?>
    <div class="js-more-section load-more-row container">
      <button type="button"
      id="more_posts"
      class="js-load-more load-more-posts text-only"
      data-ppp="<?= $numberPostsPerPage ?>"
      data-post-type="post"
      data-page-number="1"
      data-total-post-count="<?= $totalPosts ?>"
      data-load-type="more"
      data-category="<?= $categoryPageId ?>"
      >
      <span class="btn-text">
        &#43; More Stories
      </span>
    </button>
  </div>
  <? } ?>
</main>
<? get_footer(); ?>
