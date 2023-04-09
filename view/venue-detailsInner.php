<?php 
//print_r($_REQUEST);exit;

/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 
Author : 
*/ 
include_once( CLASS_PATH . 'clsVenueTagged.php');
//print_r($_SESSION);exit;
$objVenue = new clsVenueTagged;

$strPageTitle             = 'Venue Details';
$id             = (isset($_REQUEST['PARAM']))?$_REQUEST['PARAM']:0;
$regdNo         = $objVenue->decrypt($id);

//$regdNo = $_POST['txtRegdNo'];
$outMsg = '';
$flag   = 0;

    if(!empty($regdNo))
    {
    $result = $objVenue->getVenueDetails($regdNo);

    $strName     = htmlspecialchars_decode($result['strMemberName'], ENT_QUOTES);
    $strMobile   = htmlspecialchars_decode($result['strMobile'], ENT_QUOTES);
    $strEmail    = htmlspecialchars_decode($result['strEmail'], ENT_QUOTES);
    $strAckNo    = htmlspecialchars_decode($result['strAckNo'], ENT_QUOTES);
    $strAadharno = htmlspecialchars_decode($result['strAadharno'], ENT_QUOTES);
    //$strVenueName = htmlspecialchars_decode($result['strVenueName'], ENT_QUOTES);
    $strSkill  = htmlspecialchars_decode($result['strSkill'], ENT_QUOTES);
    $strUpdatedSkills  = htmlspecialchars_decode($result['strUpdatedSkills'], ENT_QUOTES);
    $strDistName     = htmlspecialchars_decode($result['strDistName'], ENT_QUOTES);
    /*$examDate   = htmlspecialchars_decode($result['examDate'], ENT_QUOTES);
    $examTime    = htmlspecialchars_decode($result['examTime'], ENT_QUOTES);*/
    $profilePhoto    = htmlspecialchars_decode($result['profilePhoto'], ENT_QUOTES);
    //$firstName    = $result['firstName'];
    $firstName    = str_replace(" ", "-",$strName);
    $serverCode   = $result['serverCode'];
    $address      = $result['address'];
    $level        = $result['level'];
    $level1      = $result['level1'];
    $level2      = $result['level2'];
    $level3      = $result['level3'];
    $outMsg = $result['msg'];
    $flag   = $result['flag'];
    if(!empty($strUpdatedSkills))
    {
        $skillName = $strUpdatedSkills;
    }
    else
    {
        $skillName = $strSkill;
    }
    if($level1 >0 and $level2==0)
    {
        $level = 'Level-1';
        $strVenueName = htmlspecialchars_decode($result['strVenueName'], ENT_QUOTES);
        $examDate   = htmlspecialchars_decode($result['examDate'], ENT_QUOTES);
        $examTime    = htmlspecialchars_decode($result['examTime'], ENT_QUOTES);
    }
    else if($level1 >0 and $level2 > 0 and $level3==0)
    {
        $level = 'Level-2';
        $strVenueName = htmlspecialchars_decode($result['strVenueName'], ENT_QUOTES);
        $examDate   = htmlspecialchars_decode($result['examDate'], ENT_QUOTES);
        $examTime    = htmlspecialchars_decode($result['examTime'], ENT_QUOTES);
    }
    else if($level1 >0 and $level2 > 0 and $level3 > 0)
    {
        $level = 'Level-3';
        $strVenueName = htmlspecialchars_decode($result['strVenueName'], ENT_QUOTES);
        $examDate     = htmlspecialchars_decode($result['examDate'], ENT_QUOTES);
        $examTime     = htmlspecialchars_decode($result['examTime'], ENT_QUOTES);
    }
    }

?>