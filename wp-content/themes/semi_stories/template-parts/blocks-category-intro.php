
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
$categoryDescription = $primary_category->description;
$categoryTitle = $primary_category->name;
?>




<? if ($categoryDescription) { ?>
  <section class="container category-intro">
    <div class="callout-section">
      <h2><?= $categoryTitle ?></h2>
      <div class="desc">
        <?= $categoryDescription ?>
      </div>
    </div>
  </section>
<? } ?>
