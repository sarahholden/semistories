<?php /* Template Name: Home */ ?>

<?php get_header(); ?>
<main id="content" class="page-blog">


<div class="">
  <!-- ==============================
  MASTHEAD POSTS
  =================================== -->
  <?php
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 3
    );

    $featuredQuery = new WP_Query( $args );
  ?>

  <header class="container">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <? $i = 0; ?>
        <? while ($featuredQuery->have_posts()) : $featuredQuery->the_post(); ?>
          <? $className = 'stacked'; ?>

          <?php hm_get_template_part( 'template-parts/masthead-slideshow', [ 'post' => $post->ID, 'className' => $className, ] ); ?>

          <?$i++;?>
        <?endwhile;?>
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

    <section class="container padded">
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





    <? $featuredArgs = array(
      'post_type' => 'post',
      'posts_per_page' => 9,
    );
    $featuredQuery = new WP_Query( $featuredArgs );
    ?>

    <section class="blog-posts">
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
