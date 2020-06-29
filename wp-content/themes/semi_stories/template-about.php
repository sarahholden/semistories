<?php /* Template Name: About */ ?>

<?php get_header(); ?>
<main id="content" class="page-about">

  <header>
    <div class="container">
      <? if(get_field('page_title')) { ?>
        <h4 class="small-caps"><?= the_field('page_title') ?></h4>
      <? } ?>
      <div class="letter callout-section">
        <? if(get_field('letter_heading')) { ?>
          <h1><?= the_field('letter_heading') ?></h1>
        <? } ?>
        <? if(get_field('letter_lead_in')) { ?>
          <h2><?= the_field('letter_lead_in') ?></h2>
        <? } ?>
        <div>
          <div>
            <? if(get_field('letter_body')) { ?>
              <div class="desc">
                <?= the_field('letter_body') ?>
              </div>
            <? } ?>
              <? if(get_field('signature')) { ?>
                <? $image = get_field('signature'); ?>
                <img
                  <?php acf_responsive_image($image['id']); ?>
                  sizes="auto"
                  class="lazyload lazy-fade signature"
                  alt="<?= $image['alt'] ?>"
                  />
              <? } ?>
              <? if(get_field('name_and_role')) { ?>
                <div class="desc">
                  <?= the_field('name_and_role') ?>
                </div>
              <? } ?>
          </div>
        </div>
      </div>
    </div>
  </header>


  <!-- ==============================
  CONTRIBUTORS
  =================================== -->
  <section class="contributors">
    <div class="container">
      <? if (have_rows('contributors')) { ?>
        <? while( have_rows('contributors') ): the_row(); ?>
          <div class="row">
            <div class="cols-1-2">
              <div>
                <? if(get_sub_field('link')) { ?>
                  <a href="<? the_sub_field('link'); ?>" target="_blank" alt="Headshot <? the_sub_field('name'); ?>">
                <? } ?>
                <? if(get_sub_field('headshot')) { ?>
                  <? $image = get_sub_field('headshot'); ?>
                  <img
                    <?php acf_responsive_image($image['id']); ?>
                    sizes="auto"
                    class="lazyload lazy-fade headshot"
                    alt="<?= $image['alt'] ?>"
                    />
                <? } ?>
                <? if(get_sub_field('link')) { ?>
                  </a>
                <? } ?>
              </div>
              <div class="v-aligner">
                <? if(get_sub_field('link')) { ?>
                  <a href="<? the_sub_field('link'); ?>" target="_blank" alt="Headshot <? the_sub_field('name'); ?>">
                <? } ?>
                <? if(get_sub_field('name')) { ?>
                  <h2><?= get_sub_field('name') ?></h2>
                <? } ?>
                <? if(get_sub_field('bio')) { ?>
                  <div class="desc">
                    <?= get_sub_field('bio') ?>
                  </div>
                <? } ?>
                <? if(get_sub_field('link')) { ?>
                  </a>
                <? } ?>

              </div>
            </div>
          </div>
        <? endwhile; ?>
      <? } ?>
    </div>
  </section>

  <!-- ==============================
  BANNER
  =================================== -->
  <? hm_get_template_part( 'template-parts/banner' ); ?>


</main>
<?php get_footer(); ?>
