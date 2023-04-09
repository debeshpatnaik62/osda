<?php

/* ================================================
  File Name         	: addTranslateManualInner.php
  Description		: This page is used to add Contact details
  <Updated by>		<Updated On>		<Remarks>
  Devloped By		  : Samir Kumar
  Devloped On		  : 14-SEP-2017
  Class Used		: clsTranslate
  ================================================== */
include(CLASS_PATH.'clsTranslate.php');
$objTrans = new clsTranslate;

$id = (isset($_REQUEST['ID'])) ? $_REQUEST['ID'] : 0;
$strSubmit = ($id > 0) ? 'Update' : 'Submit';
$strReset = ($id > 0) ? 'Cancel' : 'Reset';
$strTab = ($id > 0) ? 'Edit' : 'Add';
$strclick = ($id > 0) ? "window.location.href='" . APP_URL . "viewContactUs/" . $glId . "/" . $plId . "';" : "location.reload();";
//========== Default variable ===============	
$flag = 0;
$errFlag = 0;
$outMsg = '';
$intCategory = 0;
$redirectLoc = APP_URL . "viewContactUs/" . $glId . "/" . $plId;
//========== Permission ===============	
$glId = $_REQUEST['GL'];
$plId = $_REQUEST['PL'];
$pageName = $_REQUEST['PAGE'] . '.php';
$userId = $_SESSION['adminConsole_userID'];

//============ Button Submit ===================
if (isset($_POST['btnSubmit']) || (isset($_REQUEST['hdnQs']) && $_REQUEST['hdnQs'] == 'U')) {
    
    $result = $objTrans->registerPage($id);
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