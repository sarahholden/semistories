<?php /* Template Name: Home */ ?>

<?php get_header(); ?>
<main id="content" class="page-home">


<div class="">
  <!-- ==============================
  MASTHEAD POSTS
  =================================== -->
  <?php
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 3,
      'tag' => 'featured'
    );

    $featuredQuery = new WP_Query( $args );
  ?>

  <header class="masthead-slideshow">
    <div class="swiper-container swiper-container-progress-bar">
      <div class="swiper-wrapper">
        <? $featuredPostsCount = 0; ?>
        <? while ($featuredQuery->have_posts()) : $featuredQuery->the_post(); ?>
          <? $className = 'overlay'; ?>

          <?php hm_get_template_part( 'template-parts/masthead-slideshow', [ 'post' => $post->ID, 'className' => $className, ] ); ?>

          <?$featuredPostsCount++;?>
        <?endwhile;?>
      </div>

      <div class="progress-bars">
        <? for ($x = 0; $x < $featuredPostsCount; $x++) { ?>
          <? $percentageWidth = 1 / $featuredPostsCount * 100 ?>
          <div class="progress-bar" style="width: calc(<?= $percentageWidth ?>% - 24px)">
            <div class="progress"></div>
          </div>
        <? } ?>
      </div>
    </div>
  </header>
  <?wp_reset_postdata();?>

  <? hm_get_template_part( 'template-parts/banner' ); ?>
  <!-- ==============================
  FEATURED POSTS
  =================================== -->
    <?php
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 2
      );

      $featuredQuery = new WP_Query( $args );
    ?>

    <section class="container padded">
      <div class="cols-2">
        <? $i = 0; ?>
        <? while ($featuredQuery->have_posts()) : $featuredQuery->the_post(); ?>
          <? $className = 'stacked'; ?>

          <?php hm_get_template_part( 'template-parts/post-thumb', [ 'post' => $post->ID, 'className' => $className, ] ); ?>

          <?$i++;?>
        <?endwhile;?>
      </div>
    </section>
    <?wp_reset_postdata();?>

  <!-- ==============================
  TOP STORIES
  =================================== -->
    <?php
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 6
      );

      $featuredQuery = new WP_Query( $args );
    ?>

    <section class="top-stories-section container padded">
      <h3 class="h1">Top Stories</h3>
      <div class="cols-3">
        <? $i = 0; ?>
        <? while ($featuredQuery->have_posts()) : $featuredQuery->the_post(); ?>
          <? $className = 'stacked'; ?>

          <?php hm_get_template_part( 'template-parts/post-thumb', [ 'post' => $post->ID, 'className' => $className, ] ); ?>

          <?$i++;?>
        <?endwhile;?>
      </div>
    </section>
    <?wp_reset_postdata();?>

  <!-- ==============================
  SPONSORED
  =================================== -->
    <?php
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 1
      );

      $featuredQuery = new WP_Query( $args );
    ?>

    <section class="sponsored container padded">
      <div class="">
        <? $i = 0; ?>
        <? while ($featuredQuery->have_posts()) : $featuredQuery->the_post(); ?>
          <? $className = 'img-left'; ?>

          <?php hm_get_template_part( 'template-parts/post-thumb', [ 'post' => $post->ID, 'className' => $className, ] ); ?>

          <?$i++;?>
        <?endwhile;?>
      </div>
    </section>
    <?wp_reset_postdata();?>

    <img src="<?= get_template_directory_uri() ?>/images/sample_ad.png" width="100%" alt="">

    <? $featuredArgs = array(
      'post_type' => 'post',
      'posts_per_page' => 6,
    );
    $featuredQuery = new WP_Query( $featuredArgs );
    ?>

    <section class="more-blog-posts container padded">
        <div class="cols-3">
          <? $i = 0; ?>
          <? while ($featuredQuery->have_posts()) : $featuredQuery->the_post(); ?>
            <? $className = $i == 0 ? 'featured-article' : 'blog-landing-article'; ?>

            <?php hm_get_template_part( 'template-parts/post-thumb', [ 'post' => $post->ID, 'className' => $className, ] ); ?>

            <?$i++;?>
          <?endwhile;?>
          <?wp_reset_postdata();?>
        </div>
    </section>

    <!-- <? if (  $wp_query->max_num_pages > 1 ) { ?>
      <? $cat_id = get_query_var('cat'); ?>
      <button type="button" id="more_posts" class="js-load-more"  data-page-number="2" data-category="<? $cat_id; ?>">Load More</button>
    <? } ?> -->

</div>

<? hm_get_template_part( 'template-parts/block-newsletter' ); ?>



  <!-- $args = array(
      'post_type' => 'post',
      'tax_query' => array(
          'relation' => 'OR',
          array(
              'taxonomy' => 'category',
              'field'    => 'slug',
              'terms'    => array( 'quotes' ),
          ),
          array(
              'taxonomy' => 'post_format',
              'field'    => 'slug',
              'terms'    => array( 'post-format-quote' ),
          ),
      ),
  );
  $query = new WP_Query( $args ); -->

</main>
<?php get_footer(); ?>
