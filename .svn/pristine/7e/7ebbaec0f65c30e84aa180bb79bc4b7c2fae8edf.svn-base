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

$strPageTitle             = 'Admit Card Details';
$regdNo = $_REQUEST['NID'];
$outMsg = '';                  


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
    $examDate   = htmlspecialchars_decode($result['examDate'], ENT_QUOTES);
    $examTime    = htmlspecialchars_decode($result['examTime'], ENT_QUOTES);
    $profilePhoto    = htmlspecialchars_decode($result['profilePhoto'], ENT_QUOTES);
    //$firstName    = $result['firstName'];
    $firstName    = str_replace(" ", "-",$strName);
    $serverCode   = (!empty($result['serverCode']))?$result['serverCode']:'--';
    $address      = $result['address'];
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
     if((!empty($profilePhoto)) && file_exists(APP_PATH.'uploadDocuments/skillCompetition/'.$strAckNo.'/'.$profilePhoto)) 
    {
        $applicantPhoto = APP_PATH.'uploadDocuments/skillCompetition/'.$strAckNo.'/'.$profilePhoto;
    }
    else
    {
        $applicantPhoto = SITE_PATH.'images/demo-profile.png';
    }
    if($level1 >0 and $level2==0)
    {
        $level = 'Level-1';
        $strVenueName = htmlspecialchars_decode($result['strVenueName'], ENT_QUOTES);
        $strPanelName = $result['strPanelName'];
        $panelAddress = $result['panelAddress'];
    }
    else if($level1 >0 and $level2 > 0 and $level3==0)
    {
        $level = 'Level-2';
        $strVenueName = htmlspecialchars_decode($result['strVenueName'], ENT_QUOTES);
        $strPanelName = $result['strPanelName'];
        $panelAddress = $result['panelAddress'];
    }
    else if($level1 >0 and $level2 > 0 and $level3 > 0)
    {
        $level = 'Level-3';
        $strVenueName = htmlspecialchars_decode($result['strVenueName'], ENT_QUOTES);
        $strPanelName = $result['strPanelName'];
        $panelAddress = $result['panelAddress'];
    }
    //$fileName2           = 'QR_'.$regdNo.'_'.$firstName.'_'.$examDate.'_'.$level.'.png';
    $fileName2           = 'QR_'.$regdNo.'.png';
   

?>