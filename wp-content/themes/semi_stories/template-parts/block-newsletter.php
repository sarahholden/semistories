<!--========================================
MAILCHIMP EMBED
===========================================-->
<?
  // STEP 1: Setup form fields in mailchimp
  // STEP 2: Update variables below
  $mailchimpSignupUrl = ''; // https://goldenstatedistillery.us11.list-manage.com/subscribe/post?u=80b5f814a966438603500a482
  $mailchimpId = ''; // example: 7d0bf84247
?>

<div class="newsletter-signup container padded">

  <? hm_get_template_part( 'template-parts/vector-shape-right' ); ?>
  <? hm_get_template_part( 'template-parts/vector-shape-left' ); ?>

  <div class="inner">
    <h2 class="h1">Make your inbox a little more fun.</h2>
    <div class="desc-sans">Share your email to get delightful stories about all things changing at home.</div>




    <!-- Begin Mailchimp Signup Form -->
    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
    /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
    We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
    </style>
    <div id="mc_embed_signup">
      <form action="<?= $mailchimpSignupUrl ?>&amp;id=<?= $mailchimpId ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll">
          <div class="mc-field-group">
            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email Address">
          </div>
          <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
          </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_80b5f814a966438603500a482_7d0bf84247" tabindex="-1" value=""></div>
          <div class="clear">
            <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="text-only icon-btn icon-orange">
              <? hm_get_template_part( 'template-parts/vector-circle-arrow' ); ?>
            </button></div>
        </div>
      </form>
    </div>
    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
    <!--End mc_embed_signup-->

  </div>
</div>
