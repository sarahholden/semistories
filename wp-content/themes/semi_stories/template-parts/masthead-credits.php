<div class="credit-row">
  <!-- DATE -->
  <span class="date">Published <?php the_time( get_option( 'date_format' ) ); ?></span>

  <? if (have_rows('credits')) { ?>
    <? while( have_rows('credits') ): the_row(); ?>
      <span class="credit">

        <!-- CREDIT DESCRIPTION -->
        <? if(get_sub_field('type_of_credit')) { ?>
          <? the_sub_field('type_of_credit'); ?>
        <? } ?>

        <!-- CONTRIBUTOR W/LINK (linked if link is provided) -->
        <? if(get_sub_field('contributor_link')) { ?>
          <a href="<?= get_sub_field('contributor_link') ?>" target="_blank">
        <? } ?>
          <? if(get_sub_field('contributor_name')) { ?>
            <?= get_sub_field('contributor_name') ?>
          <? } ?>
        <? if(get_sub_field('contributor_link')) { ?>
          </a>
        <? } ?>

      </span>
    <? endwhile; ?>
  <? } ?>

</div>
