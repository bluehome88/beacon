<?php
/**
 * Template Name: Private Motor Quotation Template
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Beacon 1.0
 */
get_header();
$imgsrc = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "large");

$page_title = get_the_title($post);

$autoMakeModelList = file_get_contents(ABSPATH . '/cron/autoMakeModelList.json');
$distnaceOptionList = file_get_contents(ABSPATH . '/cron/distancesToWorkKm.json');

if ($autoMakeModelList) {
  $autoMakeModelList = json_decode($autoMakeModelList)->getAutoMakeModelListReturn->autoMakeModelList;

  $autoMake = array();
  $autoModel = array();

  foreach ($autoMakeModelList as $list) {
    foreach ($list as $model) {
      $autoMake[] = $model->autoMakeDesc;
    }
  }
  $autoMake = array_unique($autoMake);

  foreach ($autoMake as $make) {
    foreach ($autoMakeModelList as $list) {
      foreach ($list as $model) {
        if ($make === $model->autoMakeDesc) {
          $autoModel[$make][] = $model->autoModelDesc;
        }
      }
    }
  }
}

if ($distnaceOptionList) {
  $distnaceOptionList = json_decode($distnaceOptionList)->getDistanceListReturn->distnaceOptionList;

  $distances = array();

  foreach ($distnaceOptionList as $distnaces) {
    foreach ($distnaces as $distnace) {
      $distances[] = array(
        'desc' => $distnace->distanceDescription,
        'val' => $distnace->distanceValue
      );
    }
  }
}
?>
<!-- Google Analytics Content Experiment code -->
<script>function utmx_section(){}function utmx(){}(function(){var
k='135328534-4',d=document,l=d.location,c=d.cookie;
if(l.search.indexOf('utm_expid='+k)>0)return;
function f(n){if(c){var i=c.indexOf(n+'=');if(i>-1){var j=c.
indexOf(';',i);return escape(c.substring(i+n.length+1,j<0?c.
length:j))}}}var x=f('__utmx'),xx=f('__utmxx'),h=l.hash;d.write(
'<sc'+'ript src="'+'http'+(l.protocol=='https:'?'s://ssl':
'://www')+'.google-analytics.com/ga_exp.js?'+'utmxkey='+k+
'&utmx='+(x?x:'')+'&utmxx='+(xx?xx:'')+'&utmxtime='+new Date().
valueOf()+(h?'&utmxhash='+escape(h.substr(1)):'')+
'" type="text/javascript" charset="utf-8"><\/sc'+'ript>')})();
</script><script>utmx('url','A/B');</script>
<!-- End of Google Analytics Content Experiment code -->

<script>
  autoModelList = <?= json_encode($autoModel); ?>;
</script>
<style>
.column-4-change-new {
  min-height: 39px;
}

</style>
<!--  <script type="text/javascript" src="ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->

  <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/mask.js"></script>
<!--  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"   integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="   crossorigin="anonymous"></script>-->
  <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery.magnific-popup.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.min.css">

  <style>
  .request-callback-overlay {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    overflow: auto;
  }
  .request-callback-overlay__bg {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,.7);
    z-index: 990;
  }
  .request-callback-overlay__wrap {
    width: 1450px;
    height: 100%;
    position: absolute;
    top: 20%;
    z-index: 10;
  }
  
  .request-callback-overlay__wrap {
    position: relative;
  }

  @media only screen and (max-width: 600px) {
    .request-callback-overlay__wrap {
      position: static;
      display: inline-block;
      margin-top: 5%;
      margin-left: 0%;
      left: 0;
      width: auto;
    }
  }

  #callback-pop-up { 
      width: 100%;
      height: 100%;
  }

  </style>
    <div class="request-callback-overlay__bg"></div>
    <div class="request-callback-overlay"> 
        <iframe class="request-callback-overlay__wrap" id="callback-pop-up" allowTransparency="true" src="<?php echo get_template_directory_uri() ?>/request-callback/request-callback.html" frameBorder="0"></iframe>
    </div>
    <script>
      function hidePopup() {
              // Remove iframe.
              $(".request-callback-overlay").hide(); 
              // Remove background overlay.
              $(".request-callback-overlay__bg").hide();
      }
      // Called on window.onload of the iframe
      $("iframe").load(function() {
        // Find continue-box inside iframe and hide iframe onclick.
        $("#callback-pop-up")
          .contents()
          .find(".continue-box")
          .click(hidePopup);
        // Find close button inside iframe and hide iframe onclick.
        $("#callback-pop-up")
          .contents()
          .find("#_form_1_close")
          .click(hidePopup);
        tmp = $("#callback-pop-up").contents();
      });
    </script>


<div class="wrapper-quote">
  <div class="contain_main_left">

    <?php $quote_menu = array(
      'theme_location' => 'quotes',
      'id' => '',
      'container' => 'div',
      'container_class' => 'navi_sub',
      'container_id' => 'navi_sub2',
      'menu_class' => '',
      'menu_id' => '',
      'echo' => true,
      'fallback_cb' => 'wp_page_menu',
      'before' => '',
      'after' => '',
      'link_before' => '',
      'link_after' => '',
      'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
      'depth' => 0,
      'walker' => '',
      'menu' => "quotes",
    ); ?>
    <?php   //wp_nav_menu($quote_menu); ?>

    <div id="navi_sub2" class="navi_sub">
      <div class="logo-div">
        <img src="<?php echo get_template_directory_uri() ?>/images/uchoose-logo-small.png" alt="">
      </div>
      <h2>Motor quotation</h2>
    </div>

    <a href="mailto:uchoosehelp@beacon.co.tt" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/images/icon-question.png" alt=""/></a>
    <div class="contain_rignt_inner" style="background: none!important;">
      <!--<div id="about_img" style="background: url(<?php echo $imgsrc[0] ;?>);">-->
      <div id="page" class="motor-quotation-form">
        <div id="my_data_div"></div>
        <div class="quotation-step-1 step-1"></div>
        <div class="custom-form step-1">



          <!-- ========================STEP 1======================= -->


          <!-- <div style="color: #c00;font-weight: bold;font-size: 18px; line-height: 1.6; margin: 35px 0 45px;text-align: center;">Our quote engine is currently undergoing maintenance.<br> Thank you for your interest in Beacon!</div> -->
          <div class="contain">
            <div class="mandatory">
              <p><span>*</span> fields are mandatory</p>
            </div><!-- mandatory -->
          </div><!--contain -->

          <form novalidate>

            <?php
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i < 10; $i++) {
              $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
            $getrandom =  $randomString;
            ?>

            <input type="hidden" name="getrandom1" value="<?php echo $getrandom; ?>" />

            <div class="contain">
              <div class="country">
                <label for="country"><span>*</span> Country</label>
                <div class="input-block">
                  <select name="country" class="required target" style="width: 260px;" id="country">
                    <option value="" selected="selected">Please select your country</option>
                    <option value="TT">Trinidad and Tobago</option>
                    <option value="BA">Barbados</option>
                    <option value="LE">St. Lucia</option>
                    <option value="DE">Dominica</option>
                  </select>
                  <div class="country-message"><p>If not listed please contact your local office</p></div>
                </div>
              </div><!-- country -->
            </div><!-- contain -->

            <div class="contain">
              <h2 class="dinfo">Driver InFORMATION</h2>
            </div><!-- contain -->

            <div class="driver-information driver-information-1">
              <div class="contain">
                <div class="a-n-g">
                  <div class="age">
                    <label for="age">Age</label>
                    <select name="driver-age" id="age" class="driver-age">
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>
                      <option value="24">24</option>
                      <option value="25">25</option>
                      <option value="26">26</option>
                      <option value="27">27</option>
                      <option value="28">28</option>
                      <option value="29">29</option>
                      <option value="30">30</option>
                      <option value="31">31</option>
                      <option value="32">32</option>
                      <option value="33">33</option>
                      <option value="34">34</option>
                      <option value="35">35</option>
                      <option value="36">36</option>
                      <option value="37">37</option>
                      <option value="38">38</option>
                      <option value="39">39</option>
                      <option value="40">40</option>
                      <option value="41">41</option>
                      <option value="42">42</option>
                      <option value="43">43</option>
                      <option value="44">44</option>
                      <option value="45">45</option>
                      <option value="46">46</option>
                      <option value="47">47</option>
                      <option value="48">48</option>
                      <option value="49">49</option>
                      <option value="50">50</option>
                      <option value="51">51</option>
                      <option value="52">52</option>
                      <option value="53">53</option>
                      <option value="54">54</option>
                      <option value="55">55</option>
                      <option value="56">56</option>
                      <option value="57">57</option>
                      <option value="58">58</option>
                      <option value="59">59</option>
                      <option value="60">60</option>
                      <option value="61">61</option>
                      <option value="62">62</option>
                      <option value="63">63</option>
                      <option value="64">64</option>
                      <option value="65">65</option>
                      <option value="65">66</option>
                      <option value="65">67</option>
                      <option value="65">68</option>
                      <option value="65">69</option>
                      <option value="65">70</option>
                    </select>
                  </div><!-- age -->
                  <div class="name">
                    <label for="drivername"><span class="required">*</span> Name</label>
                    <div class="input-block">
                      <input name="driver-name" id="drivername" type="text" required="required" class="required text" />
                      <div class="gray-info">Max 35 characters</div>
                    </div><!-- input-block -->
                  </div><!-- name -->
                  <div class="gender">
                    <label>Gender</label>
                    <div class="gender__item"  >
                      <input id="gender1" type="radio" name="gender" value="M" checked>
                      <label for="gender1" class="radio">Male</label>
                    </div>
                    <div class="gender__item">
                      <input id="gender2" type="radio" name="gender" value="F">
                      <label for="gender2" class="radio">Female</label>
                    </div>
                  </div><!-- gender -->
                </div><!-- a-n-g -->
              </div><!-- contain -->

              <div class="contain">
                <div class="howlong">
                  <div class="howlong__item">
                    <div class="cell label-wrap">
                      <label><span>*</span> How long have you been a named driver<br>on a motor insurance policy?</label>
                    </div>
                    <div class="cell select-wrap">
                      <select name="driver-experience" id="driverexperience" required="required"><option value="" selected="selected">Please select</option><option value="UND1YR">Under 12 Months</option><option value="PER1YR">1 Year</option><option value="PER2YR">2 Years</option><option value="PER3YR">3 Years</option><option value="PER4YR">4 Years</option><option value="PER5YR">5+ Years</option><!--<option value="PER6YR">6+ Years</option>--></select>
                    </div>
                  </div><!-- howlong__item -->
                  <div class="howlong__item">
                    <div class="cell label-wrap">
                      <label for="driverclaims"><span>*</span> Claims History</label>
                    </div>
                    <div class="cell select-wrap">
                      <select name="driver-claims" id="driverclaims" class="required" required="required"><option value="" selected="selected">Please select</option><option value="CLM12MTHS">Claim(s) in last 12 months</option><option value="NOCLM1YR">No claims for 1 year</option><option value="NOCLM2YR">No claims for 2 years</option><option value="NOCLM3YR">No claims for 3 years</option><option value="NOCLM4YR">No claims for 4 years</option><option value="NOCLM5YR">No claims over 5+ years</option></select>
                    </div>
                  </div><!-- howlong__item -->
                </div><!-- howlong -->
              </div><!-- contain -->
            </div><!-- driver-information -->

            <div class="driver-information driver-information-2" style="display: none;">
              <div class="close-box">x</div>
              <div class="contain">
                <div class="a-n-g">
                  <div class="age">
                    <label for="age">Age</label>
                    <select name="driver-1-age" id="age-2" class="driver-age">
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>
                      <option value="24">24</option>
                      <option value="25">25</option>
                      <option value="26">26</option>
                      <option value="27">27</option>
                      <option value="28">28</option>
                      <option value="29">29</option>
                      <option value="30">30</option>
                      <option value="31">31</option>
                      <option value="32">32</option>
                      <option value="33">33</option>
                      <option value="34">34</option>
                      <option value="35">35</option>
                      <option value="36">36</option>
                      <option value="37">37</option>
                      <option value="38">38</option>
                      <option value="39">39</option>
                      <option value="40">40</option>
                      <option value="41">41</option>
                      <option value="42">42</option>
                      <option value="43">43</option>
                      <option value="44">44</option>
                      <option value="45">45</option>
                      <option value="46">46</option>
                      <option value="47">47</option>
                      <option value="48">48</option>
                      <option value="49">49</option>
                      <option value="50">50</option>
                      <option value="51">51</option>
                      <option value="52">52</option>
                      <option value="53">53</option>
                      <option value="54">54</option>
                      <option value="55">55</option>
                      <option value="56">56</option>
                      <option value="57">57</option>
                      <option value="58">58</option>
                      <option value="59">59</option>
                      <option value="60">60</option>
                      <option value="61">61</option>
                      <option value="62">62</option>
                      <option value="63">63</option>
                      <option value="64">64</option>
                      <option value="65">65</option>
                      <option value="65">66</option>
                      <option value="65">67</option>
                      <option value="65">68</option>
                      <option value="65">69</option>
                      <option value="65">70</option>
                    </select>
                  </div><!-- age -->
                  <div class="name">
                    <label for="drivername-2"><span class="required">*</span> Name</label>
                    <div class="input-block">
                      <input name="driver-1-name" id="drivername-2" type="text" required="required" class="required text" />
                      <div class="gray-info">Max 35 characters</div>
                    </div><!-- input-block -->
                  </div><!-- name -->
                  <div class="gender">
                    <label   >Gender</label>
                    <div class="gender__item" id="gender__item-2">
                      <input id="gender1-2" type="radio" name="gender-1" value="" checked>
                      <label for="gender1-2" class="radio">Male</label>
                    </div>
                    <div class="gender__item">
                      <input id="gender2-2" type="radio" name="gender-1" value="">
                      <label for="gender2-2" class="radio">Female</label>
                    </div>
                  </div><!-- gender -->
                </div><!-- a-n-g -->
              </div><!-- contain -->

              <div class="contain">
                <div class="howlong">
                  <div class="howlong__item">
                    <div class="cell label-wrap">
                      <label><span>*</span> How long have you been a named driver<br>on a motor insurance policy?</label>
                    </div>
                    <div class="cell select-wrap">
                      <select name="driver-1-experience" id="driverexperience-2" required="required"><option value="" selected="selected">Please select</option><option value="UND1YR">Under 12 Months</option><option value="PER1YR">1 Year</option><option value="PER2YR">2 Years</option><option value="PER3YR">3 Years</option><option value="PER4YR">4 Years</option><option value="PER5YR">5+ Years</option><!--<option value="PER6YR">6+ Years</option>--></select>
                    </div>
                  </div><!-- howlong__item -->
                  <div class="howlong__item">
                    <div class="cell label-wrap">
                      <label for="driverclaims-2"><span>*</span> Claims History</label>
                    </div>
                    <div class="cell select-wrap">
                      <select name="driver-1-claims" id="driverclaims-2" class="required" required="required"><option value="" selected="selected">Please select</option><option value="CLM12MTHS">Claim(s) in last 12 months</option><option value="NOCLM1YR">No claims for 1 year</option><option value="NOCLM2YR">No claims for 2 years</option><option value="NOCLM3YR">No claims for 3 years</option><option value="NOCLM4YR">No claims for 4 years</option><option value="NOCLM5YR">No claims over 5+ years</option></select>
                    </div>
                  </div><!-- howlong__item -->
                </div><!-- howlong -->
              </div><!-- contain -->
            </div><!-- driver-information -->

            <div class="driver-information driver-information-3" style="display: none;">
              <div class="close-box">x</div>
              <div class="contain">
                <div class="a-n-g">
                  <div class="age">
                    <label for="age-3">Age</label>
                    <select name="driver-2-age" id="age-3" class="driver-age">
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>
                      <option value="24">24</option>
                      <option value="25">25</option>
                      <option value="26">26</option>
                      <option value="27">27</option>
                      <option value="28">28</option>
                      <option value="29">29</option>
                      <option value="30">30</option>
                      <option value="31">31</option>
                      <option value="32">32</option>
                      <option value="33">33</option>
                      <option value="34">34</option>
                      <option value="35">35</option>
                      <option value="36">36</option>
                      <option value="37">37</option>
                      <option value="38">38</option>
                      <option value="39">39</option>
                      <option value="40">40</option>
                      <option value="41">41</option>
                      <option value="42">42</option>
                      <option value="43">43</option>
                      <option value="44">44</option>
                      <option value="45">45</option>
                      <option value="46">46</option>
                      <option value="47">47</option>
                      <option value="48">48</option>
                      <option value="49">49</option>
                      <option value="50">50</option>
                      <option value="51">51</option>
                      <option value="52">52</option>
                      <option value="53">53</option>
                      <option value="54">54</option>
                      <option value="55">55</option>
                      <option value="56">56</option>
                      <option value="57">57</option>
                      <option value="58">58</option>
                      <option value="59">59</option>
                      <option value="60">60</option>
                      <option value="61">61</option>
                      <option value="62">62</option>
                      <option value="63">63</option>
                      <option value="64">64</option>
                      <option value="65">65</option>
                      <option value="65">66</option>
                      <option value="65">67</option>
                      <option value="65">68</option>
                      <option value="65">69</option>
                      <option value="65">70</option>
                    </select>
                  </div><!-- age -->
                  <div class="name">
                    <label for="drivername-3"><span class="required">*</span> Name</label>
                    <div class="input-block">
                      <input name="driver-2-name" id="drivername-3" type="text" required="required" class="required text" />
                      <div class="gray-info">Max 35 characters</div>
                    </div><!-- input-block -->
                  </div><!-- name -->
                  <div class="gender">
                    <label   >Gender</label>
                    <div class="gender__item"  >
                      <input id="gender1-3" type="radio" name="gender-2" value="" checked>
                      <label for="gender1-3" class="radio">Male</label>
                    </div>
                    <div class="gender__item">
                      <input id="gender2-3" type="radio" name="gender-2" value="">
                      <label for="gender2-3" class="radio">Female</label>
                    </div>
                  </div><!-- gender -->
                </div><!-- a-n-g -->
              </div><!-- contain -->

              <div class="contain">
                <div class="howlong">
                  <div class="howlong__item">
                    <div class="cell label-wrap">
                      <label><span>*</span> How long have you been a named driver<br>on a motor insurance policy?</label>
                    </div>
                    <div class="cell select-wrap">
                      <select name="driver-2-experience" id="driverexperience-3" required="required"><option value="" selected="selected">Please select</option><option value="UND1YR">Under 12 Months</option><option value="PER1YR">1 Year</option><option value="PER2YR">2 Years</option><option value="PER3YR">3 Years</option><option value="PER4YR">4 Years</option><option value="PER5YR">5+ Years</option><!--<option value="PER6YR">6+ Years</option>--></select>
                    </div>
                  </div><!-- howlong__item -->
                  <div class="howlong__item">
                    <div class="cell label-wrap">
                      <label for="driverclaims-3"><span>*</span> Claims History</label>
                    </div>
                    <div class="cell select-wrap">
                      <select name="driver-2-claims" id="driverclaims-3" class="required" required="required"><option value="" selected="selected">Please select</option><option value="CLM12MTHS">Claim(s) in last 12 months</option><option value="NOCLM1YR">No claims for 1 year</option><option value="NOCLM2YR">No claims for 2 years</option><option value="NOCLM3YR">No claims for 3 years</option><option value="NOCLM4YR">No claims for 4 years</option><option value="NOCLM5YR">No claims over 5+ years</option></select>
                    </div>
                  </div><!-- howlong__item -->
                </div><!-- howlong -->
              </div><!-- contain -->
            </div><!-- driver-information -->

            <div class="driver-information driver-information-4" style="display: none;">
              <div class="close-box">x</div>
              <div class="contain">
                <div class="a-n-g">
                  <div class="age">
                    <label for="age-4">Age</label>
                    <select name="driver-3-age" id="age-4" class="driver-age">
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>
                      <option value="24">24</option>
                      <option value="25">25</option>
                      <option value="26">26</option>
                      <option value="27">27</option>
                      <option value="28">28</option>
                      <option value="29">29</option>
                      <option value="30">30</option>
                      <option value="31">31</option>
                      <option value="32">32</option>
                      <option value="33">33</option>
                      <option value="34">34</option>
                      <option value="35">35</option>
                      <option value="36">36</option>
                      <option value="37">37</option>
                      <option value="38">38</option>
                      <option value="39">39</option>
                      <option value="40">40</option>
                      <option value="41">41</option>
                      <option value="42">42</option>
                      <option value="43">43</option>
                      <option value="44">44</option>
                      <option value="45">45</option>
                      <option value="46">46</option>
                      <option value="47">47</option>
                      <option value="48">48</option>
                      <option value="49">49</option>
                      <option value="50">50</option>
                      <option value="51">51</option>
                      <option value="52">52</option>
                      <option value="53">53</option>
                      <option value="54">54</option>
                      <option value="55">55</option>
                      <option value="56">56</option>
                      <option value="57">57</option>
                      <option value="58">58</option>
                      <option value="59">59</option>
                      <option value="60">60</option>
                      <option value="61">61</option>
                      <option value="62">62</option>
                      <option value="63">63</option>
                      <option value="64">64</option>
                      <option value="65">65</option>
                      <option value="65">66</option>
                      <option value="65">67</option>
                      <option value="65">68</option>
                      <option value="65">69</option>
                      <option value="65">70</option>
                    </select>
                  </div><!-- age -->
                  <div class="name">
                    <label for="drivername-4"><span class="required">*</span> Name</label>
                    <div class="input-block">
                      <input name="driver-3-name" id="drivername-4" type="text" required="required" class="required text" />
                      <div class="gray-info">Max 35 characters</div>
                    </div><!-- input-block -->
                  </div><!-- name -->
                  <div class="gender">
                    <label   >Gender</label>
                    <div class="gender__item"  >
                      <input id="gender1-4" type="radio" name="gender-3" value="" checked>
                      <label for="gender1-4" class="radio">Male</label>
                    </div>
                    <div class="gender__item">
                      <input id="gender2-4" type="radio" name="gender-3" value="">
                      <label for="gender2-4" class="radio">Female</label>
                    </div>
                  </div><!-- gender -->
                </div><!-- a-n-g -->
              </div><!-- contain -->

              <div class="contain">
                <div class="howlong">
                  <div class="howlong__item">
                    <div class="cell label-wrap">
                      <label><span>*</span> How long have you been a named driver<br>on a motor insurance policy?</label>
                    </div>
                    <div class="cell select-wrap">
                      <select name="driver-3-experience" id="driverexperience-4" required="required"><option value="" selected="selected">Please select</option><option value="UND1YR">Under 12 Months</option><option value="PER1YR">1 Year</option><option value="PER2YR">2 Years</option><option value="PER3YR">3 Years</option><option value="PER4YR">4 Years</option><option value="PER5YR">5+ Years</option><!--<option value="PER6YR">6+ Years</option>--></select>
                    </div>
                  </div><!-- howlong__item -->
                  <div class="howlong__item">
                    <div class="cell label-wrap">
                      <label for="driverclaims-4"><span>*</span> Claims History</label>
                    </div>
                    <div class="cell select-wrap">
                      <select name="driver-3-claims" id="driverclaims-4" class="required" required="required"><option value="" selected="selected">Please select</option><option value="CLM12MTHS">Claim(s) in last 12 months</option><option value="NOCLM1YR">No claims for 1 year</option><option value="NOCLM2YR">No claims for 2 years</option><option value="NOCLM3YR">No claims for 3 years</option><option value="NOCLM4YR">No claims for 4 years</option><option value="NOCLM5YR">No claims over 5+ years</option></select>
                    </div>
                  </div><!-- howlong__item -->
                </div><!-- howlong -->
              </div><!-- contain -->
            </div><!-- driver-information -->

            <div class="contain">
              <div class="add-drivers">
                <div class="add-additional-driver">Add Additional Drivers</div>
              </div><!-- add-drivers -->
            </div><!-- contain -->

            <script type="text/javascript">
              $(document).ready(function(){
                var driversAdded = 1;
                $(".add-additional-driver").on("click",function() {
                  driversAdded++;
                  if (driversAdded > 3) {
                    $(".add-additional-driver").hide();
                  }
                  if (!$(".driver-information-" + driversAdded).is(':visible')) {
                    $(".driver-information-" + driversAdded).show();
                  }
                });
                $('.driver-information .close-box').click(function(e) {
                  $(this).parent().hide();
                  $(".add-additional-driver").show();
                  driversAdded = 1;
                });
              });
            </script>

            <div class="contain">
              <h2 class="dinfo">vehicle information</h2>
            </div><!-- contain -->

            <div class="contain">
              <div class="howlong">
                <div class="howlong__item">
                  <div class="cell label-wrap">
                    <label><span>*</span> Vehicle Sum Insured </label>
                  </div>
                  <div class="cell select-wrap">
                    <span style="position: absolute; line-height: 34px; display: block;  margin-left: -18px;  font-size: 16px;  font-weight: bold;">$</span> <input name="sum_insured" id="sum_insured" type="text" required="required" class="text" style="width: 260px;" maxlength="7" />
                    <div class="gray-info">Max 7 characters<br> Please do not use commas or full stops</div>
                    <div class="comma-error" style="color: #8B0000;margin-top: 10px;font-size: 11px;display:none">No commas or full stops</div>
                  </div>
                </div><!-- howlong__item -->
              </div><!-- howlong -->
            </div><!-- contain -->

            <div class="contain">
              <div class="vehicle-info clearfix">
                <div class="vehicle-info__item">
                  <label for="vehiclemake">Make</label>
                  <div class="input-block">
                    <select name="vehiclemake" id="vehiclemake" required="required" class="required select" >
                      <option value="" selected>Select Make...</option>
                      <?php
                        foreach ($autoMake as $make) { ?>
                        <option><?= $make ?></option>
                      <?php } ?>
                    </select>
                    <!-- <input name="vehiclemake" id="vehiclemake" type="text" required="required" class="required text" /> -->
                  </div><!-- input-block -->
                </div><!-- vehicle-info__item -->
                <div class="vehicle-info__item vehicle-info__item-model">
                  <label for="vehiclemodel">Model</label>
                  <div class="input-block">
                    <select disabled name="vehiclemodel" id="vehiclemodel" required="required" class="required select" >
                      <option value="">Select Model...</option>
                    </select>
                    <!-- <input name="vehiclemodel" id="vehiclemodel" type="text" required="required" class="required text" /> -->
                  </div><!-- input-block -->
                </div><!-- vehicle-info__item -->
              </div><!-- model -->
            </div><!-- contain -->

            <div class="contain">
              <div class="radio-block">
                <div class="table">
                  <div class="tr">
                    <div class="td">
                      <p>What will your vehicle be used for? </p>
                    </div><!-- td -->
                    <div class="td">
                      <input name="private_use" id="private_use" type="radio" value="true" checked="checked"/>
                      <label for="private_use" class="radio">Personal use</label>
                    </div><!-- td -->
                    <div class="td">
                      <input name="private_use" id="private_use2" type="radio" value="false" />
                      <label  for="private_use2" id="business-prof" class="radio">Business/professional services</label>
                    </div><!-- td -->
                  </div><!-- tr -->
                  <div class="distance-to-work tr" style="display: none;">
                    <div class="td">
                      <p>What's your distance to work per day</p>
                    </div><!-- td -->
                    <div class="td distance-to-work-select">
                      <select name="distanceToWorkKm" id="distanceToWorkKm">
                        <?php
                          foreach ($distances as $distance) { ?>
                            <option value="<?= $distance['val'] ?>"><?= $distance['desc'] ?></option>
                        <?php } ?>
                      </select>
                      <label for="distanceToWorkKm">Kilometres</label>
                    </div><!-- td -->
                  </div><!-- tr -->
                  <div class="tr">
                    <div class="td">
                      <p>Insured has a full time occupation? </p>
                    </div><!-- td -->
                    <div class="td">
                      <input name="full_time_occupation" id="full_time_occupation" type="radio" value="true" checked="checked" />
                      <label for="full_time_occupation" class="radio">Yes</label>
                    </div><!-- td -->
                    <div class="td">
                      <input name="full_time_occupation" id="full_time_occupation2" type="radio" value="false" />
                      <label for="full_time_occupation2" class="radio">No</label>
                    </div><!-- td -->
                  </div><!-- tr -->
                  <div class="tr">
                    <div class="td">
                      <p>Insured is first time vehicle owner? </p>
                    </div><!-- td -->
                    <div class="td">
                      <input name="first_owner" id="first_owner" type="radio" value="true" />
                      <label for="first_owner" class="radio">Yes</label>
                    </div><!-- td -->
                    <div class="td">
                      <input name="first_owner" id="first_owner2" type="radio" value="false" checked="checked"/>
                      <label for="first_owner2" class="radio">No</label>
                    </div><!-- td -->
                  </div><!-- tr -->
                  <div class="tr">
                    <div class="td">
                      <p>Has the vehicle been manufactured<br>within the last 7 years? </p>
                    </div><!-- td -->
                    <div class="td" align="right">
                      <input name="registered_within" id="registered_within" type="radio" value="true" checked="checked" />
                      <label for="registered_within" class="radio">Yes</label>
                    </div><!-- td -->
                    <div class="td">
                      <input name="registered_within" id="registered_within2" type="radio" value="false" />
                      <label for="registered_within2" class="radio">No</label>
                    </div><!-- td -->
                  </div><!-- tr -->
                </div><!-- table -->
              </div><!-- radio-block -->
            </div><!-- contain -->

            <div class="contain antitheft-wrap">
              <p>Is the vehicle equipped with an Anti-theft system?</p>
              <div class="antitheft">
                <div class="antitheft__item">
                  <input id="Anti-theft1" type="radio" name="alarm" value="none" checked="checked">
                  <label for="Anti-theft1" class="radio">None</label>
                </div><!-- antitheft__item -->
                <div class="antitheft__item">
                  <input id="Anti-theft2" type="radio" name="alarm" value="locator">
                  <label for="Anti-theft2" class="radio">Alarm / Immobilizer</label>
                </div><!-- antitheft__item -->
                <div class="antitheft__item">
                  <input id="Anti-theft3" type="radio" name="alarm" value="recovery">
                  <label for="Anti-theft3" class="radio">Alarm/GPS/Recovery (Car Search)</label>
                </div><!-- antitheft__item -->
              </div><!-- antitheft -->
            </div><!-- contain -->

            <input name="dealer_invoice" type="hidden" value="true" />
            <input name="new_vehicle" type="hidden" value="true" />
            <input name="over_one_year" type="hidden" value="true" />
            <input name="has_valuation" type="hidden" value="true" />
            <input name="locator_gps" type="hidden" value="false" />
            <input name="immobilizer" type="hidden" value="false" />

            <!-- <div class="mandatory-error" style="color: #8B0000;margin-top: 10px;font-size: 11px;display:none">Please fill the mandatory fields</div> -->

            <div class="step-footer">
              <input type="submit" id="mystep1" value="Continue" onclick="ga('send','pageview', '/stepA1completed.html');"/>
            </div><!-- step-footer -->
          </form>
        </div><!-- step1 -->





        <!-- ========================STEP 2======================= -->


        <div class="quotation-step-2 step-2"></div>
        <div class="custom-form step-2">

          <div class="contain">
            <div class="mandatory">
              <p><span>*</span> fields are mandatory</p>
            </div><!-- mandatory -->
          </div><!--contain -->

          <form novalidate>

            <div class="contain">
              <div class="fullname">
                <div class="tr">
                  <div class="td">
                    <label for="full_name"><span>*</span> Full name</label>
                  </div>
                  <div class="td">
                    <input name="full_name" id="full_name" type="text" class="text" placeholder="John F Gorgory" />
                    <input type="hidden" id="fom1" name="fom1" value="1"/>
                    <input type="hidden" name="getrandom2" value="--><?php echo $getrandom; ?>" />
                  </div>
                </div>
              </div><!-- fullname -->

              <div class="mobile">
                <div class="tr">
                  <div class="td"><label for="mobile"><span>*</span> Mobile phone</label></div>
                  <div class="td">
                    <div class="input-block">
                      <input name="mobilePhone" value="" required="required" placeholder="0123466789" id="mobilePhone" type="text" class="text"/>
                      <p class="country-message">Area code must be entered</p>
                    </div>
                  </div>
                </div>
              </div><!-- mobile -->

              <div class="email-address">
                <div class="tr">
                  <div class="td"><label for="email_address"><span>*</span> Email address</label></div>
                  <div class="td">
                    <div class="input-block">
                      <input name="email" value="" required="required" placeholder="johnFG@email.com" id="email_address" type="text" class="text" />
                    </div>
                  </div>
                </div>
              </div><!-- email-address -->
            </div><!-- contain -->

            <div class="contain step-2-footer">
              <div class="step-footer">
                <button class="go-to-step-1" type="button">Previous</button>
                <input type="submit" id="mystep2" value="Click to see your coverage options" onclick="ga('send','pageview', '/stepA2completed.html');"/>
              </div><!-- step-footer -->
              <div class="custom-ajax-loading"></div>
            </div><!-- contain -->

          </form>
        </div><!-- custom step 2 -->


        <!-- ========================STEP 3======================= -->

        <div id="step-3"></div>

        <!-- THANKS BLOCK -->

        <div class="finalized" style="display: none">
          <div class="quotation-step-3"></div>
          <div class="quotation_result_detail padding">
            <div class="contain">
              <h2>Thank you for letting us quote!</h2>
              <p>The <span class="type-of-package">Premium</span> plan can be started at an annual premium of</p>
              <span class="finalized-annually">$2500</span>
              <p class="finalized-payments">or an initial payment of<br>
                <span class="finalized-monthly">$100</span> with 9 monthly payments of <b class="finalized-monthly-premium">$89</b>
              </p>
              <p class="finalized-desc">
                Disclaimer: Please note that the figures quoted are an estimate based only on the information
                submitted and assumes that the vehicle being insured is not a left-hand drive or a sports car.
                Final figures will be provided upon completion of a proposal form and submission of the relevant
                documents. Quote is valid for 30 days from date of issue.
              </p>
            </div><!-- contain -->
          </div><!-- quotation_result_detail -->
        </div><!-- finalized -->

        <script>
        jQuery(document).ready(function ($) {
          $(document).on('click', '.popup__close', function (e) {
            e.preventDefault();
            $.magnificPopup.close();
          });
        });
        </script>


        <!-- ======= end popup ========= -->

      </div><!-- page -->
    </div><!-- contain-right-inner -->
    <script>

      jQuery(function($) {

        $.mask.definitions['~']='[+-]';

        $('#country').on('change', function (e) {
          var optionSelected = this.value ;

          if(optionSelected =='TT')
          {

            $("#mobilePhone").mask("(868) 999-9999",{placeholder:" "});
            // $('#mobilePhone').mask('(868) 999-9999');
            $("#phone").mask("(868) 999-9999",{placeholder:" "});
            $("#homePhone").mask("(868) 999-9999",{placeholder:" "});

          }
          else if(optionSelected =='DE')
          {
            {
              $("#mobilePhone").mask("(767) 999-9999",{placeholder:" "});
              // $('#mobilePhone').mask('(868) 999-9999');
              $("#phone").mask("(767) 999-9999",{placeholder:" "});
              $("#homePhone").mask("(767) 999-9999",{placeholder:" "});
            }
          }
          else if(optionSelected =='BA')
          {
            $("#mobilePhone").mask("(246) 999-9999",{placeholder:" "});
            $("#phone").mask("(246) 999-9999",{placeholder:" "});
            $("#homePhone").mask("(246) 999-9999",{placeholder:" "});
          }
          else if(optionSelected =='LE')
          {
            $("#mobilePhone").mask("(758) 999-9999",{placeholder:" "});
            $("#phone").mask("(758) 999-9999",{placeholder:" "});
            $("#homePhone").mask("(758) 999-9999",{placeholder:" "});
          }

        });
      });

      $(document).ready(function(){


        $("#mystep1").click(function(e){
          if($("#country").val()==""){ alert("Select Country"); $("#country").focus(); e.preventDefault(); return false; }
          if($("#drivername").val()==""){ alert("Provide driver name"); $("#drivername").focus(); e.preventDefault(); return false; }
          if($("#driverexperience").val()==""){ alert("Provide driver experiance"); $("#driverexperience").focus(); e.preventDefault(); return false; }
          if($("#driverclaims").val()==""){ alert("Provide driver claims"); $("#driverclaims").focus();  e.preventDefault(); return false; }
          if($("#sum_insured").val()==""){ alert("Enter Vehicle Sum Insured "); $("#sum_insured").focus();  e.preventDefault(); return false; }
          if (isNaN($('#sum_insured').val())) {
            alert("Vehicle Sum Insured field should contain only digits");
            $("#sum_insured").focus();
            e.preventDefault();
            return false;
          }
          for(var i = 2; i < 5; i++) {
            if ($('.driver-information-' + i).is(':visible')) {
              if (!$('#drivername-' + i).val()) {
                alert("Provide Additional driver name");
                $("#drivername-" + i).focus();
                e.preventDefault();
                return false;
              }
              if (!$('#driverexperience-' + i).val()) {
                alert("Provide Additional driver experiance");
                $("#driverexperience-" + i).focus();
                e.preventDefault();
                return false;
              }
              if (!$('#driverclaims-' + i).val()) {
                alert("Provide Additional driver claims");
                $("#driverclaims-" + i).focus();
                e.preventDefault();
                return false;
              }
            }
          }

          if (!$('#vehiclemake').val()) {
            alert("Select Make and Model");
            $('html, body').animate({
                scrollTop: $(".vehicle-info__item").offset().top - 180
            }, 500);
            e.preventDefault();
            return false;
          }

        });
        $("#mystep2").click(function(e){
            if($("#mobilePhone").val()==""){ alert("Provide Mobile Number"); $("#mobilePhone").focus(); e.preventDefault(); return false; }
            if($("#email_address").val()==""){ alert("Provide Your Email"); $("#email_address").focus(); e.preventDefault(); return false; }
            if(!/(.+)@(.+){2,}\.(.+){2,}/.test($("#email_address").val())){ alert("Incorrect email address"); $("#email_address").focus(); e.preventDefault(); return false; }
        });
        $("#mobilePhone").focus(function(){
           $(this).removeAttr('placeholder');
        });
      });
      var baseQuotation = 0;
//
      window.isDirty = false;
      window.onbeforeunload = function(event) {
        if (window.isDirty)
          return 'It looks like you have been editing something' +
            ' - if you leave before saving, then your changes will be lost.';
        else
          return undefined;
      };

      Number.prototype.formatMoney = function(c, d, t){
        var n = this,
            c = isNaN(c = Math.abs(c)) ? 2 : c,
            d = d == undefined ? "." : d,
            t = t == undefined ? "," : t,
            s = n < 0 ? "-" : "",
            i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
            j = (j = i.length) > 3 ? j % 3 : 0;
        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
      };

      function load_uchoose_options(options) {
        $("#uchoose_options").empty();

        if (options.length == 0) {
          $(".uchoose-extension").hide();
          // $(".finalized").show();
        }

        for (var i = 0; i < options.length; i++) {
          var select = $("#" + options[i].group_code);

          if (select.length == 0) {
            var columns = $("<div>").addClass("columns");
            var column1 = $("<div>").addClass("column-1");
            var column2 = $("<div>").addClass("column-2");

            var text = $("<span>").addClass("info-text").text(options[i].desc);
            var info = $("<span>").addClass("info-icon");
            column1.append(info);
            column1.append(text);

            info.qtip({
              content: {
                text: options[i].long_desc
              },
              style: { classes: 'qtip-bootstrap' }
            });

            text.qtip({
              content: {
                text: options[i].long_desc
              },
              style: { classes: 'qtip-bootstrap' }
            });

            // yes no radioboxes
            var radioYes = $("<input>").attr("type", "radio").attr("name", "radio_" + options[i].group_code);
            var radioNo = $("<input>").attr("type", "radio").attr("name", "radio_" + options[i].group_code).attr("checked", "checked");


            var amountExtra = "";
            var optionsCount = 0;
            for (var j = 0; j < options.length; j++) {
              if (options[j].group_code == options[i].group_code) {
                optionsCount++;
                amountExtra = " (+$" + options[j].amount + ")";
              }
            }

            if (optionsCount != 2)
              amountExtra = "";

            column2.append(radioNo);
            column2.append($("<label>").text("No").click(function() { $(this).prev().click(); }).css("margin-right", "10px"));
            column2.append(radioYes);
            column2.append($("<label>").text("Yes" + amountExtra).click(function() { $(this).prev().click(); }));

            radioYes.click(function() {
              var select = $(this).parent().find("select");

              select.val(select.find("option").eq(1).attr("value"));
              select.trigger("change");

              // hide info
              var info = $(this).parent().find(".benefit-row-summary");

              if (select.find("option").length == 2) {
                // get amount of selection
                var value = select.val();
                var optionAmount = select.find("option[value='"+value+"']").attr("data-amount");

                info.text("+$" + optionAmount + "");
                info.show();
              }
              else {
                select.find("option").eq(0).hide();
                select.show();
              }

            });

            radioNo.click(function() {
              var select = $(this).parent().find("select");

              select.val(select.find("option").eq(0).attr("value"));
              select.trigger("change");

              if (select.find("option").length == 2) {
              }
              else {
                select.find("option").eq(0).show();
                select.hide();
              }

              // hide info
              var info = $(this).parent().find(".benefit-row-summary");
              info.hide();
            });

            // select
            select = $("<select>").attr("id", options[i].group_code).attr("name", "uchoose_" + options[i].group_code).css("margin-top", "0px").css("float", "right");
            column2.append(select);
            select.hide();

            var info = $("<span>").addClass("benefit-row-summary");
            column2.append(info);
            info.hide();

            columns.append(column1);
            columns.append(column2);
            $("#uchoose_options").append(columns);
          }

          var option = $("<option>").attr("value", options[i].code).text(options[i].option + " (+$"+options[i].amount +")").attr("data-amount", options[i].amount);
          select.append(option);
        }
      }

      $(document).ready(function() {




        $("#final_qoute_final_final,#annual-result-benefits,#annual-result-benefits-only,#annual-result").qtip({
          content: {
            text: "Disclaimer: Please note that the figures quoted are an estimate based only on the" +
            " information submitted and assumes that the vehicle being insured is not a left-hand drive or" +
            " a sports car. Final figures will be provided upon completion of a proposal form and submission of" +
            " the relevant documents."
          },
          style: { classes: 'qtip-bootstrap' }
        });
        $("form input").change(function() {
          window.isDirty = true;
        });

        $(".custom-ajax-loading").hide();

        $(".go-to-step-last-step-purchase").click(function() {
          $(".finalized").hide();
          $(".very-last-step-purchase").show();
        });



        $(".custom-form label").click(function() {
          $(this).prev().click();
        });

        $(".step-2, .step-3").hide();

        var step3Loaded = false;
        var step1Modified = false;

        $(".step-1 form input, .step-1 form textarea, .step-1 form select").change(function() {
          step1Modified = true;
        });

        $(".step-2 .go-to-step-1").click(function(e) {
          e.preventDefault();
          $(".step-1").show();
          $(".step-2, #step-3").hide();
          location.href = "#container";
        });



        $(".step-1 form").submit(function(e) {

          e.preventDefault();

          $(".comma-error").hide();
          $(".mandatory-error").hide();

          $(".step-1 form").find("select[required='required'],input[required='required']").each(function() {
            if ($(this).val() == "") {
              $(".mandatory-error").show();
              return false;
            }
          });

          if ($(".step-1 form").find("select[name='country']").val() == "") {
            $(".mandatory-error").show();
            return false;
          }
          if ($(".step-1 form").find("input[name='sum_insured']").val().indexOf(",") != -1) {
            $(".comma-error").show();
            return false;
          }

          if ($(".step-1 form").find("input[name='sum_insured']").val().indexOf(".") != -1) {
            $(".comma-error").show();
            return false;
          }

          $(".step-2").show();
          $(".step-1, .step-3").hide();

          // copy name to second step
          if ($("input[name='full_name']").val() == "")
            $("input[name='full_name']").val($("input[name='driver-name']").val());
          location.href = "#container";
        });

        $('#private_use').change(function() {
          if ($(this).is(':checked')) {
            $('.distance-to-work').hide();
          }
        });
        $('#private_use2').change(function() {
          if ($(this).is(':checked')) {
            $('.distance-to-work').show();
          }
        });

        $(".step-2 form").submit(function(e) {
          e.preventDefault();

          // if (!($("input[name='email']").val()).match(/@/))
          // {
          //   $(".email-error").show();
          //   return;
          // }
          /*
           if (!($("input[name='phone']").val()).match(/^[\d|\-|\#|\+|\.|\,]+$/))
           {
           $(".phone-error").show();
           return;
           }
           if (!($("input[name='homePhone']").val()).match(/^[\d|\-|\#|\+|\.|\,]+$/))
           {
           $(".phone-error").show();
           return;
           }
           if (!($("input[name='mobilePhone']").val()).match(/^[\d|\-|\#|\+|\.|\,]+$/))
           {
           $(".phone-error").show();
           return;
           }
           */
          window.isDirty = false;
          $(".custom-ajax-loading").show();

          window.quotePlanPrices = {};
          if (step1Modified || !step3Loaded) {
            var alld = $(".step-1 form").serialize() + "&" + $(".step-2 form").serialize();
            // serialize forms and submit...
            $.ajax({
              type: "POST",
              url: "<?php echo get_template_directory_uri() ?>/PMotorAjax.php",
              data: alld + "&step2_completed=1&form=origin",
              success: function(response) {
                step1Modified = true;
                step3Loaded = true;

                quotePlanPrices = response.json;

                $("#step-3").show();
                $('#step-3').html(response.step3_html);

                if (response.not_suitable) {
                  $(".custom-ajax-loading").hide();
                  $(".step-2").hide();
                  location.href = "#container";

                  $.ajax({
                    type: "post",
                    url: "<?php echo get_template_directory_uri() ?>/sendmailtoadmin.php",
                    data: alld,
                    success: function(data){
                    }
                  });
                  return;
                }


                $(".custom-ajax-loading").hide();
                $(".step-3").show();
                $(".step-1, .step-2").hide();
                location.href = "#container";
                $('#annual-result-benefits-only').html('0.00');

                // show right currency
                var currency = "ECD";
                if ($("select[name=country]").val() == "TT")
                  currency = "TTD";
                //                    if ($("select[name=country]").val() == "DE")
                //                        currency = "BBD";
                if ($("select[name=country]").val() == "BA")
                  currency = "BDS";
                if ($("select[name=country]").val() == "LE")
                  currency = "ECD";

                $(".result-currency").text(currency);

                if (($("select[name='driver-experience']").val() == "UND1YR" && $("select[name='driver-claims']").val() == "CLM12MTHS") ||
                  response.annual==0 ||
                  ($("input[name='private_use']:checked").val()=='false' && $("input[name='full_time_occupation']:checked").val()=='false' && $("input[name='first_owner']:checked").val()=='false' && $("input[name='registered_within']:checked").val()=='false')
                ) { //response.annual == "0" ||
                  // special cases. FTS
                  if (($("select[name='driver-experience']").val() == "UND1YR" && $("select[name='driver-claims']").val() == "CLM12MTHS") ||
                    response.annual==0) {
                    // driving experience check
                    //$(".unable-to-get-driving-experience").show();
                    $(".unable-to-get").show();
                  }
                  else if ($("select[name='driver-claims']").val() == "CLM12MTHS") {
                    // no claims
                    $(".unable-to-get-no-claims").show();
                  }
                  else {
                    $(".unable-to-get").show();
                  }
                  $(".able-to-get").hide();
                }
                else {
                  $(".unable-to-get").hide();
                  $(".able-to-get").show();

                  baseQuotation = parseFloat(response.annual);
                  $("#annual-result").text(baseQuotation.formatMoney(2, '.', ','));
                  $("#annual-result-benefits").text(baseQuotation.formatMoney(2, '.', ','));
                  $("#final_qoute_final_final").text(baseQuotation.formatMoney(2, '.', ','));

                  load_uchoose_options(response.uchoose);
                }
                $("#fom1").val(2);
              },
              dataType: "json"
            });
          } else {
            $(".custom-ajax-loading").hide();
            $(".step-3").show();
            $(".step-1, .step-2").hide();
            location.href = "#container";
          }

        });

        // $(".step-3").on("change", "select", function() {
        //       var updatedQuotation = parseFloat(baseQuotation);
        //       var updatedQuotationBenefitsOnly = 0;
        //       $(".step-3 select").each(function() {
        //         var value = $(this).val();
        //         var optionAmount = $(this).find("option[value='"+value+"']").attr("data-amount");
        //         updatedQuotation += parseFloat(optionAmount);
        //         updatedQuotationBenefitsOnly += parseFloat(optionAmount);
        //       });
        //       $("#annual-result-benefits").text(updatedQuotation.formatMoney(2, '.', ','));
        //       $("#annual-result-benefits-only").text(updatedQuotationBenefitsOnly.formatMoney(2, '.', ','));
        //       $("#final_qoute_final_final").text(updatedQuotation.formatMoney(2, '.', ','));
        //     });
        //   });
      });
 </script>

  </div>

  <div id="faq_right_box">
    <?php get_sidebar('video'); ?>
  </div>
</div><!-- wrapper-quote -->



  <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery.magnific-popup.min.js"></script>
  <script>

    jQuery(document).ready(function ($) {
      $("#vehiclemake").chosen({no_results_text: "Nothing found!"})
        .change(function(e) {
          var models = autoModelList[$(this).val()];

          var options = '';
          models.forEach(function(model) {
            options += '<option value="' + model + '">' + model + '</option>';
          });

          $('#vehiclemodel')
            .html(options)
            .attr('disabled', false)
            .val(models[0])
            .trigger("chosen:updated");

        });
      $("#vehiclemodel").chosen({no_results_text: "Nothing found!"});
      $("#distanceToWorkKm").chosen({no_results_text: "Nothing found!"});
    });

  </script>


<?php get_footer(); ?>
