<?php

/* ================================================
  File Name         	: addTranslateManualInner.php
  Description		: This page is used to add Contact details
  <Updated by>		<Updated On>		<Remarks>
  Devloped By		  : Samir Kumar
  Devloped On		  : 14-SEP-2017
  Class Used		: clsTranslate
  ================================================== */
include(ABS_PATH . '/controller/clsTranslate.php');
$objTrans = new clsTranslate;

$id = (isset($_REQUEST['ID'])) ? $_REQUEST['ID'] : 0;
$strSubmit = ($id > 0) ? 'Update' : 'Submit';
$strReset = ($id > 0) ? 'Cancel' : 'Reset';
$strTab = ($id > 0) ? 'Edit' : 'Add';
$strclick = ($id > 0) ? "window.location.href='" . APPURL . "viewTranslation/" . $glId . "/" . $plId . "';" : "location.reload();";
//========== Default variable ===============	
$flag = 0;
$errFlag = 0;
$outMsg = '';
$intCategory = 0;
$redirectLoc = APPURL . "viewTranslation/" . $glId . "/" . $plId;
//========== Permission ===============	
$glId = $_REQUEST['GL'];
$plId = $_REQUEST['PL'];
$pageName = $_REQUEST['PAGE'] . '.php';
$userId = $_SESSION['adminConsole_userID'];
//$explPriv = $objContact->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
//$noAdd = $explPriv['add'];
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
    echo "<script>location.href = '" . APPURL . "viewBanner/" . $glId . "/" . $plId . "'</script>";
//============ Button Submit ===================

if(isset($_REQUEST['ID']))
{ 
        //============ Read value ===========  
       $result           = $objTrans->readPagedata($id);
       $intpageId        = ($result['intId'] !='')?$result['intId']:0;
       $vchPageURL       = ($result['vchPageURL'] !='')?$result['vchPageURL']:'';
       $redirectLoc      =  APPURL."viewTranslation/".$glId."/".$plId;
}


  
if (isset($_POST['btnSubmit']) || (isset($_REQUEST['hdnQs']) && $_REQUEST['hdnQs'] == 'U')) {
    // $result = $objTrans->addManual($id);
    // $outMsg = $result['msg'];
    // $flag = $result['flag'];
    // $errflag = $result['errFlag'];
    // // $strAddress = $result['strAddress'];
    // // $strEmail = $result['txtEmails'];
    // // $strPhone = $result['txtPhones'];
    // // $strFax = $result['txtFaxs'];
    // // $strMapAddress = $result['strMapAddress'];
    // // $intProjectId = $result['intProjectId'];
    // if ($flag == 1 && $errflag == 1) {
    //     $redirectLoc = '';
    // } else {
    //     $redirectLoc = APPURL . "viewTranslation/" . $glId . "/" . $plId;
    // }
    $result = $objTrans->addUpdateTranslate($id);
    $outMsg = $result['msg'];
    $flag = $result['flag'];
    $errflag = $result['errFlag'];
      if ($flag == 1 && $errflag == 1) {
          $redirectLoc = '';
      } else {
          $redirectLoc = APPURL . "viewTranslation/" . $glId . "/" . $plId;
      }
}
?>