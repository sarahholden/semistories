<?
$prevArrowImg = '<div class="article-navigation prev-arrow"><img src="' . get_template_directory_uri() . '/images/arrow.svg" alt="Previous Post"><p class="desc">Last</p></div>';
$nextArrowImg = '<div class="article-navigation next-arrow"><img src="' . get_template_directory_uri() . '/images/arrow.svg" alt="Next Post"><p class="desc">Next</p></div>';
?>

<? $categories = get_the_category(); ?>
<? if ( ! empty( $categories ) ) { ?>
<?
  if ($categories[0]->category_parent == 8) {
    $color = 'yellow';
  } else if ($categories[0]->category_parent == 2) {
    $color = 'green';
  } else {
    $color = 'blue';
  }
?>
  <div class="category-row <?= $color ?>">
    <? previous_post_link('%link', $prevArrowImg, false); ?>
    <? next_post_link('%link', $nextArrowImg, false); ?>
    <a href="<?= esc_url( get_category_link( $categories[0]->term_id ) ) ?>">
      <?= esc_html( $categories[0]->name ) ?>
    </a>
  </div>
<? } ?>
