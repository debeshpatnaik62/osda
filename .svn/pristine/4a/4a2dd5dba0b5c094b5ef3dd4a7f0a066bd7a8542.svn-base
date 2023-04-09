<?php

/* ================================================
  File Name         	: addTranslateInner.php
  Description		: This page is used to add Contact details
  <Updated by>		<Updated On>		<Remarks>
  Devloped By		  : Samir kumar
  Devloped On		  : 16-Sep-2018
  Class Used		: clsTranslate
  Functions Used		: readContactUs(),addUpdateContactUs(),
  ================================================== */

include(CLASS_PATH.'clsTranslate.php');
$objTrans = new clsTranslate;
//print_r($_REQUEST);exit;

$id = (isset($_REQUEST['ID'])) ? $_REQUEST['ID'] : 0;
// $strSubmit = ($id > 0) ? 'Update' : 'Submit';
// $strReset = ($id > 0) ? 'Cancel' : 'Reset';
// $strTab = ($id > 0) ? 'Edit' : 'Add';
$strclick = ($id > 0) ? "window.location.href='" . APP_URL . "viewTranslation/" . $glId . "/" . $plId . "';" : "location.reload();";
//========== Default variable ===============	
$flag = 0;
$errFlag = 0;
$outMsg = '';
$intCategory = 0;
$redirectLoc = APP_URL . "viewTranslation/" . $glId . "/" . $plId;
//========== Permission ===============	
$glId = $_REQUEST['GL'];
$plId = $_REQUEST['PL'];
$pageName = $_REQUEST['PAGE'] . '.php';
$userId = $_SESSION['adminConsole_userID'];
for ($i = 0; $i < count($storeRights); $i++) {
    $tabs = $storeRights[$i]['childLinks'];
    for ($j = 0; $j < count($tabs); $j++) {
        if ($tabs[$j][1] == $_REQUEST['PAGE']) {
            $parPage   = $storeRights[$i][0];
            $getRights = $storeRights[$i][1];
        }
    }
}

if ($getRights == 1 && $userId!=0)
    echo "<script>location.href = '" . APP_URL . "viewTranslation/" . $glId . "/" . $plId . "'</script>";

if(isset($_REQUEST['ID']))
{
    
        //============ Read value ===========  
       $result           = $objTrans->readPagedata($id);
       $intpageId        = ($result['intId'] !='')?$result['intId']:0;
       $vchPageURL       = ($result['vchPageURL'] !='')?$result['vchPageURL']:'';
       $redirectLoc      =  APPURL."viewTranslation/".$glId."/".$plId;
}

//============ Button Submit ===================
if (isset($_POST['btnSubmit']) || (isset($_REQUEST['hdnQs']) && $_REQUEST['hdnQs'] == 'U')) {
    
   
    $result = $objTrans->addUpdateTranslate($id);
    $outMsg = $result['msg'];
    $flag = $result['flag'];
    $errflag = $result['errFlag'];
    if ($flag == 1 && $errflag == 1) {
        $redirectLoc = '';
    } else {
        $redirectLoc = APP_URL . "viewTranslation/" . $glId . "/" . $plId;
    }
}
?>