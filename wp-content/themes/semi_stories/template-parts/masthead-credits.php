<span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
<? if (have_rows('credits')) { ?>
  <? while( have_rows('credits') ): the_row(); ?>
    <? if(get_sub_field('type_of_credit')) { ?>
      <? the_sub_field('type_of_credit'); ?>
    <? } ?>
    <? if(get_sub_field('contributor_link')) { ?>
      <a href="<?= get_sub_field('contributor_link') ?>" target="_blank">
      <? } ?>
    <? if(get_sub_field('contributor_name')) { ?>
      <?= get_sub_field('contributor_name') ?>
    <? } ?>
    <? if(get_sub_field('contributor_link')) { ?>
      </a>
    <? } ?>
  <? endwhile; ?>
<? } ?>
