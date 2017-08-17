<div class="quotation-step-3 step-3"></div>
<div class="custom-form step-3">
  <form novalidate>
    <div class="contain">
      <h3>Please select from the following options <i class="icon-arrow-down"></i></h3>
    </div><!-- contain -->

    <div class="packs-wrapper">
      <div class="packs">

        <div class="packs__item packs__item-basic" data-plan="<?= $plans[0]['packName'] ?>">
          <div class="content-box">
            <div class="img-wrap">
              <img class="packs__item-img" src="<?php echo get_template_directory_uri() ?>/images/quote-label.png" alt="basic quote">
              <img class="packs__item-img-hover" src="<?php echo get_template_directory_uri() ?>/images/quote-label-hover.png" alt="basic quote">
              <span class="img-wrap-text"><?= $plans[0]['packName'] ?></span>
            </div><!-- img-wrap -->
            <div class="descr">
              <p>Our <span><?= $plans[0]['packName'] ?></span> plan provides the standard motor coverage required by law plus roadside assistance and windscreen coverage up to $2,500.</p>
            </div><!-- descr -->
            <div class="price-box">
              <p><span class="basic-annually">$<?= $plans[0]['netAnnualPremiumIncludingTax'] ?> <?= $currency ?></span> annually<? if (@$plans[0]['country'] !== 'DE' && @$plans[0]['country'] !== 'LE') { ?> <span class="price-box-or">OR</span></p>
              <p><span class="basic-monthly">$<?= $plans[0]['downPaymentForMonthlyPlan'] ?> <?= $currency ?></span> plus 9 monthly payments of <span class="basic-monthly-premium monthly-premium">$<?= $plans[0]['netMonthlyPremiumIncludingTax'] ?> <?= $currency ?></span></p>
              <? } else { ?>
              </p> <? } ?>
            </div><!-- price-box -->
          </div><!-- content-box -->
          <div class="button-box">
            <a href="#basic" class="popup compare-packs">View details</a>
            <a class="compare-packs select-pack">Select</a>
          </div><!-- button-box -->
        </div><!-- packs__item -->

        <div class="packs__item packs__item-preferred" data-plan="<?= $plans[1]['packName'] ?>">
          <div class="content-box">
            <div class="img-wrap">
              <img class="packs__item-img" src="<?php echo get_template_directory_uri() ?>/images/quote-label.png" alt="preferred quote">
              <img class="packs__item-img-hover" src="<?php echo get_template_directory_uri() ?>/images/quote-label-hover.png" alt="preferred quote">
              <span class="img-wrap-text"><?= $plans[1]['packName'] ?></span>
            </div><!-- img-wrap -->
            <div class="descr">
              <p>The <span><?= $plans[1]['packName'] ?></span> plan provides benefits outlined in the <span><?= $plans[1]['packName'] ?></span> plan with some add-ons such as Special Perils and Loss of Use.</p>
            </div><!-- descr -->
            <div class="price-box">
              <p><span class="preferred-annually">$<?= $plans[1]['netAnnualPremiumIncludingTax'] ?> <?= $currency ?></span> annually<? if (@$plans[1]['country'] !== 'DE' && @$plans[1]['country'] !== 'LE') { ?> <span class="price-box-or">OR</span></p>
              <p><span class="preferred-monthly">$<?= $plans[1]['downPaymentForMonthlyPlan'] ?> <?= $currency ?></span> plus 9 monthly payments of <span class="preferred-monthly-premium monthly-premium">$<?= $plans[1]['netMonthlyPremiumIncludingTax'] ?> <?= $currency ?></span></p>
              <? } else { ?>
              </p> <? } ?>
            </div><!-- price-box -->
          </div><!-- content-box -->
          <div class="button-box">
            <a href="#preferred" class="popup compare-packs">View details</a>
            <a class="compare-packs select-pack">Select</a>
          </div><!-- button-box -->
        </div><!-- packs__item -->

        <div class="packs__item packs__item-premium" data-plan="<?= $plans[2]['packName'] ?>">
          <div class="content-box">
            <div class="img-wrap">
              <img class="packs__item-img" src="<?php echo get_template_directory_uri() ?>/images/quote-label.png" alt="basic quote">
              <img class="packs__item-img-hover" src="<?php echo get_template_directory_uri() ?>/images/quote-label-hover.png" alt="premium quote">
              <span class="img-wrap-text"><?= $plans[2]['packName'] ?></span>
            </div><!-- img-wrap -->
            <div class="descr">
              <p>The <span><?= $plans[2]['packName'] ?></span> plan includes the full range of motor benefits that Beacon can offer, with maximum limits.</p>
              <p>Additional benefits include NCD protection and Accident forgiveness.</p>
            </div><!-- descr -->
            <div class="price-box">
              <p><span class="premium-annually">$<?= $plans[2]['netAnnualPremiumIncludingTax'] ?> <?= $currency ?></span> annually<? if (@$plans[2]['country'] !== 'DE' && @$plans[2]['country'] !== 'LE') { ?> <span class="price-box-or">OR</span></p>
              <p><span class="premium-monthly">$<?= $plans[2]['downPaymentForMonthlyPlan'] ?> <?= $currency ?></span> plus 9 monthly payments of <span class="premium-monthly-premium monthly-premium">$<?= $plans[2]['netMonthlyPremiumIncludingTax'] ?> <?= $currency ?></span></p>
              <? } else { ?>
              </p> <? } ?>
            </div><!-- price-box -->
          </div><!-- content-box -->
          <div class="button-box">
            <a href="#premium" class="popup compare-packs">View details</a>
            <a class="compare-packs select-pack">Select</a>
          </div><!-- button-box -->
        </div><!-- packs__item -->

      </div><!-- packs -->
    </div><!-- packs-wrapper -->

    <div class="contain">
      <div class="button-wrap">
        <a href="#compare" class="popup compare-packs">COMPARE PLANS</a>
      </div><!-- button-wrap -->
    </div><!-- contain -->

    <div class="contain">
      <div class="email-address2">
        <div class="tr">
          <div class="td"><label for="email-address2">Please re-enter your e-mail address</label></div>
          <div class="td">
            <div class="input-block">
              <input name="email-address" placeholder="johnFG@email.com" id="email-address2" type="text" class="text" />
              <input id="selectedUChoosePackId" name="selectedUChoosePackId" type="hidden" value="">
            </div>
          </div>
        </div>
      </div><!-- email-address -->
    </div><!-- contain -->

    <div class="contain step-3-footer">
      <div class="step-footer">
        <button class="go-to-step-1" type="button">Previous</button>
        <button class="go-to-very-last-step" onclick="ga('send','pageview', '/stepB3completed.html');">view final quote</button>
      </div><!-- step-footer -->
      <div class="custom-ajax-loading"></div>
    </div><!-- contain -->
  </form>
</div><!-- custom step 3 -->

<!-- ========================POPUP======================= -->

<div id="basic" class="popup-table mfp-hide">
  <div class="popup__head">
    <div class="popup__close">X</div>
    <img src="<?php echo get_template_directory_uri() ?>/images/popup-header-logo.png" alt="" />
    <h2><span><?= $plans[0]['packName'] ?></span> Plan</h2>
  </div><!-- popup__head -->
  <div class="popup__body">
    <table>
      <?php foreach ($packsSorted[$plans[0]['packName']] as $benefit) { ?>
        <tr>
          <td<?php if (@$benefit['desc']) { ?> title="<?= @$benefit['desc'] ?>" class="benefit-desc" <?php } ?>><span><?= $benefit['name'] ?></span></td>
          <td><?= $benefit['value'] ?></td>
        </tr>
      <?php } ?>
    </table>
  </div><!-- popup-body -->
</div><!-- basic -->

<div id="preferred" class="popup-table mfp-hide">
  <div class="popup__head">
    <div class="popup__close">X</div>
    <img src="<?php echo get_template_directory_uri() ?>/images/popup-header-logo.png" alt="" />
    <h2 style="padding-left: 50px;"><span><?= $plans[1]['packName'] ?></span> Plan</h2>
  </div><!-- popup__head -->
  <div class="popup__body">
    <table>
      <?php foreach ($packsSorted[$plans[1]['packName']] as $benefit) { ?>
        <tr>
          <td<?php /*if (@$benefit['desc']) { ?> title="<?= @$benefit['desc'] ?>" class="benefit-desc" <?php }*/ ?>><span><?= $benefit['name'] ?></span></td>
          <td><?= $benefit['value'] ?></td>
        </tr>
      <?php } ?>
    </table>
  </div><!-- popup-body -->
</div><!-- preferred -->

<div id="premium" class="popup-table mfp-hide">
  <div class="popup__head">
    <div class="popup__close">X</div>
    <img src="<?php echo get_template_directory_uri() ?>/images/popup-header-logo.png" alt="" />
    <h2 style="padding-left: 50px;"><span><?= $plans[2]['packName'] ?></span> Plan</h2>
  </div><!-- popup__head -->
  <div class="popup__body">
    <table>
      <?php foreach ($packsSorted[$plans[2]['packName']] as $benefit) { ?>
        <tr>
          <td<?php /* if (@$benefit['desc']) { ?> title="<?= @$benefit['desc'] ?>" class="benefit-desc" <?php } */?>><span><?= $benefit['name'] ?></span></td>
          <td><?= $benefit['value'] ?></td>
        </tr>
      <?php } ?>
    </table>
  </div><!-- popup-body -->
</div><!-- premium -->

<div id="compare" class="popup-table mfp-hide">
  <div class="popup__head">
    <div class="popup__close">X</div>
    <img src="<?php echo get_template_directory_uri() ?>/images/popup-header-logo.png" alt="" />
    <h2 style="padding-left: 50px;">U Choose Plans Comparisons</h2>
  </div><!-- popup__head -->

  <div class="popup__body">
    <table>
      <tr class="popup__body-labels">
        <td></td>
        <td class="popup__body-label"><div class="popup__body-label-wrap"><img src="<?php echo get_template_directory_uri() ?>/images/quote-label.png" alt="" />
          <span class="popup__body-label-text"><?= $plans[0]['packName'] ?></span></div>
        </td>
        <td class="popup__body-label"><div class="popup__body-label-wrap"><img src="<?php echo get_template_directory_uri() ?>/images/quote-label.png" alt="" />
          <span class="popup__body-label-text"><?= $plans[1]['packName'] ?></span></div>
        </td>
        <td class="popup__body-label"><div class="popup__body-label-wrap"><img src="<?php echo get_template_directory_uri() ?>/images/quote-label.png" alt="" />
          <span class="popup__body-label-text"><?= $plans[2]['packName'] ?></span></div>
          </td>
      </tr>
      <?php /* echo nl2br(str_replace(' ', '&nbsp;', print_r($packsSorted, true))) . '<hr>'; */ ?>
      <?php foreach ($benefitsList as $benefit) { ?>
        <? /*$benArr = array();
          foreach ($packsSorted as $pack) { 
            foreach ($pack as $_benArr) {
              if ($_benArr['name'] === $benefit) {
                $benArr = $_benArr;
                break 1;
              }
            }
          }
         */?>
        <tr>
          <td<?php /* if (@$benArr['desc']) { ?> title="<?= $benArr['desc'] ?>" class="benefit-desc" <?php } */?>><span><?= $benefit ?></span></td>
          <? foreach ($packsSorted as $pack) { ?>
            <? foreach ($pack as $_benArr) { ?>
              <? if ($_benArr['name'] === $benefit) { ?>
                <td><?= $_benArr['value'] ?></td>
              <? } ?>
            <? } ?>
          <? } ?>
        </tr>
      <?php } ?>
    </table>
  </div><!-- popup-body -->

</div><!-- compare -->

<script>
  jQuery(document).ready(function ($) {

    // show right currency
    var currency = "ECD";
    if ($("select[name=country]").val() == "TT")
      currency = "TTD";
    if ($("select[name=country]").val() == "BA")
      currency = "BDS";
  
    $('.popup').magnificPopup({
      type: 'inline',
      preloader: false
    });

    var selectPackBtn = $('.packs__item .select-pack');
    var $packItems = $('.packs-wrapper .packs__item');

    $('.packs__item').on('mouseover', function() {
      var $packItem = $(this).closest('.packs__item');
      $packItem.addClass('hover');
    });

    $('.packs__item').on('mouseleave', function() {
      $packItems.removeClass('hover');
    });

    selectPackBtn.on('click', function() {
      $packItems.removeClass('active');

      var $packItem = $(this).closest('.packs__item');
      var $plan = $packItem.data('plan');
      var planPrices = {};
      quotePlanPrices.forEach(function(plan) {
        if ($plan === plan['packName']) {
          planPrices = plan;
        }
      });

      $packItem.addClass('active');

      $('.finalized .type-of-package').text($plan);
      $('.finalized .finalized-annually').text('$' + planPrices.netAnnualPremiumIncludingTax + ' ' + currency);
      $('.finalized .finalized-monthly').text('$' + planPrices.downPaymentForMonthlyPlan + ' ' + currency);
      $('.finalized .finalized-monthly-premium').text('$' + planPrices.netMonthlyPremiumIncludingTax + ' ' + currency);
      $('#selectedUChoosePackId').val(planPrices.UChoosePackId);
    });

    $(".step-3 form").submit(function(e) {
      e.preventDefault();
      $(".custom-ajax-loading").show();

      window.isDirty = false;
      // serialize forms and submit...
      $.ajax({
        type: "POST",
        url: "<?php echo get_template_directory_uri() ?>/PMotorAjax.php",
        data: $(".step-1 form").serialize() + "&" + $(".step-2 form").serialize() + "&" + $(".step-3 form").serialize() + "&finalize=1",
        success: function(response) {
          var alld = $(".step-1 form").serialize() + "&" + $(".step-2 form").serialize() + "&" + $(".step-3 form").serialize();
          var country = $('.step-1 select[name=country]').val();
          $(".custom-ajax-loading").hide();
          $(".step-1, .step-2, .step-3").hide();
          $(".finalized").show();
          location.href = "#container";
          
          if (country === 'LE' || country === 'DE') {
            $('.finalized .finalized-payments').hide();
          }

          $.ajax({
            type: "post",
            url: "<?php echo get_template_directory_uri() ?>/sendmailtoadmin.php",
            data: alld,
            success: function(data){
            }
          });
        },
        error: function(response){
          console.log(response);
        },
        dataType: "json"
      });
    });

    $(".go-to-very-last-step").click(function(e) {
      $(".finalized").hide();
      $(".very-last-step").show();

      if(!/(.+)@(.+){2,}\.(.+){2,}/.test($("#email-address2").val())){
        alert("Incorrect email address");
        $("#email-address2").focus();
        e.preventDefault();
        return false;
      }

      if(!$('.packs-wrapper .packs .packs__item.active').length) {
        alert("You need to select one of the packages.");
        $('html, body').animate({
            scrollTop: $('.packs__item.packs__item-basic').offset().top
        }, 800);
        e.preventDefault();
        return false;
      }

      if($("#email-address2").val() !== $("#email_address").val()){
        alert("The email addresses don't match");
        $("#email-address2").focus();
        e.preventDefault();
        return false;
      }
    });

    $("#step-3 .go-to-step-1").click(function(e) {
      e.preventDefault();
      $(".step-2").show();
      $(".step-1, #step-3").hide();
      location.href = "#container";
    });
  });
</script>