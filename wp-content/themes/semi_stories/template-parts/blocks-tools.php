<!-- ==============================
TOOLS
=================================== -->
<? if (have_rows('tools')) { ?>
  <div class="tools-box">

    <? if(get_field('tools_heading')) { ?>
      <h2><?= the_field('tools_heading') ?></h2>
    <? } ?>
    <div class="tools-grid row-<?= count(get_field('tools')) ?>">
      <ul>
        <? while( have_rows('tools') ): the_row(); ?>
          <li class="tool">
            <p>
              <? if(get_sub_field('tool_link')) { ?>
                <a href="<?= get_sub_field('tool_link') ?>" target="_blank">
              <? } ?>
                <? if(get_sub_field('tool')) { ?>
                  <?= get_sub_field('tool') ?>
                <? } ?>
              <? if(get_sub_field('tool_link')) { ?>
                </a>
              <? } ?>
            </p>
          </li>
        <? endwhile; ?>
      </ul>
    </div>
  </div>
<? } ?>
