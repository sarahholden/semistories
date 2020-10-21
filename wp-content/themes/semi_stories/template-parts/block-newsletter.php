<!--========================================
MAILCHIMP EMBED
===========================================-->
<div class="newsletter-signup container padded">

  <? hm_get_template_part( 'template-parts/vector-shape-right' ); ?>
  <? hm_get_template_part( 'template-parts/vector-shape-left' ); ?>

  <div class="js-bronto-parent inner">
    <? if(get_field('newsletter_heading', 'option')) { ?>
      <h2 class="h1">
        <?= the_field('newsletter_heading', 'option') ?>
      </h2>
    <? } ?>
    <? if(get_field('newsletter_intro', 'option')) { ?>
      <div class="desc-sans">
        <?= the_field('newsletter_intro', 'option') ?>
      </div>
    <? } ?>

    <div id="mc_embed_signup" class="js-form-outer-wrapper">
      <form action="" method="post" id="bronto-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" >
        <div id="mc_embed_signup_scroll">
          <div class="mc-field-group">
            <label for="email" class="visually-hidden">Email Address</label>
            <input type="email" value="" name="EMAIL" class="js-email required email" id="email" placeholder="add your email address">
            <div class="error"></div>
          </div>
          <div class="clear">
            <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="text-only icon-btn icon-orange" aria-label="Subscribe">
              <? hm_get_template_part( 'template-parts/vector-circle-arrow' ); ?>
            </button></div>
        </div>
      </form>
    </div>

    <div class="js-thank-you hide">
      <div class="desc-sans">
        <p>Thank you for subscribing!</p>
      </div>
    </div>

  </div>
</div>
