</div>
<footer id="footer" class="container padded">
  <h4 class="h1"><a href="/">
    Semi<em>Stories</em>
  </a></h4>
  <div class="cols-2">
    <div class="desc-sans">
      <? if(get_field('footer_about', 'option')) { ?>
        <?= the_field('footer_about', 'option') ?>
      <? } ?>
    </div>
    <div class="cols-1-2">

      <nav>
        <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
      </nav>
      <div class="end-col">
        <div class="inner">
          <? if(get_field('follow_us_text', 'option')) { ?>
            <h5 class="small-caps"><?= the_field('follow_us_text', 'option') ?></h5>
          <? } ?>
          <div class="social-links">
            <? if(get_field('facebook_link', 'option')) { ?>
              <a href="<?= get_field('facebook_link', 'option') ?>" target="_blank" aria-label="Facebook">
                <img src="<?= get_template_directory_uri() ?>/images/facebook.svg" alt="Facebook">
              </a>
            <? } ?>
            <? if(get_field('twitter_link', 'option')) { ?>
              <a href="<?= get_field('twitter_link', 'option') ?>" target="_blank" aria-label="Twitter">
                <img src="<?= get_template_directory_uri() ?>/images/twitter.svg" alt="Twitter">
              </a>
            <? } ?>
            <? if(get_field('pinterest_link', 'option')) { ?>
              <a href="<?= get_field('pinterest_link', 'option') ?>" target="_blank" aria-label="Pinterest">
                <img src="<?= get_template_directory_uri() ?>/images/pinterest.svg" alt="Pinterest">
              </a>
            <? } ?>
            <? if(get_field('instagram_link', 'option')) { ?>
              <a href="<?= get_field('instagram_link', 'option') ?>" target="_blank" aria-label="Instagram">
                <img src="<?= get_template_directory_uri() ?>/images/instagram.svg" alt="Instagram">
              </a>
            <? } ?>
          </div>

        </div>
      </div>
    </div>

  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
