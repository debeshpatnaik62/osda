<?php

//========== create object of clsSkillTP class=============== 
include_once( CLASS_PATH . 'clsSkillTP.php');


$objTP = new clsSkillTP;

//========== Default variable ===============       

$flag = 0;
$errFlag = 0;
$outMsg = '';

//============ Student Form Submit ===================
if (isset($_POST['btnTPSubmit'])) 
{
     
    $result = $objTP->addUpdateskillTP($id);

    //print_r($result);exit;
    $outMsg = $result['msg'];
    $flag = $result['flag'];
    $formdata = $result['returnParams'];
    $strName     = ($flag==1)?htmlspecialchars_decode($formdata['strOrgName'], ENT_QUOTES):'';
    $txtOrgEmail   = ($flag==1)?htmlspecialchars_decode($formdata['txtOrgEmail'], ENT_QUOTES):'';
    $txtOrgMobile    = ($flag==1)?htmlspecialchars_decode($formdata['txtOrgMobile'], ENT_QUOTES):'';
    $txtOrgPan = ($flag==1)?htmlspecialchars_decode($formdata['txtOrgPan'], ENT_QUOTES):'';
    $txtOrgRegd  = ($flag==1)?htmlspecialchars_decode($formdata['txtOrgRegd'], ENT_QUOTES):'';
    $txtAdress  = ($flag==1)?htmlspecialchars_decode($formdata['txtAdress'], ENT_QUOTES):'';
    $txtOrgRemark  = ($flag==1)?htmlspecialchars_decode($formdata['txtOrgRemark'], ENT_QUOTES):'';
    $txtPersonName  = ($flag==1)?htmlspecialchars_decode($formdata['txtPersonName'], ENT_QUOTES):'';
    $txtPersonEmail  = ($flag==1)?htmlspecialchars_decode($formdata['txtPersonEmail'], ENT_QUOTES):'';
    $txtPersonNumber  = ($flag==1)?htmlspecialchars_decode($formdata['txtPersonNumber'], ENT_QUOTES):'';
    $txtAccName  = ($flag==1)?htmlspecialchars_decode($formdata['txtAccName'], ENT_QUOTES):'';
    $txtAccNumber  = ($flag==1)?htmlspecialchars_decode($formdata['txtAccNumber'], ENT_QUOTES):'';
    $txtIfscCode  = ($flag==1)?htmlspecialchars_decode($formdata['txtIfscCode'], ENT_QUOTES):'';
    $txtBranchName  = ($flag==1)?htmlspecialchars_decode($formdata['txtBranchName'], ENT_QUOTES):'';
    $errFlag = $result['flag'];
    if($errFlag==0)
    {
        $redirectLoc        =  SITE_URL.'digitall-skill';
    }
}

?>