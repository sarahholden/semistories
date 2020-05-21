<?
  $bannerColor = get_field('banner_color') ? get_field('banner_color') : '';

  if ($bannerColor == 'light_blue') {
    $bannerColor = '#B8D2CF';
    $svgColor = '#9EBFBB';
  } else if ($bannerColor == 'green') {
    $bannerColor = '#3B563E';
    $svgColor = '#253A27';
  } else if ($bannerColor == 'pink') {
    $bannerColor = '#F5D4CF';
    $svgColor = '#F0C1BB';
  } else  {
    $bannerColor = '#C19115';
    $svgColor = '#A9720D';
  }
?>

<section class="banner container" style="background: <?= $bannerColor ?>;">
  <? hm_get_template_part( 'template-parts/vector-shape-right-sm', ['svgColor' => $svgColor] ); ?>
  <? hm_get_template_part( 'template-parts/vector-shape-left-sm', ['svgColor' => $svgColor] ); ?>

  <h2>
    <? if (get_field('banner_tagline', 'option') != '') { ?>
      <?= get_field('banner_tagline', 'option') ?>
    <? } else { ?>
      A playful take on practical design
    <? } ?>
  </h2>
</section>
