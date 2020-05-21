<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
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
        <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
        <!-- <ul class="menu">
          <? $menu_items = wp_get_nav_menu_items('top-nav'); ?>
          <? foreach( $menu_items as $key=>$menu_item ) { ?>
            <li>
              <a href="#"
              class="js-filter load-more-posts text-only <? if ($key == 0) { ?>active<? } ?>"
              data-ppp="12"
              data-post-type="news"
              data-page-number="1"
              data-category="<?= $menu_item->object_id ?>"
              data-category-text="<?= $menu_item->title ?>"
              data-load-type="filter">
                <?= $menu_item->title ?>
                <? if (count($menu_items) == $key + 1) { ?>
                  <span class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                      <g id="Group_73" data-name="Group 73" transform="translate(-1082 -199)">
                        <g id="Ellipse_12" data-name="Ellipse 12" transform="translate(1082 199)" fill="none" stroke="#af6e43" stroke-width="1">
                          <circle cx="9" cy="9" r="9" stroke="none"/>
                          <circle cx="9" cy="9" r="8.5" fill="none"/>
                        </g>
                        <path id="Path_115" data-name="Path 115" d="M2636,203.7l4.456,4.541L2636,212.677" transform="translate(-1547)" fill="none" stroke="#af6e43" stroke-width="1"/>
                      </g>
                    </svg>
                  </span>
                <? } ?>
              </a>
            </li>
          <? } ?>
        </ul> -->
      </nav>
    </div>
  </header>
  <div id="container" class="site-content">
