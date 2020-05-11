<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div id="wrapper" class="hfeed">
    <header id="header" >
      <div class="nav-wrapper  container-full">
        <div class="logo-wrapper">
          <h1>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home">
              Semi<em>Stories</em>
            </a>
          </h1>
        </div>
        <nav id="menu">
          <!-- <div id="search"><?php get_search_form(); ?></div> -->
          <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
          <div class="search">
            <? hm_get_template_part( 'template-parts/vector-search' ); ?>
          </div>
        </nav>
      </div>
    </header>
    <div id="container">
