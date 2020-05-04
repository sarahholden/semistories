<? $categories = get_the_category(); ?>
<? if ( ! empty( $categories ) ) { ?>
  <div class="container-full category-row">
    <a href="<?= esc_url( get_category_link( $categories[0]->term_id ) ) ?>">
      <?= esc_html( $categories[0]->name ) ?>
    </a>
  </div>
<? } ?>
