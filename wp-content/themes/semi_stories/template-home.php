<?php /* Template Name: Home */ ?>

<?php get_header(); ?>
<main id="content" class="page-home">

<? $postIdsAlreadyUsed = array(); ?>


<div class="">
  <!-- ==============================
  MASTHEAD POSTS
  =================================== -->

  <header class="masthead-slideshow">
    <div class="swiper-container swiper-container-progress-bar">
      <div class="swiper-wrapper">
        <? $featuredPostsCount = 0; ?>
        <?
        $post_objects = get_field('featured_posts');
        if( $post_objects ): ?>
          <?php foreach( $post_objects as $post): ?>
            <?php setup_postdata($post); ?>
            <? $postIdsAlreadyUsed[] = $post->ID; ?>
            <? $className = 'overlay'; ?>

            <?php hm_get_template_part( 'template-parts/masthead-slideshow', [ 'post' => $post->ID, 'className' => $className, ] ); ?>

            <?$featuredPostsCount++;?>
          <?php endforeach; ?>
          <?php wp_reset_postdata(); ?>
        <?php endif;?>
      </div>

      <div class="progress-bars">
        <?
        $post_objects = get_field('featured_posts');
        if( $post_objects ): ?>
          <?php foreach( $post_objects as $post): ?>
            <? $percentageWidth = 1 / count($post_objects) * 100 ?>
            <div class="progress-bar" style="width: calc(<?= $percentageWidth ?>% - 24px)">
              <div class="progress"></div>
            </div>
          <?php endforeach; ?>
          <?php wp_reset_postdata(); ?>
        <?php endif;?>
      </div>
    </div>
  </header>

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
        <?
        $post_objects = get_field('section_1_posts');
        if( $post_objects ): ?>
          <?php foreach( $post_objects as $post): ?>
            <?php setup_postdata($post); ?>
            <? $postIdsAlreadyUsed[] = $post->ID; ?>
            <? $className = 'stacked'; ?>

            <?php hm_get_template_part( 'template-parts/post-thumb', [ 'post' => $post->ID, 'className' => $className, ] ); ?>

            <?$i++;?>
          <?php endforeach; ?>
          <?php wp_reset_postdata(); ?>
        <?php endif;?>
      </div>
    </section>

  <!-- ==============================
  TOP STORIES
  =================================== -->
  <section class="top-stories-section container padded">
    <h3 class="h1">Top Stories</h3>
    <div class="cols-3">
      <? $i = 0; ?>
      <?
      $post_objects = get_field('section_2_posts');
      if( $post_objects ): ?>
        <?php foreach( $post_objects as $post): ?>
          <?php setup_postdata($post); ?>
          <? $postIdsAlreadyUsed[] = $post->ID; ?>
          <? $className = 'stacked'; ?>

          <?php hm_get_template_part( 'template-parts/post-thumb', [ 'post' => $post->ID, 'className' => $className, ] ); ?>

          <?$i++;?>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif;?>
    </div>
  </section>

  <!-- ==============================
  SPONSORED
  =================================== -->

  <section class="sponsored container padded">
    <div class="">
      <? $i = 0; ?>
      <?
      $post_objects = get_field('section_3_posts');
      if( $post_objects ): ?>
        <?php foreach( $post_objects as $post): ?>
          <?php setup_postdata($post); ?>
          <? $postIdsAlreadyUsed[] = $post->ID; ?>
          <? $className = 'img-left'; ?>

          <?php hm_get_template_part( 'template-parts/post-thumb', [ 'post' => $post->ID, 'className' => $className, ] ); ?>

          <?$i++;?>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif;?>
    </div>
  </section>


  <!-- ==============================
  AD
  =================================== -->

  <img src="<?= get_template_directory_uri() ?>/images/sample_ad.png" width="100%" alt="">


  <!-- ==============================
  OVERFLOW
  =================================== -->

  <?
  $args = array('post__not_in' => $postIdsAlreadyUsed, 'order' => 'ASC' );
  $allOtherPosts = new WP_Query( $args );
  ?>

    <section class="more-blog-posts container padded">
        <div class="cols-3">
          <? $i = 0; ?>
          <? while ($allOtherPosts->have_posts()) : $allOtherPosts->the_post(); ?>
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
