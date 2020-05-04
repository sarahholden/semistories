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
