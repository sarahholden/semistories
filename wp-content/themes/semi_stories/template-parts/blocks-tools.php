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
