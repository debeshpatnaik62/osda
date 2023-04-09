<?php
  /* ================================================
	  File Name         	  : share-your-storyInner.php
	  Description		      : This page is to view Share Your Story details.
	  Date Created            : 27-03-2017
	  Devloped By		      : Arpita Rath
	  Devloped On		      : 27-03-2017
	  Update History	      :
	  <Updated by>		<Updated On>		<Remarks>
	  Include Functions	      : manageStory(), deleteStory()
================================================== */
 //=========== include class path for share story ==============//
        include_once(CLASS_PATH.'clsShareStory.php');
 //======== create object ===================//
        $objStory    = new  clsShareStory;

 //================setting default value for Paging================
	    $isPaging   = 0;
	    $pgFlag     = 0;
	    $intPgno    = 1;
	    $intRecno   = 0;
	    $ctr        = 0;
	    $intPgSize	= 10;  

//======================= Permission ===========================*/
	    $glId                   = $_REQUEST['GL'];
	    $plId                   = $_REQUEST['PL'];
	    $pageName               = $_REQUEST['PAGE'].'.php';
	    $userId                 = $_SESSION['adminConsole_userID'];
	    $explPriv               = $objStory->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
	    $editPriv               = $explPriv['edit'];
	    $deletePriv             = $explPriv['delete'];
	    $noAdd                  = $explPriv['add'];
	    $noActive               = $explPriv['active'];
	    $noPublish              = $explPriv['publish'];

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
            $strStartDt = (isset($_REQUEST['txtStartDt']) && $_REQUEST['txtStartDt'] != '')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):'1000-01-01';
            $strEndDate = (isset($_REQUEST['txtEndDt']) && $_REQUEST['txtEndDt'] != '')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):'1000-01-01';	
            
     //============ Search Function ========================//
             if(isset($_REQUEST['btnSearch']))
             {
                 $intPgno        = 1;
                 $intRecno       = 0;  
                 $strName        = trim($_REQUEST['txtSearch']);
                 $strStartDt     = (isset($_REQUEST['txtStartDt']) && $_REQUEST['txtStartDt'] != '')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):'1000-01-01';
                 $strEndDate     = (isset($_REQUEST['txtEndDt']) && $_REQUEST['txtEndDt'] != '')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):'1000-01-01';
             }            
	    
 //============= Delete Records ================================	
	    if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
	    {
	            $qs         = $_REQUEST['hdn_qs'];
	            $ids	    = $_REQUEST['hdn_ids'];
	            $outMsg   	= $objStory->deleteStory($qs,$ids);
	    }	

//=================== View feedBack records ================================
	    if ($isPaging==0) {
	        $result		= $objStory->manageShareStory('PG',$intRecno,$strName,'','','','',0,0,$strStartDt,$strEndDate);
	    } else {
	        $intPgno	= 1;
	        $intRecno	= 0;
	        $result		= $objStory->manageShareStory('V',0,$strName,'','','','',0,0,$strStartDt,$strEndDate);
	    }

	    $totalResult	= $objStory->manageShareStory('V',0,$strName,'','','','',0,0,$strStartDt,$strEndDate);
	    $intTotalRec	= mysqli_num_rows($totalResult);
	    $intCurrPage	= $intPgno;    
	    $_SESSION['paging']['recNo']  = $intRecno;
	    $_SESSION['paging']['pageNo'] = $intPgno;	         

?>