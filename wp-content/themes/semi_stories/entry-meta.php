<?
$categories = get_the_category();
$categoryId = $categories[0]->term_id;
?>

  <!-- ==============================
  ADVICE
  =================================== -->
<? if ($categoryId == 5) { ?>
  <header class="entry-meta masthead container post-advice">
    <!-- CATEGORY -->
    <? hm_get_template_part( 'template-parts/masthead-category' ); ?>

    <!-- FEATURED IMAGE OR VIDEO -->
    <? hm_get_template_part( 'template-parts/masthead-image-video' ); ?>

    <!-- TITLE & AUTHOR -->
    <? hm_get_template_part( 'template-parts/masthead-title' ); ?>

    <!-- LEAD CAPTION -->
    <? hm_get_template_part( 'template-parts/masthead-caption' ); ?>

    <!-- CREDITS -->
    <? hm_get_template_part( 'template-parts/masthead-credits' ); ?>
  </header>

  <!-- ==============================
  DIY
  =================================== -->
  <? } else if ($categoryId == 8) { ?>
    <header class="entry-meta masthead container post-diy">
      <!-- CATEGORY -->
      <? hm_get_template_part( 'template-parts/masthead-category' ); ?>

      <!-- TITLE & AUTHOR -->
      <? hm_get_template_part( 'template-parts/masthead-title' ); ?>

      <!-- LEAD CAPTION -->
      <? hm_get_template_part( 'template-parts/masthead-caption' ); ?>

      <!-- FEATURED IMAGE OR VIDEO -->
      <? hm_get_template_part( 'template-parts/masthead-image-video' ); ?>

      <!-- CREDITS -->
      <? hm_get_template_part( 'template-parts/masthead-credits' ); ?>
    </header>


  <!-- ==============================
  ESSAY
  =================================== -->
  <? } else if ($categoryId == 4) { ?>
    <header class="entry-meta masthead container post-essay">
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
    </header>

  <!-- ==============================
  ISLAND HOPPING / Q&A
  =================================== -->
  <? } else if ($categoryId == 6) { ?>
    <header class="entry-meta masthead container post-island-hopping post-qa">
      <!-- CATEGORY -->
      <? hm_get_template_part( 'template-parts/masthead-category' ); ?>

      <!-- TITLE & AUTHOR -->
      <? hm_get_template_part( 'template-parts/masthead-title' ); ?>

      <!-- LEAD CAPTION -->
      <? hm_get_template_part( 'template-parts/masthead-caption' ); ?>

      <!-- CREDITS -->
      <? hm_get_template_part( 'template-parts/masthead-credits' ); ?>

      <!-- CONTRIBUTORS -->
      <? hm_get_template_part( 'template-parts/blocks-contributors' ); ?>
    </header>

  <!-- ==============================
  RECIPE
  =================================== -->
  <? } else if ($categoryId == 7) { ?>
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
  <? } else if ($categoryId == 3) { ?>

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
      <? hm_get_template_part( 'template-parts/masthead-image-video' ); ?>

      <!-- CREDITS -->
      <? hm_get_template_part( 'template-parts/masthead-credits' ); ?>
    </header>



  <!-- ==============================
  LIFESTYLE
  =================================== -->
  <? } else { ?>
    <header class="entry-meta masthead container post-lifestyle">
        <!-- CATEGORY -->
        <? hm_get_template_part( 'template-parts/masthead-category' ); ?>

        <!-- TITLE & AUTHOR -->
        <? hm_get_template_part( 'template-parts/masthead-title' ); ?>

        <!-- LEAD CAPTION -->
        <? hm_get_template_part( 'template-parts/masthead-caption' ); ?>

        <!-- FEATURED IMAGE OR VIDEO -->
        <? hm_get_template_part( 'template-parts/masthead-image-video' ); ?>

        <!-- CREDITS -->
        <? hm_get_template_part( 'template-parts/masthead-credits' ); ?>
    </header>
  <? } ?>
