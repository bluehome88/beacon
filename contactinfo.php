<?php
/**
 * Template Name: Contact Info Page
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

?>

<div class="contain_main_left">
<div class="about_head_box">
    <div class="about"><?php echo $page_title; ?></div>
    <div class="share_icn">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td valign="middle" width="26%">
                    <div class="share" style="cursor:pointer;"><span class='st_sharethis_custom'
                                                                     st_title='<?php the_title(); ?>'
                                                                     st_url='<?php the_permalink(); ?>'
                                                                     displayText='Share This '> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Share This </span>
                    </div>
                </td>
                <td valign="middle" width="5%"><span class='st_email' st_title='<?php the_title(); ?>'
                                                     st_url='<?php the_permalink(); ?>' displayText=''></span></td>
                <td valign="middle" width="5%"><a href="#" onclick="print();" style="text-decoration:none;"> <img
                            class="icn" src="<?php echo get_template_directory_uri() ?>/images/images/print_icn.png"/>
                    </a></td>
                <td valign="middle" width="5%"> <?php pdf24Plugin_link(); ?> </td>
                <td valign="middle" width="18%"> <?php if (function_exists('fontResizer_place')) {
                        fontResizer_place();
                    } ?></td>
            </tr>
        </table>
    </div>
</div>


<div class="contain_rignt_inner">
    <!--<div id="about_img" style="background: url(<?php echo $imgsrc[0] ;?>);">-->
    <div id="page">
	<table>
	<tr>
	<!--th>Customer Id</th-->
	<th>Name</th>
	<th>Phone</th>
	<th>Email</th>
	<th>Date Created</th>
	</tr>
	
	<?php $Query="Select * from tbl_motor_quotation_details order by cust_id desc";
		  $Res=mysql_query($Query);
		  //$res=mysql_fetch_array($Res);
		  while($ro=mysql_fetch_array($Res))
		  {
		  $date1 = strtotime($ro['created_date']);
		  if($ro['created_date']=='0000-00-00 00:00:00')
		  {
		  $date='0000-00-00';
		  }
		  else
		  {
		  $date = date('Y-m-d', $date1);
		  }
		  
		  ?>
		  <tr>
		  <!--td><?php echo $ro['cust_id'];?></td-->
		  <td><?php echo $ro['cust_name'];?></td>
		  <td><?php echo $ro['cust_phone'];?></td>
		  <td><?php echo $ro['cust_email'];?></td>
		  <td><?php echo $date ;?></td>
		  </tr>
		  <?php
		  }
	?>
	
	</table>
    </div>
</div>
<script>
$(document).ready(function(){
    $("#mystep1").click(function(e){
        if($("#country").val()==""){ alert("Select Country"); $("#country").focus(); e.preventDefault(); return false; }
        if($("#drivername").val()==""){ alert("Provide driver name"); $("#drivername").focus(); e.preventDefault(); return false; }
        if($("#driverexperience").val()==""){ alert("Provide driver experiance"); $("#driverexperience").focus(); e.preventDefault(); return false; }
        if($("#driverclaims").val()==""){ alert("Provide driver claims"); $("#driverclaims").focus();  e.preventDefault(); return false; }
        if($("#sum_insured").val()==""){ alert("Enter Vehicle Sum Insured "); $("#sum_insured").focus();  e.preventDefault(); return false; }
    });
    $("#mystep2").click(function(e){
        if($("#phone").val()==""){ alert("Provide Phone Number"); $("#phone").focus(); e.preventDefault(); return false; }
        if($("#email").val()==""){ alert("Provide Email"); $("#email").focus(); e.preventDefault(); return false; }
    });
});
    var baseQuotation = 0;

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
            $(".finalized").show();
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
                text: "Disclaimer: Please note that the figures quoted are an estimate based only on the information submitted. Final figures will be provided upon completion of a proposal form and submission of the relevant documents."
            },
            style: { classes: 'qtip-bootstrap' }
        });
        $("form input").change(function(e) {
            window.isDirty = true;
        });

        $(".custom-ajax-loading").hide();

        $(".go-to-very-last-step").click(function() {
            $(".finalized").hide();
            $(".very-last-step").show();
        });

        $(".go-to-step-last-step-purchase").click(function() {
            $(".finalized").hide();
            $(".very-last-step-purchase").show();
        });

        $(".resurect").click(function(e) {
            e.preventDefault();
            $(".custom-ajax-loading").hide();
            $(".step-3").hide();
            $(".step-2").show();
            return false;
        });

        var driversAdded = 0;
        $(".add-additional-driver").click(function() {
            driversAdded++;
            if (driversAdded > 3)
                $(".add-additional-driver").hide();
            $("#additional-driver-" + driversAdded).show();
        });

        $(".custom-form label").click(function() {
            $(this).prev().click();
        });

        $(".step-2, .step-3").hide();

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

            if ($(".step-1 form").find("input[name='windscreen_cover']").val().indexOf(",") != -1) {
                $(".comma-error").show();
                return false;
            }

            if ($(".step-1 form").find("input[name='sum_insured']").val().indexOf(".") != -1) {
                $(".comma-error").show();
                return false;
            }

            if ($(".step-1 form").find("input[name='windscreen_cover']").val().indexOf(".") != -1) {
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

        $(".go-to-step-1").click(function(e) {
            e.preventDefault();
            $(".step-1").show();
            $(".step-2, .step-3").hide();
            location.href = "#container";
        });

        $(".step-2 form").submit(function(e) {
            e.preventDefault();

            if (!($("input[name='email']").val()).match(/@/))
            {
                $(".email-error").show();
                return;
            }

            if (!($("input[name='phone']").val()).match(/^[\d|\-|\#|\+|\.|\,]+$/))
            {
                $(".phone-error").show();
                return;
            }

            window.isDirty = false;
            $(".custom-ajax-loading").show();

            // serialize forms and submit...
            $.ajax({
                type: "POST",
                url: "<?php echo get_template_directory_uri() ?>/PMotorAjax.php",
                data: $(".step-1 form").serialize() + "&" + $(".step-2 form").serialize(),
                success: function(response) {
                    alert(response);
                    $(".custom-ajax-loading").hide();
                    $(".step-3").show();
                    $(".step-1, .step-2").hide();
                    location.href = "#container";

                    // show right currency
                    var currency = "ECD";
                    if ($("select[name=country]").val() == "TT")
                        currency = "TTD";
                    if ($("select[name=country]").val() == "BA")
                        currency = "BBD";

                    $(".result-currency").text(currency);

                    if (response.annual == "0") {

                        // special cases. FTS
                        if ($("select[name='driver-experience']").val() == "UND1YR") {
                            // driving experience check
                            $(".unable-to-get-driving-experience").show();
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
        });

        $(".step-3 form").submit(function(e) {
            e.preventDefault();
            $(".custom-ajax-loading").show();

            window.isDirty = false;

            // serialize forms and submit...
            $.ajax({
                type: "POST",
                url: "<?php echo get_template_directory_uri() ?>/PMotorAjax.php",
                data: $(".step-1 form").serialize() + "&" + $(".step-2 form").serialize() + "&" + $(".step-3 form").serialize()+ "&finalize=1",
                success: function(response) {
                    $(".custom-ajax-loading").hide();
                    $(".step-1, .step-2, .step-3").hide();
                    $(".finalized").show();
                    location.href = "#container";
                },
                dataType: "json"
            });
        });

        $(".step-3").on("change", "select", function() {
            var updatedQuotation = parseFloat(baseQuotation);
            var updatedQuotationBenefitsOnly = 0;
            $(".step-3 select").each(function() {
                var value = $(this).val();
                var optionAmount = $(this).find("option[value='"+value+"']").attr("data-amount");
                updatedQuotation += parseFloat(optionAmount);
                updatedQuotationBenefitsOnly += parseFloat(optionAmount);
            });
            $("#annual-result-benefits").text(updatedQuotation.formatMoney(2, '.', ','));
            $("#annual-result-benefits-only").text(updatedQuotationBenefitsOnly.formatMoney(2, '.', ','));
            $("#final_qoute_final_final").text(updatedQuotation.formatMoney(2, '.', ','));
        });
    });
</script>
<style>
.custom-form {
    font-size: 12px;
}

.custom-form input,
.custom-form select {
    font-size: 12px;
}

.padding {
    margin-top: 10px;
}

.driver-selection {
    overflow: hidden;
    margin-top: 10px;
}

.driver-column-1 {
    width: 120px;
    margin-right: 15px;
    float: left;
}

.driver-column-2 {
    width: 60px;
    margin-right: 15px;
    float: left;
}

.driver-column-2 select {
    width: 60px;
}

.driver-column-3 {
    width: 120px;
    margin-right: 15px;
    float: left;
}

.driver-column-3 input {
    width: 120px;
}

.driver-column-4 {
    width: 170px;
    margin-right: 15px;
    float: left;
}

.driver-column-4 select {
    width: 170px;
}

.driver-column-5 {
    width: 170px;
    margin-right: 0px;
    float: left;
}

.driver-column-5 select {
    width: 170px;
}

.gray-info {
    font-size: 11px;
    margin-top: 4px;
    color: #B7B7B7;
}

.required {
    color: #790000;
}

.columns {
    clear: both;
    overflow: hidden;
    margin-top: 10px;
}

.columns .column-1 {
    float: left;
    width: 350px;
}

.columns .column-2 {
    float: left;
    width: 380px;
}

.step-footer {
    margin-top: 10px;
    padding-top: 10px;
    border-top: 1px dotted #CCC;
    overflow: hidden;
    position: relative;
}

.step-footer button,
.step-footer input {
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr = '#10d4ed', endColorstr = '#068acb');
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr = '#10d4ed', endColorstr = '#068acb')";
    background-image: -moz-linear-gradient(top, #10d4ed, #068acb);
    background-image: -ms-linear-gradient(top, #10d4ed, #068acb);
    background-image: -o-linear-gradient(top, #10d4ed, #068acb);
    background-image: -webkit-gradient(linear, center top, center bottom, from(#10d4ed), to(#068acb));
    background-image: -webkit-linear-gradient(top, #10d4ed, #068acb);
    background-image: linear-gradient(top, #10d4ed, #068acb);
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #dddddd;
    height: 37px;
    width: auto;
    color: #FFF;
    cursor: pointer;
    font-weight: bold;
    text-shadow: 0.1em 0.1em 0.02em #0574c1;
    -moz-text-shadow: 0.1em 0.1em 0.02em #0574c1;
    -webkit-text-shadow: 0.1em 0.1em 0.02em #0574c1;
    -o-text-shadow: 0.1em 0.1em 0.02em #0574c1;
    margin: 0 0 0 15px ;
    padding: 0 20px;
}

.options {
    margin-left: 50px;
}

.custom-form .text {
    border: 0;
    background: #D3D3D3;
    border-radius: 14px;
    box-shadow: 2px 2px #B6B2B2 inset;
    margin: 0;
    padding: 0;
    line-height: 28px;
    height: 28px;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    text-indent: 10px;
}

.custom-form select {
    margin: 0;
    padding: 0;
    line-height: 28px;
    height: 28px;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    text-indent: 0px;
}

.add-additional-driver {
    width: auto;
    background-repeat: no-repeat;
    text-indent: 20px;
    margin: 10px 5px 20px 0;
}

#uchoose_options select {
    width: 180px;
}

.custom-ajax-loading {
    width: 28px;
    height: 28px;
    background: url("<?php echo get_template_directory_uri() ?>/images/ajax-loader.gif");
    display: block;
    position: absolute;
    top: 16px;
    right: 10px;
}

.step-3 .custom-ajax-loading {
   /* right: 540px; */
}

.info-text {
    float: left;
}

.info-icon {
    background: url("<?php echo get_template_directory_uri() ?>/images/help_icon.png");
    width: 16px;
    height: 16px;
    display: block;
    float: left;
    margin-right: 5px;
}

.benefit-row-summary {
    float: right;
    font-weight: bold;
}

/* old CSS goes here */

.faq_midle
{
    width:auto !important;
    margin-left:15px !important;
}
.cont_right_text_box
{
    width:auto !important; ;
}
#navi_sub2 ul
{
    height: 40px !important;
}

#navi_sub2 ul li
{
    /*margin:0 34px 0 -29px !important;   */
    height :45px !important;
    max-width : 128px !important;
}

#navi_sub2
{
 height: 26px !important;
 position: relative;
width: 100%; 
  }
           
           
  .contain_main_left > a {
    float: right;
                margin: 0;
                position: relative;
                top: -15px;
                color: #0BAFDC;
                text-decoration:none;
                font-weight:bold;
            }



</style>

</div>

<div id="faq_right_box">
    <?php get_sidebar('video'); ?>
</div>
<?php get_footer(); ?>
