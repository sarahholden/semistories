


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

  <div class="category-row <?= $color ?>" data-anim="slide" data-anim-order="2">
    <a href="<?= esc_url( get_category_link( $categories[0]->term_id ) ) ?>">
      <?= esc_html( $categories[0]->name ) ?>
    </a>
  </div>
<? } ?>
