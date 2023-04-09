<?php

//========== create object of clsSkillDevelopment class=============== 
include_once( CLASS_PATH . 'clsSkillInformation.php');


$objInformation = new clsSkillInformation;


$nid      = $_REQUEST['NID'];
$strSubmit = ($id > 0) ? 'Update' : 'Submit';
$strReset = ($id > 0) ? 'Cancel' : 'Reset';
$strTab = ($id > 0) ? 'Edit' : 'Add';
//$strclick = ($id > 0) ? "window.location.href='" . SITE_URL . "contact/" . $glId . "/" . $plId . "';" : "";


//========== Default variable ===============       

$flag = 0;
$errFlag = 0;
$outMsg = '';

//============ Student Form Submit ===================
if (isset($_POST['btnSubmit'])) 
{
     
    $result = $objInformation->addUpdateskillInformation($id);

    //print_r($result);exit;
    $outMsg = $result['msg'];
    $flag = $result['flag'];
    //$redirectLoc        =  SITE_URL."skill-payment";
}
 
?>