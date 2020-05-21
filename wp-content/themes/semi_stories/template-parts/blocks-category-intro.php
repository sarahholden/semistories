<?
$category = get_the_category();
$categoryDescription = $category[0]->description;
$categoryTitle = $category[0]->cat_name;
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
