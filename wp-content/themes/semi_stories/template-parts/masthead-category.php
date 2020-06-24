<?
$prevArrowImg = '<div class="article-navigation prev-arrow"><img src="' . get_template_directory_uri() . '/images/arrow.svg" alt="Previous Post"><p class="desc">Last</p></div>';
$nextArrowImg = '<div class="article-navigation next-arrow"><img src="' . get_template_directory_uri() . '/images/arrow.svg" alt="Next Post"><p class="desc">Next</p></div>';
?>

<?

$categories = wp_get_post_terms(get_the_id(), 'category', ['fields' => 'all']);
$primary_category = $categories[0];
foreach($categories as $term) {
   if( get_post_meta(get_the_id(), '_yoast_wpseo_primary_category', true) == $term->term_id ) {
     // this is a primary category
     $primary_category = $term;
   }
}

$categoryName = ! empty( $primary_category ) ? strtolower($primary_category->name) : '';
$categoryId = ! empty( $primary_category ) ? strtolower($primary_category->term_id) : '';

?>


<? $categories = get_the_category(); ?>
<? if ( ! empty( $categories ) ) { ?>
<?
  if ($primary_category->category_parent == 8) {
    $color = 'yellow';
  } else if ($primary_category->category_parent == 2) {
    $color = 'green';
  } else {
    $color = 'blue';
  }
?>
  <div class="category-row <?= $color ?>">
    <? previous_post_link('%link', $prevArrowImg, false); ?>
    <? next_post_link('%link', $nextArrowImg, false); ?>
    <a href="<?= esc_url( get_category_link( $categoryId ) ) ?>">
      <?= esc_html( $categoryName ) ?>
    </a>
  </div>
<? } ?>
