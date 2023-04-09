<?php

//========== create object of clsSkillDevelopment class=============== 
include_once( CLASS_PATH . 'clsSkillCompetition.php');


$objComp = new clsSkillCompetition;

$nid       = (isset($_REQUEST['PARAM']) && ($_REQUEST['PARAM']!=''))?$objComp->decrypt($_REQUEST['PARAM']):'';
//========== Default variable ===============       
//echo $nid;exit;
$flag = 0;
$errFlag = 0;
$outMsg = '';

// Only for profile details by Rahul ON 17-05-2022

$resultData     = $objComp->manageSkillCompetition('LD', 0,0,0, $nid, '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00'); 
if ($resultData->num_rows > 0) {
        $numRow = $resultData->fetch_array();
        $strName     = htmlspecialchars_decode($numRow['vchFirstName'], ENT_QUOTES).' '.htmlspecialchars_decode($numRow['vchLastName'], ENT_QUOTES);
        $strMobile   = htmlspecialchars_decode($numRow['vchPhoneno'], ENT_QUOTES);
        $strEmail    = htmlspecialchars_decode($numRow['vchEmailId'], ENT_QUOTES);
        $strDocType  = 'Aadhar Number';
        $strDocNum   = htmlspecialchars_decode($numRow['vchAadharId'], ENT_QUOTES);
        $profile     = APP_URL.'uploadDocuments/skillCompetition/'.$numRow['vchAckNo'].'/'.$numRow['vchProfilePhoto'];
        $dob         = date('d-M-Y', strtotime($numRow['dtmDob']));
        $gender      = ($numRow['tinGender']==1)?'Male':'Female';
        $dist        = ($numRow['vchDistrictName']!='')?$numRow['vchDistrictName']:'--';
    }
// For Multiple skill details by Rahul ON 17-05-2022
$result     = $objComp->manageSkillCompetition('LPP', 0,0,0, $nid, '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');


?>