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

<!--
    <form action="http://bm5150.com/public/webform/process/" method="post">
      <input type="hidden" name="fid" value="gk99era9bbeyjjmwib87mzsblrmtf" />
      <input type="hidden" name="sid" value="846f94dd65328c5d60c7410c05a84394" />
      <input type="hidden" name="delid" value="" />
      <input type="hidden" name="subid" value="" />
      <input type="hidden" name="td" value="" />
      <input type="hidden" name="formtype" value="addcontact" />
      <script type="text/javascript">
      var fieldMaps = {};
      </script>

      <div class="section" id="row_15021">
        <div class="" id="column_18152" style="text-align: left; width: 357px;">
          <div class="email field_block">
            <div class="field">
              <span>
                <input type="text" class="text field fb-email" size="35" name="38761" placeholder="add your email address" />
              </span>
              <div class="field_error">
              </div>
            </div>
          </div>
          <div class="list_block hide" id="list_1413392" list_id="1413392">
            <label>
              <span class="checkbox">
                <input type="checkbox" name="38766[1413392]" value="true" />
              </span>
            </label>
          </div>
        </div>
        <div class="" id="column_18153" style="text-align: left; width: 357px;">
          <div class="field_block">
            <div class="field">
              <span>
                <input type="submit" value="Subscribe" />
              </span>
            </div>
          </div>
        </div>
        <div style="clear: both;">&nbsp;</div>
      </div>
    </form> -->


    <div id="mc_embed_signup">
      <form action="" method="post" id="bronto-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" >
        <div id="mc_embed_signup_scroll">
          <div class="mc-field-group">
            <label for="email" class="visually-hidden">Email Address</label>
            <input type="email" value="" name="EMAIL" class="required email" id="email" placeholder="add your email address">
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


    <!-- Begin Mailchimp Signup Form -->
    <!-- <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
    </style>
    <div id="mc_embed_signup">
      <form action="<?= $mailchimpSignupUrl ?>&amp;id=<?= $mailchimpId ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll">
          <div class="mc-field-group">
            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="add your email address">
          </div>
          <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
          </div>
          <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_80b5f814a966438603500a482_7d0bf84247" tabindex="-1" value=""></div>
          <div class="clear">
            <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="text-only icon-btn icon-orange">
              <? hm_get_template_part( 'template-parts/vector-circle-arrow' ); ?>
            </button></div>
        </div>
      </form>
    </div> -->

    <!-- <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';}(jQuery));var $mcj = jQuery.noConflict(true);</script> -->
    <!--End mc_embed_signup-->

  </div>
</div>



<script type="text/javascript">

  function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
  }

  $('#bronto-form').on('submit', function (e) {
    e.preventDefault();

    var email = $('#email').val();
    if (validateEmail(email)) {
      $('body').append('<img src="https://app.bronto.com/public/?q=direct_add&fn=Public_DirectAddForm&id=bhalawrxtqrpufsoyqpdbbtnrwexbch&email='+ email + '&list2=c7eeb3ec-36ce-4d6f-b3a0-1d740e380c83&list3=0bc103ec0000000000000000000000159110" width="0" height="0" border="0" alt=""/>');

      $('#mc_embed_signup').hide();
      $('.js-thank-you').fadeIn();
    } else {
      $('.error').html('Please enter a valid email address');
    }

  });
</script>
