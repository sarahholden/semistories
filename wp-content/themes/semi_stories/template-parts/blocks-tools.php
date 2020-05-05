<!-- ==============================
TOOLS
=================================== -->
<? if (have_rows('tools')) { ?>
  <div class="tools-box">
    <? if(get_field('tools_heading')) { ?>
      <h2><?= the_field('tools_heading') ?></h2>
    <? } ?>
    <div class="tools-grid row-<?= count(get_field('tools')) ?>">
      <? while( have_rows('tools') ): the_row(); ?>
        <div class="tool">
          <? if(get_sub_field('tool')) { ?>
            <p class="xs-caps">
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
              <p class="xs-caps">
                <?= get_sub_field('tool_amount_unit') ?>
              </p>
            <? } ?>
          <? } ?>
        </div>
      <? endwhile; ?>
    </div>
  </div>
<? } ?>
