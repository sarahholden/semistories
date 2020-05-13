</div>
<footer id="footer" class="container padded">
  <h4 class="h1">Semi<em>Stories</em></h4>
  <div class="cols-2">
    <div class="desc-sans">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris m dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div class="cols-1-2">

      <nav>
        <div>
          <a href="">Design</a>
          <a href="">Technology</a>
          <a href="">Renovation</a>
          <a href="">DIY</a>
        </div>
      </nav>
      <div >
        <h5 class="small-caps">Follow Us:</h5>
        <div class="social-links">
          <? if(get_field('facebook_link', 'option')) { ?>
            <a href="<?= the_field('facebook_link', 'option') ?>" target="_blank">
              <img src="<?= get_template_directory_uri() ?>/images/facebook.svg" alt="Facebook">
            </a>
          <? } ?>
          <? if(get_field('twitter_link', 'option')) { ?>
            <a href="<?= the_field('twitter_link', 'option') ?>" target="_blank">
              <img src="<?= get_template_directory_uri() ?>/images/twitter.svg" alt="Facebook">
            </a>
          <? } ?>
          <? if(get_field('pinterest_link', 'option')) { ?>
            <a href="<?= the_field('pinterest_link', 'option') ?>" target="_blank">
              <img src="<?= get_template_directory_uri() ?>/images/pinterest.svg" alt="Facebook">
            </a>
          <? } ?>
          <? if(get_field('instagram_link', 'option')) { ?>
            <a href="<?= the_field('instagram_link', 'option') ?>" target="_blank">
              <img src="<?= get_template_directory_uri() ?>/images/instagram.svg" alt="Facebook">
            </a>
          <? } ?>
        </div>

      </div>
    </div>

  </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
