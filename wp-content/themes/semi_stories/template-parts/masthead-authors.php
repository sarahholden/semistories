<?
$authorCount = get_field('authors') ? count(get_field('authors')) : 0;
$index = 0;
?>

<p class="author desc-sm">
  <? if (have_rows('authors')) { ?>
    By
    <? while( have_rows('authors') ): the_row(); ?>
      <? if(get_sub_field('url')) { ?>
        <a href="<?= get_sub_field('url') ?>" target="_blank">
        <? } ?>
        <? if(get_sub_field('name')) { ?>
          <span><?= get_sub_field('name') ?></span>
        <? } ?>
      <? if(get_sub_field('url')) { ?>
        </a>
      <? } ?>
      <? if ($authorCount > 1 && $index < $authorCount - 1) { ?>
        and
      <? } ?>
      <? $index++ ?>
    <? endwhile; ?>

  <!-- Display Wordpress Author if not author has been added -->
  <? } else { ?>
    <span class="author vcard"><?php the_author_posts_link(); ?></span>
  <? } ?>

</p>
