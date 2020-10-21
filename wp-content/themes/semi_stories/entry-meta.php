<?

$categories = wp_get_post_terms($post->ID, 'category', ['fields' => 'all']);
$primary_category = $categories[0];
foreach($categories as $term) {
   if( get_post_meta($post->ID, '_yoast_wpseo_primary_category', true) == $term->term_id ) {
     // this is a primary category
     $primary_category = $term;
   }
}

$categoryName = ! empty( $primary_category ) ? strtolower($primary_category->name) : '';
$categoryId = ! empty( $primary_category ) ? strtolower($primary_category->term_id) : '';

?>


  <!-- ==============================
  ADVICE (DO AS A DESIGNER DOES)
  =================================== -->
<? if ($categoryId == 5) { ?>
  <!-- BANNER -->
  <? hm_get_template_part( 'template-parts/masthead-banner' ); ?>

  <header class="entry-meta masthead container post-advice">
    <!-- CATEGORY -->
    <div class="category-full">
      <? hm_get_template_part( 'template-parts/masthead-category' ); ?>
    </div>

    <!-- FEATURED IMAGE OR VIDEO -->
    <? $mastheadIcon = get_field('question_advice_icon', 'option'); ?>
    <? hm_get_template_part( 'template-parts/masthead-image-video', ['mastheadIcon' =>  $mastheadIcon] ); ?>


    <!-- TITLE & AUTHOR -->
    <? hm_get_template_part( 'template-parts/masthead-title' ); ?>

    <!-- LEAD CAPTION -->
    <? hm_get_template_part( 'template-parts/masthead-caption' ); ?>

    <!-- TOOLS -->
    <? hm_get_template_part( 'template-parts/blocks-tools' ); ?>

    <!-- CREDITS -->
    <? hm_get_template_part( 'template-parts/masthead-credits' ); ?>
  </header>

  <!-- ==============================
  DIY
  =================================== -->
  <? } else if ($categoryId == 20) { ?>
    <!-- BANNER -->
    <? hm_get_template_part( 'template-parts/masthead-banner' ); ?>

    <header class="entry-meta masthead container post-illustration">
      <!-- CATEGORY -->
      <? hm_get_template_part( 'template-parts/masthead-category' ); ?>

      <!-- TITLE & AUTHOR -->
      <? hm_get_template_part( 'template-parts/masthead-title' ); ?>


      <!-- LEAD CAPTION -->
      <? hm_get_template_part( 'template-parts/masthead-caption' ); ?>

      <!-- CREDITS -->
      <? hm_get_template_part( 'template-parts/masthead-credits' ); ?>

      <!-- FEATURED IMAGE OR VIDEO -->
      <? hm_get_template_part( 'template-parts/masthead-image-video' ); ?>

      <!-- TOOLS -->
      <? hm_get_template_part( 'template-parts/blocks-tools' ); ?>

    </header>



  <? } else if ($categoryId == 8 || $categoryId == 18) { ?>
    <!-- BANNER -->
    <? hm_get_template_part( 'template-parts/masthead-banner' ); ?>

    <header class="entry-meta masthead container post-diy">
      <!-- CATEGORY -->
      <? hm_get_template_part( 'template-parts/masthead-category' ); ?>

      <!-- TITLE & AUTHOR -->
      <? hm_get_template_part( 'template-parts/masthead-title' ); ?>

      <!-- LEAD CAPTION -->
      <? hm_get_template_part( 'template-parts/masthead-caption' ); ?>

      <!-- FEATURED IMAGE OR VIDEO -->
      <? hm_get_template_part( 'template-parts/masthead-image-video' ); ?>

      <!-- TOOLS -->
      <? hm_get_template_part( 'template-parts/blocks-tools' ); ?>

      <!-- CREDITS -->
      <? hm_get_template_part( 'template-parts/masthead-credits' ); ?>
    </header>


  <!-- ==============================
  ESSAY / START FRESH
  =================================== -->
  <? } else if ($categoryId == 4) { ?>
    <!-- BANNER -->
    <? hm_get_template_part( 'template-parts/masthead-banner' ); ?>

    <header class="entry-meta masthead container post-essay">
      <!-- CATEGORY -->
      <? hm_get_template_part( 'template-parts/masthead-category' ); ?>

      <!-- TITLE & AUTHOR -->
      <? hm_get_template_part( 'template-parts/masthead-title' ); ?>

      <!-- LEAD CAPTION -->
      <? hm_get_template_part( 'template-parts/masthead-caption' ); ?>

      <!-- CREDITS -->
      <? hm_get_template_part( 'template-parts/masthead-credits' ); ?>

      <!-- TOOLS -->
      <? hm_get_template_part( 'template-parts/blocks-tools' ); ?>

      <!-- FEATURED IMAGE OR VIDEO -->
      <? $mastheadIcon = get_field('fresh_start_icon', 'option'); ?>
      <? hm_get_template_part( 'template-parts/masthead-image-video', ['mastheadIcon' =>  $mastheadIcon] ); ?>
    </header>

  <!-- ==============================
  ISLAND HOPPING / Q&A
  =================================== -->
  <? } else if ($categoryId == 6) { ?>
    <!-- BANNER -->
    <? hm_get_template_part( 'template-parts/masthead-banner' ); ?>

    <header class="entry-meta masthead container post-island-hopping post-qa">
      <!-- CATEGORY -->
      <? hm_get_template_part( 'template-parts/masthead-category' ); ?>

      <!-- TITLE & AUTHOR -->
      <? hm_get_template_part( 'template-parts/masthead-title' ); ?>

      <!-- LEAD CAPTION -->
      <? hm_get_template_part( 'template-parts/masthead-caption' ); ?>

      <!-- CREDITS -->
      <? hm_get_template_part( 'template-parts/masthead-credits' ); ?>

      <!-- TOOLS -->
      <? hm_get_template_part( 'template-parts/blocks-tools' ); ?>

      <!-- CONTRIBUTORS -->
      <? hm_get_template_part( 'template-parts/blocks-contributors' ); ?>
    </header>

  <!-- ==============================
  RECIPE
  =================================== -->
  <? } else if ($categoryId == 7) { ?>
    <!-- BANNER -->
    <? hm_get_template_part( 'template-parts/masthead-banner' ); ?>

    <header class="entry-meta masthead container post-recipe">
      <!-- CATEGORY -->
      <? hm_get_template_part( 'template-parts/masthead-category' ); ?>

      <!-- TITLE & AUTHOR -->
      <? hm_get_template_part( 'template-parts/masthead-title' ); ?>

      <!-- LEAD CAPTION -->
      <? hm_get_template_part( 'template-parts/masthead-caption' ); ?>

      <!-- FEATURED IMAGE OR VIDEO -->
      <? hm_get_template_part( 'template-parts/masthead-image-video' ); ?>

      <!-- TOOLS -->
      <? hm_get_template_part( 'template-parts/blocks-tools' ); ?>

      <!-- CREDITS -->
      <? hm_get_template_part( 'template-parts/masthead-credits' ); ?>
    </header>

  <!-- ==============================
  WALKTHROUGH
  =================================== -->
  <? } else if ($categoryId == 3 || $categoryId == 13 || $categoryId == 17) { ?>

    <!-- BANNER -->
    <? hm_get_template_part( 'template-parts/masthead-banner' ); ?>

    <header class="entry-meta masthead container post-walkthrough">

      <!-- CATEGORY -->
      <? hm_get_template_part( 'template-parts/masthead-category' ); ?>

      <!-- TITLE & AUTHOR -->
      <? hm_get_template_part( 'template-parts/masthead-title' ); ?>

      <!-- LEAD CAPTION -->
      <? hm_get_template_part( 'template-parts/masthead-caption' ); ?>

      <!-- FEATURED IMAGE OR VIDEO -->
      <? $mastheadIcon = $categoryId == 17 ? get_field('b_a_icon', 'option') : ''; ?>
      <? hm_get_template_part( 'template-parts/masthead-image-video', ['mastheadIcon' =>  $mastheadIcon] ); ?>


      <!-- TOOLS -->
      <? hm_get_template_part( 'template-parts/blocks-tools' ); ?>

      <!-- CREDITS -->
      <? hm_get_template_part( 'template-parts/masthead-credits' ); ?>
    </header>



  <!-- ==============================
  LIFESTYLE
  =================================== -->
  <? } else { ?>
    <!-- BANNER -->
    <? hm_get_template_part( 'template-parts/masthead-banner' ); ?>
    <header class="entry-meta masthead container post-lifestyle">
        <!-- CATEGORY -->
        <? hm_get_template_part( 'template-parts/masthead-category' ); ?>

        <!-- TITLE & AUTHOR -->
        <? hm_get_template_part( 'template-parts/masthead-title' ); ?>

        <!-- LEAD CAPTION -->
        <? hm_get_template_part( 'template-parts/masthead-caption' ); ?>

        <!-- FEATURED IMAGE OR VIDEO -->
        <? hm_get_template_part( 'template-parts/masthead-image-video' ); ?>

        <!-- TOOLS -->
        <? hm_get_template_part( 'template-parts/blocks-tools' ); ?>

        <!-- CREDITS -->
        <? hm_get_template_part( 'template-parts/masthead-credits' ); ?>
    </header>
  <? } ?>


  <!-- ==============================
  CATEGORY INTRO
  =================================== -->
  <? hm_get_template_part( 'template-parts/blocks-category-intro' ); ?>
