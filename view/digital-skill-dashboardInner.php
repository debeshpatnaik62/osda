<?php

//========== create object of clsSkillDevelopment class=============== 
include_once( CLASS_PATH . 'clsSkillDevelopment.php');


$objDevelopment = new clsSkillDevelopment;

//print_r($_REQUEST);exit;
$nid       = (isset($_REQUEST['PARAM']) && ($_REQUEST['PARAM']!=''))?$objDevelopment->decrypt($_REQUEST['PARAM']):'';
//========== Default variable ===============       

$flag = 0;
$errFlag = 0;
$outMsg = '';

$arrConditions=array('regdNo'=>$nid);
// Only for profile details by Rahul ON 19-04-2022

$resultData     = $objDevelopment->manageskillDevelopment('LP', $arrConditions); 
if ($resultData->num_rows > 0) {
        $numRow = $resultData->fetch_array();
        $strName     = htmlspecialchars_decode($numRow['vchName'], ENT_QUOTES);
        $strMobile   = htmlspecialchars_decode($numRow['vchMobile'], ENT_QUOTES);
        $strEmail    = htmlspecialchars_decode($numRow['vchEmail'], ENT_QUOTES);
        $strDocType  = htmlspecialchars_decode($numRow['vchDocumentType'], ENT_QUOTES);
        $strDocNum   = htmlspecialchars_decode($numRow['vchDocumentNumber'], ENT_QUOTES);
    }

// For Multiple Program details by Rahul ON 21-04-2022
$result     = $objDevelopment->manageskillDevelopment('LPP', $arrConditions);

/*$_SESSION['regdNo'] = $nid;
$_SESSION["fees"]  = $payableFee;
$_SESSION['mobileNo'] = $strMobile;

$_SESSION['emailId'] = $strEmail;
$_SESSION['instituteCode'] = $instituteCode;
$_SESSION['strInstituteName'] = $strInstitute;
$_SESSION['strCourseCode'] = $strCourseCode;
$_SESSION['strCourseName'] = $strCourseName;*/
?>