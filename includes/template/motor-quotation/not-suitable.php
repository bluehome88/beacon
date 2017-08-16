<div class="finalized finalized-failed" style="display:block">
  <div class="quotation-step-3"></div>
  <div class="quotation_result_detail padding">
    <div class="contain">
        <div class="padding gform_heading unable-to-get" style="">
            <span class="gform_description"><?= $message ?></span>

            <div class="step-footer">
                <button class="resurect">Back</button>
            </div>
        </div>
    </div><!-- contain -->
  </div><!-- quotation_result_detail -->
</div>
<script>
    $(".resurect").click(function(e) {
      e.preventDefault();
      $(".custom-ajax-loading").hide();
      $("#step-3").hide();
      $(".step-2").hide();
      $(".step-1").show();
      return false;
    });
</script>