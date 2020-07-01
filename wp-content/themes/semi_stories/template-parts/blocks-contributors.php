<!-- ==============================
CONTRIBUTORS
=================================== -->
<? if (have_rows('contributors')) { ?>
  <div>
    <? while( have_rows('contributors') ): the_row(); ?>
      <div class="contributor-row">

        <!-- IMAGE -->
        <? if(get_sub_field('contributor_image')) { ?>
          <div class="bg-shape-wrapper">
            <? $image = get_sub_field('contributor_image'); ?>
            <img
            <?php acf_responsive_image($image['id']); ?>
            sizes="auto"
            class="lazyload lazy-fade"
            alt="<?= $image['alt'] ?>"
            data-anim="scale"
            />
            <svg xmlns="http://www.w3.org/2000/svg" class="bg-shape " viewBox="0 0 558.39 370.847">
              <path id="Path_107" data-name="Path 107" d="M13240.055,1974.013l-443.44,54.98-114.949-370.847h558.39Z" transform="translate(-12681.665 -1658.146)" fill="#c19115"/>
            </svg>
          </div>
        <? } ?>

        <!-- TEXT CONTENT -->
        <div class="text-content">
          <? if(get_sub_field('contributor_name')) { ?>
            <h2>
              <? if(get_sub_field('contributor_link')) { ?>
                <a href="<?= get_sub_field('contributor_link') ?>" target="blank" aria-label="visit contributor site in new tab">
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
                <a href="<?= get_sub_field('contributor_company_link') ?>" target="blank" aria-label="visit contributor site in new tab">
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
