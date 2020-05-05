<!-- ==============================
CONTRIBUTORS
=================================== -->
<? if (have_rows('contributors')) { ?>
  <div>
    <? while( have_rows('contributors') ): the_row(); ?>
      <div class="contributor-row">

        <!-- IMAGE -->
        <? if(get_sub_field('contributor_image')) { ?>
          <div class="image-wrapper">
            <? $image = get_sub_field('contributor_image'); ?>
            <img
            <?php acf_responsive_image($image['id']); ?>
            sizes="auto"
            class="lazyload lazy-fade"
            alt="<?= $image['alt'] ?>"
            data-anim="scale"
            />
          </div>
        <? } ?>

        <!-- TEXT CONTENT -->
        <div class="text-content">
          <? if(get_sub_field('contributor_name')) { ?>
            <h2>
              <? if(get_sub_field('contributor_link')) { ?>
                <a href="<?= the_field('contributor_link') ?>" target="blank">
              <? } ?>
                <? the_sub_field('contributor_name'); ?>
              <? if(get_sub_field('contributor_link')) { ?>
                </a>
              <? } ?>
            </h2>
          <? } ?>
          <? if(get_sub_field('contributor_company')) { ?>
            <h5 class="small-caps">
              <? if(get_sub_field('contributor_company_link')) { ?>
                <a href="<?= the_field('contributor_company_link') ?>" target="blank">
              <? } ?>
                <?= the_sub_field('contributor_company') ?>
              <? if(get_sub_field('contributor_company_link')) { ?>
                </a>
              <? } ?>
            </h5>
          <? } ?>
        </div>
      </div>
    <? endwhile; ?>
  </div>
<? } ?>
