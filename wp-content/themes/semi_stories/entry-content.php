<? $categories = get_the_category(); ?>
<? $categoryName = ! empty( $categories ) ? strtolower($categories[0]->name) : ''; ?>
<? $categoryId = $categories[0]->term_id; ?>
<?
  function seoUrl($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
  }

  $categoryName = seoUrl($categoryName);

  $stepIndex = 1;
?>



<div class="entry-content">

  <div class="container cols-blog post-<?= $categoryName ?>">
    <div class="blog-content">

        <!-- ============================================================================
        ARTICLE BLOCKS
        ================================================================================= -->
        <? if( have_rows('article_blocks') ): ?>
        <? while ( have_rows('article_blocks') ) : the_row(); ?>

        <!-- ==============================
        COPY BLOCK W/OPTIONAL HEADING
        =================================== -->
        <? if ( get_row_layout() == 'copy_block_has_heading'  ||  get_row_layout() == 'copy_block' || get_row_layout() == 'copy_block_drop_cap' ) { ?>
          <? if(get_sub_field('body') || get_sub_field('heading')) { ?>
            <section class="copy-block <? if (get_sub_field('show_drop_cap')) { ?>drop-cap<? } ?>">
              <? if(get_sub_field('heading')) { ?>
                <h2><?= get_sub_field('heading') ?></h2>
              <? } ?>
              <? if(get_sub_field('body')) { ?>
                <div class="desc">
                  <?= get_sub_field('body') ?>
                </div>
              <? } ?>
            </section>
          <? } ?>

        <!-- ==============================
        SINGLE IMAGE BLOCK
        =================================== -->
        <? } else if (get_row_layout() == 'image_block') { ?>
          <section class="image-block single-image-block">
            <? if(get_sub_field('image')) { ?>
              <div class="bg-shape-wrapper">
                <? $image = get_sub_field('image'); ?>
                <img
                  <?php acf_responsive_image($image['id']); ?>
                  sizes="auto"
                  class="lazyload lazy-fade"
                  alt="<?= $image['alt'] ?>"
                  data-anim="scale"
                  />

                  <? if ($post->ID == 179) { ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="bg-shape" viewBox="0 0 558.39 370.847">
                      <path id="Path_107" data-name="Path 107" d="M13240.055,1974.013l-443.44,54.98-114.949-370.847h558.39Z" transform="translate(-12681.665 -1658.146)" fill="#c19115"/>
                    </svg>
                  <? } ?>
              </div>

              <? if($image && !empty($image['caption'])) { ?>
                <p class="caption desc-sans-sm"><?= $image['caption'] ?></p>
              <? } ?>
            <? } ?>
          </section>

        <!-- ==============================
        IMAGE GALLERY BLOCK
        =================================== -->
        <? } else if (get_row_layout() == 'gallery_block') { ?>
          <section class="image-gallery">
            <? if (have_rows('image_row')) { ?>
              <? while( have_rows('image_row') ): the_row(); ?>
                <? $images = get_sub_field('image_row');
                if( $images ) { ?>
                  <div class="gallery-row cols-<?= count($images) ?>">
                    <? foreach( $images as $image ) { ?>
                      <img
                      <? acf_responsive_image($image['id']); ?>
                      sizes="auto"
                      class="lazyload lazy-fade"
                      alt="<?= esc_attr($image['alt']); ?>"
                      />
                    <? } ?>
                  </div>
                <? } ?>
              <? endwhile; ?>
              <!-- CAPTIONS -->
              <div class="gallery-captions desc-sans-sm">
                <? while( have_rows('image_row') ): the_row(); ?>
                  <? $images = get_sub_field('image_row');
                  if ( $images ) { ?>
                      <? foreach( $images as $image ) { ?>
                        <? echo esc_html($image['caption']); ?>
                      <? } ?>
                  <? } ?>
                <? endwhile; ?>
              </div>
            <? } ?>

          </section>
          <!-- ==============================
          BEFORE AFTER BLOCK
          =================================== -->
        <? } else if ( get_row_layout() == 'before_after_image_block' ) { ?>
          <section class="before-after-block cols-2">
            <div>
              <? if(get_sub_field('before_heading')) { ?>
                <h2><?= get_sub_field('before_heading') ?></h2>
              <? } ?>
              <? if(get_sub_field('before_image')) { ?>
                <? $image = get_sub_field('before_image'); ?>
                <img
                  <?php acf_responsive_image($image['id']); ?>
                  sizes="auto"
                  class="lazyload lazy-fade"
                  alt="<?= $image['alt'] ?>"
                  data-anim="scale"
                  />
                <p class="caption desc-sans-sm"><?= $image['caption'] ?></p>
              <? } ?>
            </div>
            <div>
              <? if(get_sub_field('after_heading')) { ?>
                <h2><?= get_sub_field('after_heading') ?></h2>
              <? } ?>
              <? if(get_sub_field('after_image')) { ?>
                <? $image = get_sub_field('after_image'); ?>
                <img
                  <?php acf_responsive_image($image['id']); ?>
                  sizes="auto"
                  class="lazyload lazy-fade"
                  alt="<?= $image['alt'] ?>"
                  data-anim="scale"
                  />
                <p class="caption desc-sans-sm"><?= $image['caption'] ?></p>
            </div>
            <? } ?>
          </section>


        <!-- ==============================
        PULLOUT QUOTE
        =================================== -->
        <? } else if ( get_row_layout() == 'pullout_quote' ) { ?>
          <div class="quote <? if(get_sub_field('layout')) { ?>layout-<?= get_sub_field('layout') ?><? } ?>">
            <? if(get_sub_field('image')) { ?>
              <? $image = get_sub_field('image'); ?>
              <div class="circle-image">
                <img
                  <?php acf_responsive_image($image['id']); ?>
                  sizes="auto"
                  class="lazyload lazy-fade"
                  alt="<?= $image['alt'] ?>"
                  data-anim="scale"
                  />
              </div>
            <? } ?>
            <? if(get_sub_field('quote')) { ?>
              <div class="desc-large">
                <?= get_sub_field('quote') ?>
                <? if (get_sub_field('layout') == 'center') { ?>
                  <span class="quote-top">&ldquo;</span>
                  <span class="quote-bottom">&rdquo;</span>
                <? } ?>
              </div>
            <? } ?>

          </div>

        <!-- ==============================
        QUESTION BLOCK
        =================================== -->
        <? } else if ( get_row_layout() == 'question_block' || get_row_layout() == 'answer_block' || get_row_layout() == 'qa_blocks' ) { ?>
          <div class="qa-block <?= get_row_layout(); ?>">
            <? if(get_sub_field('heading')) { ?>
              <h5><?= get_sub_field('heading') ?></h5>
            <? } ?>
            <? if(get_sub_field('body')) { ?>
              <div class="desc">
                <?= get_sub_field('body') ?>
              </div>
            <? } ?>
          </div>

        <!-- ==============================
        STEP BLOCK
        =================================== -->
        <? } else if ( get_row_layout() == 'step_block' ) { ?>
          <? if ($stepIndex == 1) { ?>
            <h2 class="h1 steps-header">Steps</h2>
          <? } ?>
          <section class="step-block">
            <div class="unit-and-index">
              <p class="step-unit">Step</p>
              <p class="step-index"><?= $stepIndex ?></p>
            </div>
            <div class="text-content">
              <? if(get_sub_field('body')) { ?>
                <div class="desc">
                  <?= get_sub_field('body') ?>
                </div>
              <? } ?>
              <? $images = get_sub_field('images');
              if( $images ) { ?>
                <? foreach( $images as $image ) { ?>
                  <div class="image-wrapper">
                    <img
                    <? acf_responsive_image($image['id']); ?>
                    sizes="auto"
                    class="lazyload lazy-fade"
                    alt="<?= esc_attr($image['alt']); ?>"
                    />
                  </div>
                  <p class="caption desc-sans-sm"><? echo esc_html($image['caption']); ?></p>
                <? } ?>
              <? } ?>
            </div>

          </section>
          <? $stepIndex++ ?>
        <? } else if ( get_row_layout() == 'test' ) { ?>
        <? } else if ( get_row_layout() == 'test' ) { ?>

        <? } ?>

      <? endwhile; ?>
      <? endif; ?>
    </div>

    <!-- ==============================
    SIDEBAR
    =================================== -->
    <aside class="sidebar">
      <div class="share">
        <h2>Share, and share and like.</h2>
        <h5 class="small-caps">Share this story on.</h5>
        <div class="social-links">
          <a href="">
            <img src="<?= get_template_directory_uri() ?>/images/facebook.svg" alt="Facebook">
          </a>
          <a href="">
            <img src="<?= get_template_directory_uri() ?>/images/twitter.svg" alt="Twitter">
          </a>
          <a href="">
            <img src="<?= get_template_directory_uri() ?>/images/pinterest.svg" alt="Pinterest">
          </a>
          <a href="">
            <img src="<?= get_template_directory_uri() ?>/images/instagram.svg" alt="Instagram">
          </a>

        </div>
        <svg xmlns="http://www.w3.org/2000/svg" class="spacer" viewBox="0 0 294 54.465">
          <path id="Spacer_1" data-name="Spacer 1" d="M4080.714,3014.242l-.367-.1-189.09-50.437.524-3.931,188.724,50.339,103.836-50.266.916,3.784Z" transform="translate(-3891.257 -2959.777)" fill="#b8d2cf"/>
        </svg>

      </div>



      <!-- ==============================
      POPULAR POSTS
      =================================== -->

      <? $featuredArgs = array(
        'post_type' => 'post',
        'posts_per_page' => 5,
      );
      $featuredQuery = new WP_Query( $featuredArgs );
      ?>

      <?wp_reset_postdata();?>
      <div class="popular-posts">
        <h2 class="h1">Popular Posts</h2>
        <ol>
          <? $i = 0; ?>
          <? while ($featuredQuery->have_posts()) : $featuredQuery->the_post(); ?>
            <? $className = $i == 0 ? 'featured-article' : 'blog-landing-article'; ?>
            <li>
              <a href="<? the_permalink() ?>">
                <? the_title(); ?>
              </a>
            </li>
            <?$i++;?>
          <?endwhile;?>

        </ol>
        <svg xmlns="http://www.w3.org/2000/svg" class="spacer" viewBox="0 0 294 54.465">
          <path id="Spacer_1" data-name="Spacer 1" d="M4080.714,3014.242l-.367-.1-189.09-50.437.524-3.931,188.724,50.339,103.836-50.266.916,3.784Z" transform="translate(-3891.257 -2959.777)" fill="#b8d2cf"/>
        </svg>

      </div>
      <div class="follow">
        <h2>Follow Semihandmade</h2>
        <div class="social-links">
          <a href="">
            <img src="<?= get_template_directory_uri() ?>/images/facebook.svg" alt="Facebook">
          </a>
          <a href="">
            <img src="<?= get_template_directory_uri() ?>/images/twitter.svg" alt="Twitter">
          </a>
          <a href="">
            <img src="<?= get_template_directory_uri() ?>/images/pinterest.svg" alt="Pinterest">
          </a>
          <a href="">
            <img src="<?= get_template_directory_uri() ?>/images/instagram.svg" alt="Instagram">
          </a>

        </div>
      </div>
    </aside>
  </div>


  <!-- ==============================
  AUTHOR BLOCK
  =================================== -->
  <? if(get_field('author_block_name')) { ?>
    <section class="container author-block">
      <div class="inner">
        <div class="cols-2-1">
          <div>
            <h5>About</h5>
            <? if(get_field('author_block_link')) { ?>
              <a href="<?= the_field('author_block_link') ?>">
            <? } ?>
              <h3><?= the_field('author_block_name') ?></h3>
            <? if(get_field('author_block_link')) { ?>
              </a>
            <? } ?>

            <? if(get_field('author_block_about_paragraph')) { ?>
              <div class="desc">
                <?= the_field('author_block_about_paragraph') ?>
              </div>
            <? } ?>

          </div>
          <? if (have_rows('author_block_social_links')) { ?>
            <div>
              <? while( have_rows('author_block_social_links') ): the_row(); ?>
                <div class="social-link">
                  <? if(get_sub_field('social_network')) { ?>
                    <h5><? the_sub_field('social_network'); ?></h5>
                  <? } ?>
                  <? if(get_sub_field('display_handle')) { ?>
                    <a href="<? if(get_sub_field('link')) { ?><?= get_sub_field('link') ?><? } ?>" target="blank">
                      <?= the_sub_field('display_handle') ?>
                    </a>
                  <? } ?>
                </div>
              <? endwhile; ?>
            </div>
          <? } ?>
        </div>
      </div>
    </section>
  <? } ?>




  <!-- ==============================
  MUST HAVES (FOR ADVICE)
  =================================== -->
  <? if ($categoryId == 5) { ?>
      <?php
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 4
        );

        $featuredQuery = new WP_Query( $args );
      ?>

      <section class="container padded more-stories-section must-haves">
        <div class="inner">
          <h2 class="h1">Must Haves</h2>
          <div class="cols-2">
            <? $i = 0; ?>
            <? while ($featuredQuery->have_posts()) : $featuredQuery->the_post(); ?>
              <? $className = 'stacked'; ?>

              <?php hm_get_template_part( 'template-parts/post-thumb', [ 'post' => $post->ID, 'className' => $className, ] ); ?>

              <?$i++;?>
            <?endwhile;?>
          </div>
        </div>
      </section>
      <?wp_reset_postdata();?>
    <? } ?>


  <!-- ==============================
  TOP STORIES
  =================================== -->
    <?php
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3
      );

      $featuredQuery = new WP_Query( $args );
    ?>

    <section class="container padded more-stories-section">
      <div class="inner">
        <h2 class="h1">More <em>Stories...</em></h2>
        <div class="cols-3">
          <? $i = 0; ?>
          <? while ($featuredQuery->have_posts()) : $featuredQuery->the_post(); ?>
            <? $className = 'stacked'; ?>

            <?php hm_get_template_part( 'template-parts/post-thumb', [ 'post' => $post->ID, 'className' => $className, ] ); ?>

            <?$i++;?>
          <?endwhile;?>
        </div>
      </div>
    </section>
    <?wp_reset_postdata();?>

</div>
