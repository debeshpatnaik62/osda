<?php
/* ================================================
  File Name         	  : feedbackInner.php
  Description		  : This page is to view feedback details.
  Date Created            : 08-Sep-2016
  Devloped By		  : T Ketaki Debadarshini
  Devloped On		  : 08-Sep-2016
  Update History	  :
  <Updated by>		<Updated On>		<Remarks>
  Include Functions	  : manageFeedback(), deleteFeedBack()
================================================== */
//================= Call to clsFeedback class ===========================
    include_once(CLASS_PATH.'clsFeedback.php');
    $objFeedBack = new clsFeedback();

//================setting default value for Paging================
    $isPaging   = 0;
    $pgFlag     = 0;
    $intPgno    = 1;
    $intRecno   = 0;
    $ctr        = 0;
    $intPgSize	= 20;
//======================= Permission ===========================*/
    $glId           = $_REQUEST['GL'];
    $plId           = $_REQUEST['PL'];
    $pageName       = $_REQUEST['PAGE'].'.php';
    $userId         = $_SESSION['adminConsole_userID'];
    $explPriv       = $objFeedBack->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
    $editPriv       = $explPriv['edit'];
    $deletePriv     = $explPriv['delete'];
    $noAdd          = $explPriv['add'];
    $noActive       = $explPriv['active'];
    $noPublish      = $explPriv['publish'];
    
    
//======================= Pagination ===========================*/
	
    if ($_REQUEST['hdn_IsPaging']!="" && $_REQUEST['hdn_IsPaging'] >0)
        $isPaging   = 1;
    if ($_REQUEST['hdn_PageNo']!=""  && $_REQUEST['hdn_PageNo'] >0) {
        $intPgno    = $_REQUEST['hdn_PageNo'];
        $pgFlag     = 1;
    }
    if ($_REQUEST['hdn_RecNo']!=""  && $_REQUEST['hdn_RecNo'] >0) {	
        $intRecno   = $_REQUEST['hdn_RecNo'];
        $pgFlag     = 1;
    }
    if ($isPaging==0 && $_REQUEST['hdn_PageNo']=='' && $_REQUEST['ID']>0) {
        $intRecno	= (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
        $intPgno	= (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;		
    } else 
        unset($_SESSION['paging']);
        $strName    = (isset($_REQUEST['txtSearch']))?$_REQUEST['txtSearch']:'';
        $strStartDt = (isset($_REQUEST['txtStartDt']) && $_REQUEST['txtStartDt'] != '')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):'0000-00-00';
        $strEndDate = (isset($_REQUEST['txtEndDt']) && $_REQUEST['txtEndDt'] != '')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):'0000-00-00';
        
  //============ Serach Function =====================//
        if(isset($_REQUEST['btnSearch'])) {
             $intPgno           = 1;
             $intRecno          = 0;
             $strName           = trim($_REQUEST['txtSearch']);
             $strStartDt        = (isset($_REQUEST['txtStartDt']) && $_REQUEST['txtStartDt'] != '')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):'0000-00-00';
             $strEndDate        = (isset($_REQUEST['txtEndDt']) && $_REQUEST['txtEndDt'] != '')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):'0000-00-00';         
        }        

//============= Delete Records ================================	
    if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
    {
            $qs         = $_REQUEST['hdn_qs'];
            $ids	= $_REQUEST['hdn_ids'];
            $outMsg	= $objFeedBack->deleteFeedBack($qs,$ids);   }


    //=================== View feedBack records ================================
    if ($isPaging==0) {
        $result		= $objFeedBack->manageFeedback('PG',$intRecno,0,'','','',$strName,'',$strStartDt,$strEndDate,0,$intPgSize);
    } else {
        $intPgno	= 1;
        $intRecno	= 0;
        $result		= $objFeedBack->manageFeedback('V',0,0,'','','',$strName,'',$strStartDt,$strEndDate,0,$intPgSize);
    }

    $totalResult	= $objFeedBack->manageFeedback('V',0,0,'','','',$strName,'',$strStartDt,$strEndDate,0,$intPgSize);
    $intTotalRec	= mysqli_num_rows($totalResult);
    $intCurrPage	= $intPgno;    
    $_SESSION['paging']['recNo']		= $intRecno;
    $_SESSION['paging']['pageNo']               = $intPgno;