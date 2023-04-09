<?php
/* ================================================
File Name     : searchInner.php
Description   : This page is for Search Results Links
Date Created  : 27-March-2019
Created By    : Ashis Kumar Patra
Update History  :
<Updated by>  <Updated On>    <Remarks>

Include Class : clsSearch
================================================== */

include_once CLASS_PATH . 'clsSearch.php';
$objSrch = new clsSearch();
$objModel = new Model();
$glName = "Search";

$intPgno = 1;
$intRecno = 0;

if ($_REQUEST['hdn_PageNo'] != "" && $_REQUEST['hdn_PageNo'] > 0) {
    $intPgno = is_numeric($_REQUEST['hdn_PageNo']) ? htmlspecialchars($_REQUEST['hdn_PageNo'], ENT_QUOTES) : '';
}
if ($_REQUEST['hdn_RecNo'] != "" && $_REQUEST['hdn_RecNo'] > 0) {
    $intRecno = is_numeric($_REQUEST['hdn_RecNo']) ? htmlspecialchars($_REQUEST['hdn_RecNo'], ENT_QUOTES) : '';
}

//$searchTxt    ='Success';
if (isset($_REQUEST['txtSearch']) && isset($_REQUEST['txtSearch']) != '') {

    if ($objModel->isSpclChar($_REQUEST['txtSearch'])) {

        echo "<script>alert('Error: Special Characters are not allowed')</script>";
    } else {

        $_SESSION['searchText'] = ($_REQUEST['txtSearch']!='')?htmlspecialchars($_REQUEST['txtSearch'], ENT_QUOTES):'';

    }
}

$searchTxt = $_SESSION['searchText'];
$linkResult = $objSrch->viewSearch('PG', $intRecno, htmlspecialchars($searchTxt, ENT_QUOTES));
$totalRecord = $objSrch->viewSearch('V', 0, htmlspecialchars($searchTxt, ENT_QUOTES));
$intTotalRec = $totalRecord->num_rows;
$intCurrPage = $intPgno;
$intPgSize = 10;

$strPageTitle = $strSearchlbl;
