<?
  $adCount = count(get_field('ads', 'option'));

  $previousAdIndex = isset($_COOKIE["adIndex"]) ? $_COOKIE["adIndex"] : -1;
  $previousAdIndex = (int)$previousAdIndex;
  $whileLoopIndex = 0;

  if ($previousAdIndex < $adCount - 1) {
    $currentAdIndex = $previousAdIndex + 1;
  } else {
    $currentAdIndex = 0;
  }

  setcookie('adIndex', $currentAdIndex);

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
  <?php wp_head(); ?>

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-TGWCGGF');</script>
  <!-- End Google Tag Manager -->

  <!-- Facebook Pixel Code -->
  <script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1783429081735718');
  fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1783429081735718&ev=PageView&noscript=1"
  /></noscript>
  <!-- End Facebook Pixel Code -->

</head>
<body <?php body_class(); ?>>

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TGWCGGF"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <a class="in-page-link skip-link" href="#container">Skip to Content</a>


  <header id="header" class="site-header" >
    <div class="nav-wrapper  container-full">
      <div class="logo-wrapper">
        <h1 id="home-link">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home">
            Semi<em>Stories</em>
          </a>
        </h1>
      </div>
      <nav id="menu" class="<? if (get_field('launch_dropdown_navigation', 'option')) { ?>has-dropdowns<? } else { ?>hide-dropdowns<? } ?>">
        <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
      </nav>
      <span class="nav-icon js-nav-icon pre-load">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
          <g data-name="Group 73" transform="translate(-1082 -199)">
            <g data-name="Ellipse 12" transform="translate(1082 199)" fill="none" stroke="#39465E" stroke-width="1">
              <circle cx="9" cy="9" r="9" stroke="none"/>
              <circle cx="9" cy="9" r="8.5" fill="none"/>
            </g>
            <path data-name="Path 115" d="M2636,203.7l4.456,4.541L2636,212.677" transform="translate(-1547)" fill="none" stroke="#39465E" stroke-width="1"/>
          </g>
        </svg>
      </span>
    </div>

    <div class="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>

  </header>
  <div id="container" class="site-content">
