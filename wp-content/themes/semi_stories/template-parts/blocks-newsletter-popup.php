<div class="js-close-email-popup close-popup-overlay"></div>
<div class="js-email-popup email-popup">
  <section class=" js-bronto-parent content">
    <div class="shape-left">
      <? hm_get_template_part( 'template-parts/vector-shape-left-2' ); ?>
    </div>
    <div class="shape-right">
      <? hm_get_template_part( 'template-parts/vector-shape-right-2' ); ?>
    </div>
    <button type="button" class="js-close-email-popup close-button-icon"><? hm_get_template_part( 'template-parts/vector-close-btn' ); ?></button>
    <div class="text-content ">
      <?php if(get_field('popup_heading', 'option')) { ?>
        <h1><?php echo get_field('popup_heading', 'option') ?></h1>
      <?php } ?>
      <?php if(get_field('popup_desc', 'option')) { ?>
        <div class="desc-sans">
          <?php echo get_field('popup_desc', 'option') ?>
        </div>
      <?php } ?>
      <div class="js-form-outer-wrapper">
        <form action="" method="post" id="bronto-popup-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" >
          <div class="input-wrapper">
            <label for="popup-email" class="visually-hidden">Email Address</label>
            <input type="email" value="" name="EMAIL" class="js-email required email" id="popup-email" placeholder="<?php echo get_field('popup_placeholder_text', 'option') ?>">
            <div class="error"></div>
          </div>
          <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="text-only icon-btn icon-orange" aria-label="Subscribe">
            <? hm_get_template_part( 'template-parts/vector-circle-arrow-sm' ); ?>
          </button>
        </form>
        <button type="button" class="btn btn--newsletter js-close-email-popup">
          <span class="text-span">
            <?php echo get_field('popup_no_thanks_text', 'option') ?>
          </span>
        </button>

      </div>
      <div class="js-thank-you hide">
        <div class="desc-sans">
          <p>Thank you for subscribing!</p>
        </div>
      </div>
    </div>
  </section>
</div>
