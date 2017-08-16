<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require($_SERVER['DOCUMENT_ROOT'] . "/postmark.php");

$postmark = new Postmark("9595db31-db48-456a-bab1-f1bea6843d92", "uchoosehelp@beacon.co.tt");

$box =  ($_REQUEST);
 
$alldata = '';
foreach($box as $key => $value) {
  $alldata  .= $key ." =  ".$value."<br>";
}

$to = "uchoosehelp@beacon.co.tt";
$subject = "U Choose Motor quotation";
$message = $alldata;

if($postmark->to($to)->subject($subject)->html_message($message)->send()) {
  echo "Message sent successfully..."; 
} else {
  echo "Message could not be sent...";
}
