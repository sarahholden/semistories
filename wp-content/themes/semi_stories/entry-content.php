<div class="entry-content">




  <!-- ==============================
  TOOLS
  =================================== -->
  <? if (have_rows('tools')) { ?>
    <? while( have_rows('tools') ): the_row(); ?>
      <? if(get_sub_field('tool')) { ?>
        <p class="small-caps">
          <? if(get_sub_field('tool_link_optional')) { ?>
            <a href="<?= get_sub_field('tool_link_optional') ?>" target="_blank">
          <? } ?>
            <?= get_sub_field('tool') ?>
          <? if(get_sub_field('tool_link_optional')) { ?>
            </a>
          <? } ?>
        </p>
        <? if(get_sub_field('tool_amount')) { ?>
          <div class="desc-large">
            <?= get_sub_field('tool_amount') ?>
          </div>
        <? } ?>
        <? if(get_sub_field('tool_amount_unit')) { ?>
          <p class="small-caps">
            <?= get_sub_field('tool_amount_unit') ?>
          </p>
        <? } ?>
      <? } ?>
    <? endwhile; ?>
  <? } ?>



  <!-- ============================================================================
  ARTICLE BLOCKS
  ================================================================================= -->
  <? if( have_rows('article_blocks') ): ?>
  <? while ( have_rows('article_blocks') ) : the_row(); ?>

  <!-- ==============================
  COPY BLOCK W/OPTIONAL HEADING
  =================================== -->
  <? if ( get_row_layout() == 'copy_block_has_heading' ||  get_row_layout() == 'copy_block' || get_row_layout() == 'copy_block_drop_cap' ) { ?>
    <? if(get_sub_field('body')) { ?>
      <section class="copy-block <? if (get_sub_field('show_drop_cap')) { ?>drop-cap<? } ?>">
        <? if(get_sub_field('heading')) { ?>
          <h2><?= get_sub_field('heading') ?></h2>
        <? } ?>
          <div class="desc">
            <?= get_sub_field('body') ?>
          </div>
      </section>
    <? } ?>

  <!-- ==============================
  SINGLE IMAGE BLOCK
  =================================== -->
  <? } else if (get_row_layout() == 'image_block') { ?>
    <section class="image-block">
      <? if(get_sub_field('image')) { ?>
        <? $image = get_field('image'); ?>
        <img src="<?= get_sub_field('image')['url'] ?>" alt="<?= get_sub_field('image')['alt'] ?>">
        <? if($image && !empty($image['caption'])) { ?>
          <?= $image['caption'] ?>
        <? } ?>
      <? } ?>
    </section>

  <!-- ==============================
  IMAGE GALLERY BLOCK
  =================================== -->
  <? } else if (get_row_layout() == 'gallery_block') { ?>
    <? if (have_rows('image_row')) { ?>
      <? while( have_rows('image_row') ): the_row(); ?>
        <? $images = get_sub_field('image_row');
        if( $images ) { ?>
          <? foreach( $images as $image ) { ?>
            <a href="<? echo esc_url($image['url']); ?>" class="js-open-lightbox-gallery">
              <img
              <? acf_responsive_image($image['id']); ?>
              sizes="auto"
              class="lazyload lazy-fade"
              alt="<?= esc_attr($image['alt']); ?>"
              />
            </a>
          <? } ?>
        <? } ?>
      <? endwhile; ?>
      <? while( have_rows('image_row') ): the_row(); ?>
        <? $images = get_sub_field('image_row');
        if( $images ) { ?>
          <? foreach( $images as $image ) { ?>
            <p><? echo esc_html($image['caption']); ?></p>
          <? } ?>
        <? } ?>
      <? endwhile; ?>
    <? } ?>

    <!-- ==============================
    BEFORE AFTER BLOCK
    =================================== -->
  <? } else if ( get_row_layout() == 'before_after_image_block' ) { ?>
    <? if(get_sub_field('before_heading')) { ?>
      <?= get_sub_field('before_heading') ?>
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
      <p class="caption"><?= $image['caption'] ?></p>
    <? } ?>
    <? if(get_sub_field('after_heading')) { ?>
      <?= get_sub_field('after_heading') ?>
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
      <p class="caption"><?= $image['caption'] ?></p>
    <? } ?>


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
        </div>
      <? } ?>
    </div>

  <!-- ==============================
  QUESTION BLOCK
  =================================== -->
  <? } else if ( get_row_layout() == 'question_block' || get_row_layout() == 'answer_block' || get_row_layout() == 'qa_blocks' ) { ?>
    <? if(get_sub_field('heading')) { ?>
      <?= get_sub_field('heading') ?>
    <? } ?>
    <? if(get_sub_field('body')) { ?>
      <?= get_sub_field('body') ?>
    <? } ?>

  <!-- ==============================
  STEP BLOCK
  =================================== -->
  <? } else if ( get_row_layout() == 'step_block' ) { ?>
    <section class="step-block">
      Step #
      <? if(get_sub_field('body')) { ?>
        <div class="desc">
          <?= get_sub_field('body') ?>
        </div>
      <? } ?>
      <? $images = get_sub_field('images');
        if( $images ) { ?>
            <? foreach( $images as $image ) { ?>
              <a href="<? echo esc_url($image['url']); ?>" class="js-open-lightbox-gallery">
                <img
                <? acf_responsive_image($image['id']); ?>
                sizes="auto"
                class="lazyload lazy-fade"
                alt="<?= esc_attr($image['alt']); ?>"
                />
              </a>
              <p><? echo esc_html($image['caption']); ?></p>
            <? } ?>
        <? } ?>

    </section>
  <? } else if ( get_row_layout() == 'test' ) { ?>
  <? } else if ( get_row_layout() == 'test' ) { ?>

  <? } ?>

<? endwhile; ?>
<? endif; ?>


<? if(get_field('author_block_name')) { ?>
  <?= the_field('author_block_name') ?>

  <? if(get_field('author_block_link')) { ?>
    <?= the_field('author_block_link') ?>
  <? } ?>

  <? if(get_field('author_block_about_paragraph')) { ?>
    <div class="desc">
      <?= the_field('author_block_about_paragraph') ?>
    </div>
  <? } ?>

  <? if (have_rows('author_block_social_links')) { ?>
    <? while( have_rows('author_block_social_links') ): the_row(); ?>
      <? if(get_sub_field('social_network')) { ?>
        <h5><? the_sub_field('social_network'); ?></h5>
      <? } ?>
      <? if(get_sub_field('display_handle')) { ?>
        <a href="<? if(get_sub_field('link')) { ?><?= get_sub_field('link') ?><? } ?>" target="blank">
          <?= the_sub_field('display_handle') ?>
        </a>
      <? } ?>
    <? endwhile; ?>
  <? } ?>

<? } ?>



<div class="entry-links"><? wp_link_pages(); ?></div>
</div>
