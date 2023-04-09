<?php

//========== create object of clsSkillTP class=============== 
include_once( CLASS_PATH . 'clsSkillInsRegd.php');


$objIns = new clsSkillInsRegd;

//========== Default variable ===============       

$flag = 0;
$errFlag = 0;
$outMsg = '';

//============ Student Form Submit ===================
if (isset($_POST['btnInsSubmit'])) 
{
     
    $result = $objIns->addUpdateskillInsRegd($id);

    //print_r($result);exit;
    $outMsg = $result['msg'];
    $flag = $result['flag'];
    $formdata = $result['returnParams'];
    $strName     = ($flag==1)?htmlspecialchars_decode($formdata['strName'], ENT_QUOTES):'';
    $txtInsEmail   = ($flag==1)?htmlspecialchars_decode($formdata['txtInsEmail'], ENT_QUOTES):'';
    $txtInsNumber    = ($flag==1)?htmlspecialchars_decode($formdata['txtInsNumber'], ENT_QUOTES):'';
    $txtInsPan = ($flag==1)?htmlspecialchars_decode($formdata['txtInsPan'], ENT_QUOTES):'';
    $txtInsRegd  = ($flag==1)?htmlspecialchars_decode($formdata['txtInsRegd'], ENT_QUOTES):'';
    $selProgramId     = ($flag==1)?htmlspecialchars_decode($formdata['selProgramId'], ENT_QUOTES):'';
    $txtAdress   = ($flag==1)?htmlspecialchars_decode($formdata['txtAdress'], ENT_QUOTES):'';
    $txtInsRemark    = ($flag==1)?htmlspecialchars_decode($formdata['txtInsRemark'], ENT_QUOTES):'';
    $txtPersonName = ($flag==1)?htmlspecialchars_decode($formdata['txtPersonName'], ENT_QUOTES):'';
    $txtPersonEmail  = ($flag==1)?htmlspecialchars_decode($formdata['txtPersonEmail'], ENT_QUOTES):'';
    $txtPersonNumber  = ($flag==1)?htmlspecialchars_decode($formdata['txtPersonNumber'], ENT_QUOTES):'';
    $txtAccName  = ($flag==1)?htmlspecialchars_decode($formdata['txtAccName'], ENT_QUOTES):'';
    $txtAccNumber  = ($flag==1)?htmlspecialchars_decode($formdata['txtAccNumber'], ENT_QUOTES):'';
    $txtIfscCode  = ($flag==1)?htmlspecialchars_decode($formdata['txtIfscCode'], ENT_QUOTES):'';
    $txtBranchName  = ($flag==1)?htmlspecialchars_decode($formdata['txtBranchName'], ENT_QUOTES):'';
    $txtCellPersonName  = ($flag==1)?htmlspecialchars_decode($formdata['txtCellPersonName'], ENT_QUOTES):'';
    $txtCellPersonEmail  = ($flag==1)?htmlspecialchars_decode($formdata['txtCellPersonEmail'], ENT_QUOTES):'';
    $txtCellPersonNumber  = ($flag==1)?htmlspecialchars_decode($formdata['txtCellPersonNumber'], ENT_QUOTES):'';
    $txtPrincipleName  = ($flag==1)?htmlspecialchars_decode($formdata['txtPrincipleName'], ENT_QUOTES):'';
    $txtPrincipleEmail  = ($flag==1)?htmlspecialchars_decode($formdata['txtPrincipleEmail'], ENT_QUOTES):'';
    $txtPrincipleNumber  = ($flag==1)?htmlspecialchars_decode($formdata['txtPrincipleNumber'], ENT_QUOTES):'';
    $takenSeat  = ($flag==1)?htmlspecialchars_decode($formdata['takenSeat'], ENT_QUOTES):'';

    $errFlag = $result['flag'];
    if($errFlag==0)
    {
        $redirectLoc        =  SITE_URL.'digitall-skill';
    }
    
}

?>