<?
$prevArrowImg = '<div class="article-navigation prev-arrow"><img src="' . get_template_directory_uri() . '/images/arrow.svg" alt="Previous Post"><p class="desc">Last</p></div>';
$nextArrowImg = '<div class="article-navigation next-arrow"><img src="' . get_template_directory_uri() . '/images/arrow.svg" alt="Next Post"><p class="desc">Next</p></div>';
?>

<? $categories = get_the_category(); ?>
<? if ( ! empty( $categories ) ) { ?>
  <div class="container-full category-row">
    <? previous_post_link('%link', $prevArrowImg); ?>
    <? next_post_link('%link', $nextArrowImg); ?>
    <a href="<?= esc_url( get_category_link( $categories[0]->term_id ) ) ?>">
      <?= esc_html( $categories[0]->name ) ?>
    </a>
  </div>
<? } ?>
