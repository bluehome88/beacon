<?php
require_once("../../../wp-load.php");

global $wpdb;
$wpdb->show_errors = TRUE;
function get_motor_quotation($params) {   
    $wsdl_path = ABSPATH . 'MarketingService.wsdl';
    if (ENV === 'development') {
        $wsdl_path = ABSPATH . 'MarketingService.dev.wsdl';
    }

    try {
        $client = new SoapClient($wsdl_path, array('trace'=>1,'exceptions'=>1, 'features'=> 1));

        // var_dump($client->__getTypes());
        //  var_dump($client->__getFunctions());

        $result = $client->__soapCall('getAutoQuote',array('getAutoQuote'=> $params));
    }
    catch (Exception $e)
    {  
        print_r($e);
        $xmlResponse = $client->__getLastResponse();
        $xmlRequest = $client->__getLastRequest();
        print_r($params);
        print 'REQ' . $xmlRequest . "\n\n";
        print 'RESRPONSE' . $xmlResponse . "\n\n";
        print ABSPATH."/MarketingService.wsdl";
        die();
    }

    $xmlRequest = $client->__getLastRequest();

    // read response manually because of stupid soap php library or stupid soap in general.
    // it seems like it can not parse array of <UChooseAvailableOptions><UChooseAvailableOptions>..
    // and returns empty array instead... so we have to parse it out from xml manually
    $xmlResponse = $client->__getLastResponse();
    $doc = new DOMDocument();
    $doc->loadXML($xmlResponse);
    $uChooseOptions = array();

    $UChoosePackList = json_decode(file_get_contents('../../../cron/UChoosePackList.json'));
    $packList = $GLOBALS['packList'] = $UChoosePackList->getUChoosePackListReturn;

    $packNames = array();
    foreach ($packList->packs->item as $pack) {
        $packNames[] = strtolower($pack->UChoosePackName);
    }
    $packNames = $GLOBALS['packNames'] = array_unique($packNames);

    $autoQuotes = $doc->getElementsByTagName('getAutoQuoteReturn');
    $plans = array();
    $i=0;
    foreach ($autoQuotes as $autoQuote) {
        $plans[] = array(
            'packName' => $packNames[$i],
            'netAnnualPremiumIncludingTax' => number_format($autoQuote->getElementsByTagName('netAnnualPremiumIncludingTax')->item(0)->nodeValue, 2, '.', ','),
            'downPaymentForMonthlyPlan' => number_format($autoQuote->getElementsByTagName('downPaymentForMonthlyPlan')->item(0)->nodeValue, 2, '.', ','),
            'netMonthlyPremiumIncludingTax' => number_format($autoQuote->getElementsByTagName('netMonthlyPremiumIncludingTax')->item(0)->nodeValue, 2, '.', ','),
            'nextPaymentDateForMonthlyPlan' => number_format($autoQuote->getElementsByTagName('nextPaymentDateForMonthlyPlan')->item(0)->nodeValue, 2, '.', ','),
            'UChoosePackId' => $autoQuote->getElementsByTagName('UChoosePackId')->item(0)->nodeValue,
            'country' => @$_POST['country']
        );
        $i++;
    }

    $options = $doc->getElementsByTagName("UChooseAvailableOptions");
    foreach ($options as $option) {
        $UChooseOptionAmount = $option->getElementsByTagName("UChooseOptionAmount");
        $UChooseOptionCode = $option->getElementsByTagName("UChooseOptionCode");
        $UChooseOptionDesc = $option->getElementsByTagName("UChooseOptionDesc");
        $UChooseOptionLongDesc = $option->getElementsByTagName("UChooseOptionLongDesc");
        $UChooseOptionSelectedFlag = $option->getElementsByTagName("UChooseOptionSelectedFlag");

        // same <UChooseAvailableOptions> is parent of <UChooseAvailableOptions>. I suppose this is bug
        // and there should be <UChooseAvailableOption> under <UChooseAvailableOptions> but...
        if ($UChooseOptionAmount->length != 1) continue;

        $group = $UChooseOptionDesc->item(0)->nodeValue;
        $option = "No Cover";
        $code = $UChooseOptionCode->item(0)->nodeValue;

        if (preg_match("/^(.*)\\-(.*)$/", $group, $matches)) {
            $group = trim($matches[1]);
            $option = trim($matches[2]);
        }
        else {
            // no continue
            if (!empty($UChooseOptionAmount->item(0)->nodeValue))
                $option = "$" . number_format($UChooseOptionAmount->item(0)->nodeValue, 2, '.', ',');
        }

        array_push($uChooseOptions, array(
            "group_code" => rtrim($code, "0123456789"),
            "group" => $group,
            "amount" => ($UChooseOptionAmount->item(0)->nodeValue),
            "code" => ($UChooseOptionCode->item(0)->nodeValue),
            "desc" => ($UChooseOptionDesc->item(0)->nodeValue),
            "option" => $option,
            "long_desc" => ($UChooseOptionLongDesc->item(0)->nodeValue),
            "selected" => ($UChooseOptionSelectedFlag->item(0)->nodeValue),
            "country" => $params['branchCode']
        ));
    }

    // no u chooose for final request
    if ($params['isFinalRequest'])
        $uChooseOptions = array();

    $annual = $result->getAutoQuoteReturn->netAnnualPremiumIncludingTax;
    return array("annual" => $annual, "annual_format" => number_format($annual, 2, '.', ','), "uchoose" => $uChooseOptions, "xml_req" => $xmlRequest, "json" => $plans);
}

// G cod e
//if(isset($_POST) && $_POST['fom1']=="1")
//{
 
 if(isset($_POST['getrandom2']))
 {
     $rdnum =  $_POST['getrandom2'];
 }
 elseif(isset($_POST['getrandom1']))
 {
     $rdnum =  $_POST['getrandom1'];
 }
$cd=date('Y-m-d H:i:s');
$wpdb->query($wpdb->prepare("INSERT INTO tbl_motor_quotation_details(country,driver_age,driver_name,driver_experience,driver_claims,sum_insured,windscreen_cover,private_use,full_time_occupation,  first_owner,registered_within,howlonginsure,alarm,cust_name,cust_phone,cust_email,created_date,cust_homePhone,cust_mobilePhone,insurance_how_long,cust_secemail,form,randomnum) VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
$_POST['country'],$_POST['driver-age'],$_POST['driver-name'],$_POST['driver-experience'],$_POST['driver-claims'],$_POST['sum_insured'],$_POST['windscreen_cover'],$_POST['private_use'],$_POST['full_time_occupation'],$_POST['first_owner'],$_POST['registered_within'],$_POST['howlonginsure'],$_POST['alarm'],$_POST['full_name'],$_POST['phone'],$_POST['email'],$cd,$_POST['homePhone'],$_POST['mobilePhone'],$_POST['howlonginsure'],$_POST['secemail'],$_POST['fom1'],$rdnum));
 
$lastgetidG = $wpdb->insert_id;
// }
// G code ends


$params = array();
$primaryDriver = array(
    'age' => $_POST["driver-age"],
    'claimsHistory' => $_POST['driver-claims'],
    'drivingExperience' => $_POST['driver-experience'],
    'gender' => $_POST['gender'], 
    'name' => $_POST['driver-name']
);
$params['primaryDriver'] = $primaryDriver;
$params['additionalDriver'] = array();

for($i=1;$i<=4;$i++){
    $name = $_POST["driver-{$i}-name"];
    $age = $_POST["driver-{$i}-age"];
    $claims = $_POST["driver-{$i}-claims"];
    $experience = $_POST["driver-{$i}-experience"];
    $gender = $_POST["gender-{$i}"];
    if(trim($name) != "") {
        $additionalDriver = array(
            'age' => $age,
            'claimsHistory' => $claims,
            'drivingExperience' => $experience,
            'gender' => $gender,
            'name' => $name
        );
        $params['additionalDriver'][] = $additionalDriver;
    }
}

$params['vehicleSumInsured'] = str_replace(array(",", "$"), array("", ""), $_POST['sum_insured']);
$params['windscreenCoverExcess'] = str_replace(array(",", "$"), array("", ""), $_POST['windscreen_cover']);

$params['privateUse'] = $_POST['private_use'] != "false";
$params['sportCar'] = $_POST['sports_car'] != "false";
$params['leftHandDrive'] = $_POST['left_hand'] != "false";
$params['newVehicleOrRegistration'] = $_POST['new_vehicle'] != "false";
$params['insuredHasDealerInvoice'] = $_POST['dealer_invoice'] != "false";
$params['vehicleOverOneYearOld'] = $_POST['over_one_year'] != "false";
$params['valuationPerformed'] = $_POST['has_valuation'] != "false";
$params['insuredHasFullTimeOccupation'] = $_POST['full_time_occupation'] != "false";
$params['insuredIsFirstTimeVehicleOwner'] = $_POST['first_owner'] != "false";

if (isset($_POST["alarm"]) && $_POST["alarm"] == "locator")
    $params['antiTheftDevice'] = 'ANTIIMMO';
else if (isset($_POST["alarm"]) && $_POST["alarm"] == "recovery")
    $params['antiTheftDevice'] = 'ANTISRCH';
else
    $params['antiTheftDevice'] = 'NONE';

$finalize = (isset($_POST["finalize"]) ? true : false);
// always finalize if country is not DM or TT
if ($_POST['country'] != "TT" &&  $_POST['country'] != "DE" && $_POST['country'] != "BA" && $_POST['country'] != "LE")
    $finalize = true;

// G CODE
if($finalize)
{
    
}
// G code ends

$params['multiVehicleDiscount'] = 'NONE';
$params['referralReferenceNumber'] = "1"; // must be set
$params['isFinalRequest'] = $finalize; // got everything finish it
//$params['isFinalRequest'] = false; // got everything finish it
$params['email'] = $_POST['email'];
$params['email2'] = $_POST['secemail'];
$params['workPhone'] = $_POST['phone'];
$params['homePhone'] = $_POST['homePhone'];
$params['mobilePhone'] = $_POST['mobilePhone'];
$params['howlonginsure'] = $_POST['howlonginsure'];
$params['vehicleMakeAndModelCode'] = @$_POST['vehiclemake'] . @$_POST['vehiclemodel'];
$params['vehicleMakeYear'] = @$_POST['vehicleMakeYear'] ?: '';
$params['distanceToWorkKm'] = @$_POST['distanceToWorkKm'] ?: '';
$params['selectedUChoosePackId'] = @$_POST['selectedUChoosePackId'] ?: '';

$params['uChooseSelectedOption'] = array();

foreach ($_POST as $key => $value) {
    if (preg_match("/^uchoose/s", $key)) {
        $params['uChooseSelectedOption'][] = array("UChooseSelectedOptionCode" => $value);
    }
}

$params['branchCode'] = $_POST['country'];

// save to db
$wpdb->query($wpdb->prepare("INSERT INTO tbl_private__motor_quotes(data,time,finalized) VALUES(%s,%d,%d)", json_encode($_POST), time(), (int)$params['isFinalRequest']));
$params['referralReferenceNumber'] = $wpdb->insert_id;


// do not process with call if not pass these expressions
if ((($_POST['driver-claims'] == "CLM12MTHS") ||
    ($_POST['driver-1-claims'] == "CLM12MTHS") ||
    ($_POST['driver-2-claims'] == "CLM12MTHS") ||
    ($_POST['driver-3-claims'] == "CLM12MTHS")) && $_POST['full_time_occupation'] == "false" ||
    (isset($_POST["registered_within"]) && ($_POST["registered_within"] == "false")) ||
    // ($_POST['private_use'] == "false") ||
    ($_POST['sports_car'] == "true") ||
    ($_POST['left_hand'] == "true") ||
    // ($_POST['driver-age'] < 25) ||
    // ($_POST['driver-1-name'] && $_POST['driver-1-age'] < 25) ||
    // ($_POST['driver-2-name'] && $_POST['driver-2-age'] < 25) ||
    // ($_POST['driver-3-name'] && $_POST['driver-3-age'] < 25) ||
    ($_POST['driver-claims'] == "CLM12MTHS") ||
    ($_POST['driver-1-claims'] == "CLM12MTHS") ||
    ($_POST['driver-2-claims'] == "CLM12MTHS") ||
    ($_POST['driver-3-claims'] == "CLM12MTHS") ||
    ($_POST['driver-experience'] == "UND1YR") ||
    ($_POST['driver-1-experience'] == "UND1YR") ||
    ($_POST['driver-2-experience'] == "UND1YR") ||
    ($_POST['driver-3-experience'] == "UND1YR")
    ) {
    $message = "Thank you for choosing Beacon. We do apologize but due to specific information entered, we’re unable provide an instant quote. A Beacon representative will be in touch with you within 24 hours to discuss your request";
    ob_start();
    require_once __DIR__ . '/includes/template/motor-quotation/not-suitable.php';
    $html = ob_get_clean();
    $quotation = array("annual" => "0", "annual_format" => "0.00", "uchoose" => array(), "step3_html" => $html, "not_suitable" => 1);

    echo json_encode($quotation);
    exit;
} 

if (($_POST['full_time_occupation'] == "false") ||
    ($_POST['registered_within'] == "false")
    ) {
    $message = "Based on the information you've entered, we feel there may be a more suitable product for you. A Beacon agent will contact you within 24 hours to discuss your request. Thank you";
    ob_start();
    require_once __DIR__ . '/includes/template/motor-quotation/not-suitable.php';
    $html = ob_get_clean();
    $quotation = array("annual" => "0", "annual_format" => "0.00", "uchoose" => array(), "step3_html" => $html, "not_suitable" => 1);

    echo json_encode($quotation);
    exit;
}

$quotation = get_motor_quotation($params);

if (@$_POST['step2_completed']) {

    $quotation['step3_html'] = siGetStep3Html();
}

function siGetStep3Html() {
    global $quotation, $packNames, $packList;
    $plans = $quotation['json'];

    $currency = "ECD";
    if ($_POST['country'] == 'TT')
      $currency = 'TTD';
    if ($_POST['country'] == 'BA')
      $currency = 'BDS';

    $doc = new DOMDocument();

    $packs = array();
    foreach ($packNames as $packName) {
        foreach ($packList->packs->item as $pack) {
            if ($pack->UChoosePackBranch === $_POST['country']) {
                if (strtolower($pack->UChoosePackName) === $packName) {
                    foreach ($packList->packOptions->item as $packOption) {
                        if ($pack->UChoosePackId === $packOption->UChoosePackId) {
                            foreach ($packList->options->item as $option) {
                                if ($packOption->UChooseOptionCode === $option->UChooseOptionCode) {
                                    $option->UChooseOptionRowSequence = $packOption->UChooseOptionRowSequence;
                                    $packs[$packName][] = $option;
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
        $sort_col = array();
        foreach ($arr as $key=> &$row) {
            $row = (array) $row;
            $sort_col[$key] = $row[$col];
        }

        array_multisort($sort_col, $dir, $arr);
    }


    foreach ($packs as &$pack) {
        array_sort_by_column($pack, 'UChooseOptionRowSequence');
    }

    function getBenefitNames($pack) {
        $arr = array();

        foreach ($pack as $benefit) {
            $key = preg_replace('/ *- .*$/', '', $benefit['UChooseOptionDesc']);
            if (!trim($key)) continue;
            $arr[$key] = 1;
        }
        return $arr;
    }


    $benefitsList = array_keys(array_merge(
        getBenefitNames($packs[$packNames[0]]),
        getBenefitNames($packs[$packNames[1]]),
        getBenefitNames($packs[$packNames[2]])
    ));

    $packsSorted = array();
    foreach ($packs as $__packName => $__pack) {
        foreach ($benefitsList as $benefitName) {
            $found = false;
            
            foreach ($__pack as $benefit) {
                $benefitKey = strtolower(preg_replace('/\s+/', '_', $benefitName));
                $benefitKey = preg_replace('/[()]/', '', $benefitKey);

                if (stripos($benefit['UChooseOptionDesc'], $benefitName) !== false) {
                    $benefitValue = trim(substr($benefit['UChooseOptionDesc'], strlen($benefitName)));
                    $benefitValue = preg_replace('/^ *- /', '', $benefitValue);
                    $packsSorted[$__packName][$benefitKey] = array(
                        'name' => $benefitName,
                        'desc' => $benefit['UChooseOptionLongDesc'],
                        'value' => $benefitValue ?: 'Covered'
                    );

                    $found = true;
                }
            }

            if(!$found) {
                $packsSorted[$__packName][$benefitKey] = array(
                    'name' => $benefitName,
                    'value' => 'Not covered'
                );
            }
        }
    }

    ob_start();

    require_once __DIR__ . '/includes/template/motor-quotation/step-3.php';

    return ob_get_clean();
}

echo json_encode($quotation);
