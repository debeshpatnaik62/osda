<?php 
//print_r($_REQUEST);exit;

/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 
Author : 
*/ 
include_once( CLASS_PATH . 'clsSkillDevelopment.php');
//print_r($_SESSION);exit;
$objDevelopment = new clsSkillDevelopment;

$strPageTitle             = 'Payment Process';
$regdNo = $_POST['txtRegdNo'];
$_SESSION['regdNo'] = $regdNo;
$outMsg = '';
//$dupStatus = $_SESSION['extStatus'];
//$paymentStatus = $_SESSION['payStatus'];

$result = $objDevelopment->getRegistartionDetails($regdNo);

    $strName     = htmlspecialchars_decode($result['strName'], ENT_QUOTES);
    $strMobile   = htmlspecialchars_decode($result['strMobile'], ENT_QUOTES);
    $strEmail    = htmlspecialchars_decode($result['strEmail'], ENT_QUOTES);
    $strCourseType = htmlspecialchars_decode($result['strCourseType'], ENT_QUOTES);
    $strSkill  = htmlspecialchars_decode($result['strSkill'], ENT_QUOTES);
    $strCoursesFor     = htmlspecialchars_decode($result['strCoursesFor'], ENT_QUOTES);
    $strBranch   = htmlspecialchars_decode($result['strBranch'], ENT_QUOTES);
    $strInterestedCourse    = htmlspecialchars_decode($result['strInterestedCourse'], ENT_QUOTES);
    $strInstituteId = htmlspecialchars_decode($result['strInstituteId'], ENT_QUOTES);
    $payStatus = $result['payStatus'];
    $testMark = $result['testMark'];
    $eligibleStatus = $result['eligibleStatus'];
    $strInstituteName = $result['strInstituteName'];
    $strCourseName = $result['strCourseName'];
    $intInstituteId = $result['intInstituteId'];
    $strCourseCode = $result['strCourseCode'];
    $outMsg = $result['msg'];
        //echo $outMsg;exit;


   $instituteCode = 'C'.$intInstituteId;
    /*if($strCourseType=='Coursera')
    {
    	$_SESSION["fees"] = COURSERA_FEE;
    }
    else if($strCourseType=='SAP ERP')
    {
    	$_SESSION["fees"] = SAP_FEE;
    }*/

    if($regdNo=='SAPERP2003110000000001' || $regdNo=='SAPERP2003110000000002' || $regdNo=='SAPERP2003110000000003' || $regdNo=='SAPERP2003110000000004' || $regdNo=='SAPERP2003110000000005' || $regdNo=='SAPERP2003110000000006' || $regdNo=='SAPERP2003110000000007' || $regdNo=='SAPERP2003110000000008')
    {
        $_SESSION["fees"] = 1;
        $courseFee = $_SESSION["fees"];
    }
    else
    {
        $_SESSION["fees"] = SAP_FEE;
        $courseFee = $_SESSION["fees"];
    }

    

$_SESSION['mobileNo'] = $strMobile;

$_SESSION['emailId'] = $strEmail;
$_SESSION['instituteCode'] = $instituteCode;
$_SESSION['strInstituteName'] = $strInstituteName;
$_SESSION['strCourseCode'] = $strCourseCode;
$_SESSION['strCourseName'] = $strCourseName;

?>