<?php
    /* ================================================
    File Name         	: viewReportCategoryInner.php
    Description		: This page is used to view ReportCategorys Details.
    Author Name		: Raviteja Peri
    Date Created	: 06-Dec-2018
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsReportCategory
    Functions Used	: manageReportCategory
    ==================================================*/
    include_once( CLASS_PATH.'clsReportCategory.php');
    $objReportCategory        = new clsReportCategory;	
    $isPaging      = 0;
    $pgFlag	   = 0;
    $intPgno	   = 1;
    $intRecno	   = 0;
    $ctr	   = 0;
   /*  $result     = $objReportCategory->viewnewpage('$action','$intReporCategoryId','$vchCategoryName','$vchDescription','$pubStatus','$archiveStatus', '$createdBy','@OUT');*/
    //======================= Permission ===========================*/
    $glId           = $_REQUEST['GL'];
    $plId           = $_REQUEST['PL'];
    $pageName       = $_REQUEST['PAGE'].'.php';
    $userId         = $_SESSION['adminConsole_userID'];
    $explPriv       = $objReportCategory->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
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
        
        $strCategoryName	= (isset($_REQUEST['txtCategoryName'])&& $_REQUEST['txtCategoryName']!='')?$_REQUEST['txtCategoryName']:'';
       
         //============= search function =================
         if(isset($_REQUEST['btnSearch']))
	{
		$intPgno	= 1;
                $intRecno	= 0;
                $strCategoryName	= trim($_REQUEST['txtCategoryName']);
	}
         //============= Delete/Active/Inactive function =================
	if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
	{
		$qs	= $_REQUEST['hdn_qs'];
		$ids	= $_REQUEST['hdn_ids'];
		$outMsg	= $objReportCategory->deleteReportCategory($qs,$ids);
	}
        if($isPaging==0)
           
            $result		= $objReportCategory->manageReportCategory('PG',$intRecno,$strCategoryName,'',0,0,0);
		  
	else
	{
            $intPgno	= 1;
            $intRecno	= 0;
            $result                 = $objReportCategory->manageReportCategory('V',0,$strCategoryName,'',0,0,0);
           // print_r($result);exit;
	}
       $totalResult                 = $objReportCategory->manageReportCategory('V',0,$strCategoryName,'',0,0,0);
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $intPgSize                   = 20;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>