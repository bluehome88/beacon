<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<link href="[PATH]/css/design.css" rel="stylesheet" type="text/css"/>-->
<style type="text/css">
.mainBody 
{
font-size:16px;
color:#206699;
	
}
.content 
{
	border:1px solid #206699;
	font-size:14px;
	color:#206699;
}
.content td
{
	font-size:14px;
	color:#206699;
}
body,td { color:#2f2f2f; font:11px/1.35em Verdana, Arial, Helvetica, sans-serif; }

.mainTable{
	margin-top:10px; 
	font:11px/1.35em Verdana, Arial, Helvetica, sans-serif; 
	margin-bottom:10px;
	background-color:#FFFFFF
}
.innerTable
{
	color:#000000;
	font-size:12px;
}
.header
{
	color:#206699;
	font-size:14px;
}
.footer
{
	color:#206699;
	font-size:14px;
}
.orderDate{
border-bottom:2px solid #eee; 
font-size:1.05em;
 padding-bottom:1px;
}
.addressLabel{
padding:5px 9px 6px 9px; 
border:1px solid #bebcb7; 
border-bottom:none; 
line-height:1em;
}
.addressDetail{
padding:7px 9px 9px 9px; 
border:1px solid #bebcb7; 
border-top:0; 
background:#f8f7f5;
}
.tableBorder{
border:1px solid #bebcb7; 
background:#f8f7f5;
}
.paddingTd{
padding:3px 9px;
}

.shippingClassShow{
display:'';
}
.shippingClassHide{
display:none;
}

</style>
</head>
<body>
<table cellspacing="0" cellpadding="0" border="0" width="98%"  style="margin-top:10px; font:11px/1.35em Verdana, Arial, Helvetica, sans-serif;	margin-bottom:10px;	background-color:#FFFFFF">
<tr>
    <td align="left" valign="top">
        <table cellspacing="0" cellpadding="0" border="0" width="740" style="display:[HEADER_HIDE]">
            <tr>
                <td valign="top"><a href="[PATH]">[SITE_LOGO]</a></td>
            </tr>
        </table>
        <table cellspacing="0" cellpadding="0" border="0" width="740">
			<tr>
			    <td valign="top">

			        <p>
			            <strong>Hello [CUST_NAME]</strong>,<br/><br/>
			            [HEADER]<br />
			            You can check the status of your order by <a href="[PATH]/myaccount.php" style="color:#1E7EC8;">logging into your account</a>.</p>
					<p>Your order confirmation is below. Thank you again for your business.</p>

					<h3  style="border-bottom:2px solid #eee;font-size:1.05em; padding-bottom:1px;">
					Your Order Reference #[ORDER_REFERENCE_NO] <small>(placed on [ORDER_DATE] )</small></h3>
					<br/>
                     <table cellspacing="0" cellpadding="0" border="0">
	            <thead>
                    <tr>
                            <th align="left" width="310px"  bgcolor="#d9e5ee"   style="padding:5px 9px 6px 9px;border:1px solid #bebcb7;border-bottom:none; line-height:1em;display:[SHIPPING_METHOD_HIDE]">[SHIPPING_METHOD_LEBEL]</th>
							<th width="5%"></th>

                            <th align="left" width="310px" bgcolor="#d9e5ee"   style="padding:5px 9px 6px 9px;border:1px solid #bebcb7;border-bottom:none; line-height:1em;display:[PAYMENT_METHOD_HIDE]">[PAYMENT_METHOD_LEBEL]</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td valign="top" align="left"  style="padding:7px 9px 9px 9px; border:1px solid #bebcb7;border-top:0; 
background:#f8f7f5;display:[SHIPPING_METHOD_HIDE]">[SHIPPING_METHOD]
                            </td>

                            <td>&nbsp;</td>
                            <td valign="top" align="left"  style="padding:7px 9px 9px 9px; border:1px solid #bebcb7;border-top:0; 
background:#f8f7f5;display:[PAYMENT_METHOD_HIDE]">[PAYMENT_METHOD]
                            </td>
                             </tr>
                        </tbody>
                    </table><br />
                    <table cellspacing="0" cellpadding="0" border="0">
	            <thead>
                    <tr>
                            <th align="left" width="310px" bgcolor="#d9e5ee"  style="padding:5px 9px 6px 9px;border:1px solid #bebcb7;border-bottom:none; line-height:1em;">[BILLING_LABEL]</th>
							<th width="5%"></th>

                            <th align="left" width="310px" bgcolor="#d9e5ee"   style="padding:5px 9px 6px 9px;border:1px solid #bebcb7;border-bottom:none; line-height:1em;display:[SHIPPING_HIDE];" >[SHIPPING_LABEL]</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td valign="top" align="left"   style="padding:7px 9px 9px 9px; border:1px solid #bebcb7;border-top:0; 
background:#f8f7f5;">[BILLING_DETAIL]
                            </td>

                            <td>&nbsp;</td>
                            <td valign="top" align="left" style="padding:7px 9px 9px 9px; border:1px solid #bebcb7;border-top:0; 
background:#f8f7f5;display:[DELIVERY_HIDE];"  >[DELIVERY_DETAIL]
                            </td>
                             </tr>
                        </tbody>
                    </table><br>					
              <table cellspacing="0" cellpadding="0" border="0" width="100%"  style="border:1px solid #bebcb7;background:#f8f7f5;">
			    <thead>
        			<tr>
		            <th align="left" bgcolor="#d9e5ee"  style="padding:3px 9px;">Item</th>
		            <th align="center" bgcolor="#d9e5ee"  style="padding:3px 3px;">Qty</th>

        		    <th align="right" bgcolor="#d9e5ee"  style="padding:3px 9px;">Subtotal</th>
			        </tr>
			    </thead><tbody bgcolor="#eeeded">
                		[ITEM_DETAIL]
                </tbody><tfoot><tr>

	                    <td colspan="2" align="right"  style="padding:3px 9px;"><b>Subtotal</b></td>
    	                <td align="right"  style="padding:3px 9px;">
						<span class="price">[SUB_TOTAL]</span></td>
                  		</tr>
                        [SHIPPING]
                        [INSURANCE]
                        <tr bgcolor="#DEE5E8">
                     <td colspan="2" align="right"  style="padding:3px 9px;"><strong><big>Grand Total</big></strong></td>
                     <td align="right"  style="padding:3px 9px;"><strong><big>
					 <span class="price">[GRAND_TOTAL]</span></big></strong></td>

                 	</tr></tfoot>
			</table>
             <br/>
	            [FOOTER]</p>
	            </td>
	        </tr>
	    </table>
		</td>

		</tr>
	</table>
