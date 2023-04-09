<?php
    /* ================================================
    File Name         	: viewFaqInner.php
    Description		: This page is used to view Faqs Details.
    Author Name		: T Ketaki Debadarshini
    Date Created	: 30-Nov-2015
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsFaq
    Functions Used	: manageFaq
    ==================================================*/
    include_once( CLASS_PATH.'clsFaq.php');
    $objFaq        = new clsFaq;	
    $isPaging      = 0;
    $pgFlag	   = 0;
    $intPgno	   = 1;
    $intRecno	   = 0;
    $ctr	   = 0;
    //======================= Permission ===========================*/
    $glId           = $_REQUEST['GL'];
    $plId           = $_REQUEST['PL'];
    $pageName       = $_REQUEST['PAGE'].'.php';
    $userId         = $_SESSION['adminConsole_userID'];
    $explPriv       = $objFaq->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
    $editPriv       = $explPriv['edit'];
    $deletePriv     = $explPriv['delete'];
    $noAdd          = $explPriv['add'];
    $noActive       = $explPriv['active'];
    $noPublish      = $explPriv['publish'];
    //======================= Pagination ===========================*/
	
	if($_REQUEST['hdn_IsPaging']!="" && $_REQUEST['hdn_IsPaging'] >0)
		$isPaging=1;
	if($_REQUEST['hdn_PageNo']!=""  && $_REQUEST['hdn_PageNo'] >0)
	{
		$intPgno=$_REQUEST['hdn_PageNo'];
		$pgFlag	= 1;
	}
	if($_REQUEST['hdn_RecNo']!=""  && $_REQUEST['hdn_RecNo'] >0)
	{	
		$intRecno=$_REQUEST['hdn_RecNo'];
		$pgFlag	= 1;
	}
	if($isPaging==0 && $_REQUEST['hdn_PageNo']=='' && $_REQUEST['ID']>0)
	{
		$intRecno	= (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
		$intPgno	= (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;		
	}
	else	
		unset($_SESSION['paging']);
        
        $strHeadlineE	= (isset($_REQUEST['txtHeadLineE'])&& $_REQUEST['txtHeadLineE']!='')?$_REQUEST['txtHeadLineE']:'';
       
         //============= search function =================
         if(isset($_REQUEST['btnSearch']))
	{
		$intPgno	= 1;
                $intRecno	= 0;
                $strHeadlineE	= trim($_REQUEST['txtHeadLineE']);
	}
         //============= Delete/Active/Inactive function =================
	if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
	{
		$qs	= $_REQUEST['hdn_qs'];
		$ids	= $_REQUEST['hdn_ids'];
                
		$outMsg	= $objFaq->deleteFaq($qs,$ids);
	}
        if($isPaging==0)
           
            $result		= $objFaq->manageFaq('PG',$intRecno,$strHeadlineE,'','','',0,0,0);
		  
	else
	{
            $intPgno	= 1;
            $intRecno	= 0;
            $result                 = $objFaq->manageFaq('V',0,$strHeadlineE,'','','',0,0,0);
	}
       $totalResult                 = $objFaq->manageFaq('V',0,$strHeadlineE,'','','',0,0,0);
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $intPgSize                   = 20;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>