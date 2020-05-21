<?
  $twitterDesc = "https://twitter.com/share?url=" . get_permalink() .
  "&text=".urlencode(get_the_title() . ' | ').
  "+". urlencode(get_the_title()) .
  "&lang=en";

?>


<div class="social-links">
  <a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo urlencode(get_permalink()); ?>" target="_blank">
    <span><img src="<?= get_template_directory_uri() ?>/images/facebook.svg" alt="Facebook"></span>
  </a>
  <a href="<?= $twitterDesc ?>" target="_blank">
    <span><img src="<?= get_template_directory_uri() ?>/images/twitter.svg" alt="Twitter"></span>
  </a>
  <a href="http://pinterest.com/pin/create/button/?url=<?= urlencode(get_permalink()) ?>&media=<?= urlencode(get_the_post_thumbnail_url()) ?>&description=<?= urlencode(get_the_title()) ?>">
    <img src="<?= get_template_directory_uri() ?>/images/pinterest.svg" alt="Pinterest">
  </a>
</div>
