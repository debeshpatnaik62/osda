<?php

/* ================================================
  File Name       : viewTranslationInner.php
  Description     : This page is used to view Area Details.
  Author Name     : Samir Kumar
  Date Created    : 14-09-2018
  Update History  :
  <Updated by>        <Updated On>        <Remarks>

  Class Used      : clsTranslate
  Functions Used  :
  ================================================== */
include(CLASS_PATH.'clsTranslate.php');

//=========== create object ========================//
$obj = new clsTranslate;
$isPaging = 0;
$pgFlag = 0;
$intPgno = 1;
$intRecno = 0;
$ctr = 0;
$intCity = 0;
//======================= Permission ===========================*/
$glId = $_REQUEST['GL'];
$plId = $_REQUEST['PL'];
$pageName = $_REQUEST['PAGE'] . '.php';
$userId = $_SESSION['adminConsole_userID'];
//$explPriv       = $obj->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
// $editPriv       = $explPriv['edit'];
// $deletePriv     = $explPriv['delete'];
// $noAdd          = $explPriv['add'];  

//======================= Pagination ===========================*/

if ($_REQUEST['hdn_IsPaging'] != "" && $_REQUEST['hdn_IsPaging'] > 0)
    $isPaging = 1;
if ($_REQUEST['hdn_PageNo'] != "" && $_REQUEST['hdn_PageNo'] > 0) {
    $intPgno = $_REQUEST['hdn_PageNo'];
    $pgFlag = 1;
}
if ($_REQUEST['hdn_RecNo'] != "" && $_REQUEST['hdn_RecNo'] > 0) {
    $intRecno = $_REQUEST['hdn_RecNo'];
    $pgFlag = 1;
}
if ($isPaging == 0 && $_REQUEST['hdn_PageNo'] == '' && $_REQUEST['ID'] > 0) {
    $intRecno = (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo'] > 0) ? $_SESSION['paging']['recNo'] : $intRecno;
    $intPgno = (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo'] > 0) ? $_SESSION['paging']['pageNo'] : $intPgno;
} else
    unset($_SESSION['paging']);

$txtcatName = (isset($_REQUEST['txtCatName']) && $_REQUEST['txtCatName'] != '') ? $_REQUEST['txtCatName'] : '';

//============= search function =================
if (isset($_REQUEST['btnSearch'])) {
    $txtCatName = $_REQUEST['txtCatName'];
    $intPgno = 1;
    $intRecno = 0;
    $searchResult = 1;
}


//============= Delete/Active/Inactive function =================
if (isset($_REQUEST['hdn_qs']) && $_REQUEST['hdn_qs'] != '') {
    $qs = $_REQUEST['hdn_qs'];
    $ids = $_REQUEST['hdn_ids'];
    $outMsg = $obj->deleteTranslatePage($qs, $ids);
}
if ($isPaging == 0)
    $result = $obj->manageTranslate('CPG',$intRecno,$txtCatName,'','','','','','','','');
else {
    $intPgno = 1;
    $intRecno = 0;
    $result = $obj->manageTranslate('CPG',0,$txtCatName,'','','','','','','','');
}
//print_r($result);
$totalResult = $obj->manageTranslate('CPV',0,$txtCatName,'','','','','','','','');
$intTotalRec = mysqli_num_rows($totalResult);
$intCurrPage = $intPgno;
$intPgSize = 10;
$_SESSION['paging']['recNo'] = $intRecno;
$_SESSION['paging']['pageNo'] = $intPgno;
?>