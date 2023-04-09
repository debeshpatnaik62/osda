<html>
<head>
<title> Non-Seamless-kit</title>
</head>
<body>
<center>
<?php
include_once( CLASS_PATH . 'clsSkillDevelopment.php');


$objDevelopment = new clsSkillDevelopment;
//print_r($_SESSION);exit;
 include('Crypto.php');?>
<?php 
	error_reporting(0);
	
	$merchant_data=MERCHANT_ID;//'277585';
	$working_key=WORKING_KEY;//'16221BF2ED4E08F49111930A90B5A9D8';//Shared by CCAVENUES
	$access_code= ACCESS_CODE;//'AVCE95HJ71AK38ECKA';//Shared by CCAVENUES
	
	$regNo = $_SESSION['regdNo'];	
	$fees = $_SESSION['fees'];	
	$encId = $objDevelopment->encrypt($regNo);
//echo $regNo.'='.$fees;exit;
	$transactionId = $regNo.'_'.date('hms');//date('dmYhms');
	$redirect_url = SITE_URL.'payment-response/'.$encId;
	$cancel_url = SITE_URL.'payment-response/'.$encId;
	$requestStr = '';
	$payment_status = 9; // for initiate
	$currency = 'INR';
    $fees = str_replace( ',', '', $fees );
    $_SESSION['transaction_id'] = $transactionId;
    $billing_country = 'India';
    $billing_tel = $_SESSION['mobileNo'];
    $billing_email = $_SESSION['emailId'];
    $order_status = 'Pending';

    $instituteCode = $_SESSION['instituteCode'];
	$strInstituteName = $_SESSION['strInstituteName'];
	$strCourseCode = $_SESSION['strCourseCode'];
	$strCourseName = $_SESSION['strCourseName'];
	$subId = $strCourseName.$instituteCode;

    $arrPConditions = array('transaction_id' => $transactionId,'order_id' => $regNo,'order_status' => $order_status,'amount' => $fees,'tinPayStatus' => $payment_status,'instituteCode'=>$instituteCode,'strInstituteName'=>$strInstituteName,'strCourseCode'=>$strCourseCode,'strCourseName'=>$strCourseName,'subId'=>$subId);

    //$arrConditions = array('order_id' => $regNo,'tinPayStatus' => $payment_status);

    $result = $objDevelopment->manageskillDevelopment('SP', $arrPConditions);

	$requestStr .= 'tid='.urlencode($transactionId).'&merchant_id='.urlencode($merchant_data).'&order_id='.urlencode($transactionId).'&amount='.urlencode(intval($fees)).'&currency='.urlencode('INR').'&redirect_url='.urlencode($redirect_url).'&cancel_url='.urlencode($cancel_url).'&language='.urlencode('EN').'&billing_country='.urlencode($billing_country).'&billing_tel='.urlencode($billing_tel).'&billing_email='.urlencode($billing_email).'&merchant_param1='.urlencode($strInstituteName).'&merchant_param2='.urlencode($instituteCode).'&merchant_param3='.urlencode($strCourseCode).'&merchant_param4='.urlencode($strCourseName).'&merchant_param5='.urlencode($subId);
	
		$merchant_data.=$requestStr;
//print_r($merchant_data);exit;
	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.

?>
<!-- <form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> -->
<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>

