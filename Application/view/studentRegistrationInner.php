<?php

//========== create object of clsSkillDevelopment class=============== 
include_once( CLASS_PATH . 'clsSkillDevelopment.php');


$objDevelopment = new clsSkillDevelopment;


$nid      = $_REQUEST['NID'];
$strSubmit = ($id > 0) ? 'Update' : 'Submit';
$strReset = ($id > 0) ? 'Cancel' : 'Reset';
$strTab = ($id > 0) ? 'Edit' : 'Add';
//$strclick = ($id > 0) ? "window.location.href='" . SITE_URL . "contact/" . $glId . "/" . $plId . "';" : "";


//========== Default variable ===============       

$flag = 0;
$errFlag = 0;
$outMsg = '';
$userId         = $_SESSION['adminConsole_userID'];
$privilege      = $_SESSION['userPrivilege'];
$instituteId    = $_SESSION['institute_id'];
if($privilege>2)
{
    $instituteId = $instituteId;
}
else 
{
    $instituteId = 0;
}
//============ Student Form Submit ===================
if (isset($_POST['btnSubmit'])) 
{
     
    $result = $objDevelopment->addUpdateInstituteskillDevelopment($id);

    //print_r($result);exit;
    $outMsg = $result['msg'];
    $flag = $result['flag'];
    $formdata = $result['returnParams'];
    $strName     = ($flag==1)?htmlspecialchars_decode($formdata['strName'], ENT_QUOTES):'';
    $strMobile   = ($flag==1)?htmlspecialchars_decode($formdata['mobile'], ENT_QUOTES):'';
    $strEmail    = ($flag==1)?htmlspecialchars_decode($formdata['email'], ENT_QUOTES):'';
    $selDistrict = ($flag==1)?htmlspecialchars_decode($formdata['district'], ENT_QUOTES):'';
    $strMessage  = ($flag==1)?htmlspecialchars_decode($formdata['message'], ENT_QUOTES):'';
    $errFlag = $result['flag'];
    $redirectLoc        =  APP_URL."viewSkillRegistration/".$glId."/".$plId;
}

  
?>