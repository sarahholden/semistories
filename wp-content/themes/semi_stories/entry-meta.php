<div class="entry-meta">
  <!-- ==============================
  PAGE TITLE
  =================================== -->
  <? hm_get_template_part( 'template-parts/masthead-title', [ 'countryCode' => $countryCode ] ); ?>

  <!-- ==============================
  FEATURED IMAGE OR VIDEO
  =================================== -->
  <? if(get_field('show_video_in_masthead')) { ?>
    <? hm_get_template_part( 'template-parts/masthead-video' ); ?>
  <? } else if ( has_post_thumbnail() ) { ?>
    <? hm_get_template_part( 'template-parts/masthead-image' ); ?>
  <? } ?>


  <!-- ==============================
  LEAD CAPTION
  =================================== -->
  <? if(get_field('lead_caption')) { ?>
    <? hm_get_template_part( 'template-parts/masthead-caption' ); ?>
  <? } ?>

  <!-- ==============================
  CREDITS
  =================================== -->
  <? if (have_rows('credits')) { ?>
    <? hm_get_template_part( 'template-parts/masthead-credits' ); ?>

  <? } ?>

  <!-- ==============================
  AUTHOR(S)
  =================================== -->
  <? if (have_rows('authors')) { ?>
    <? while( have_rows('authors') ): the_row(); ?>
      <? if(get_sub_field('url')) { ?>
        <a href="<?= get_sub_field('url') ?>" target="_blank">
        <? } ?>
        <? if(get_sub_field('name')) { ?>
          <?= get_sub_field('name') ?>
        <? } ?>
      <? if(get_sub_field('url')) { ?>
        </a>
      <? } ?>
    <? endwhile; ?>
  <? } else { ?>
    <span class="author vcard"><?php the_author_posts_link(); ?></span>
  <? } ?>


  <!-- ==============================
  DATE
  =================================== -->
  <span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>





  <!-- ==============================
  CONTRIBUTORS
  =================================== -->
  <? if (have_rows('contributors')) { ?>
    <? while( have_rows('contributors') ): the_row(); ?>
      <? if(get_sub_field('contributor_image')) { ?>
        <? $image = get_sub_field('contributor_image'); ?>
        <img
          <?php acf_responsive_image($image['id']); ?>
          sizes="auto"
          class="lazyload lazy-fade"
          alt="<?= $image['alt'] ?>"
          data-anim="scale"
          />
      <? } ?>
      <? if(get_sub_field('contributor_name')) { ?>
        <? if(get_sub_field('contributor_link')) { ?>
          <a href="<?= the_field('contributor_link') ?>" target="blank">
        <? } ?>
          <? the_sub_field('contributor_name'); ?>
        <? if(get_sub_field('contributor_link')) { ?>
          </a>
        <? } ?>
      <? } ?>
      <? if(get_sub_field('contributor_company')) { ?>
        <? if(get_sub_field('contributor_company_link')) { ?>
          <a href="<?= the_field('contributor_company_link') ?>" target="blank">
        <? } ?>
          <?= the_sub_field('contributor_company') ?>
        <? if(get_sub_field('contributor_company_link')) { ?>
          </a>
        <? } ?>
      <? } ?>
    <? endwhile; ?>
  <? } ?>

</div>
