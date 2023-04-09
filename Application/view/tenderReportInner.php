<?php
    /* ================================================
    File Name       : tenderReportInner.php
    Description		: This page is used to view tender report Details.
    Author Name		: Rahul kumar saw
    Date Created	: 01-Feb-2022
    Update History	:
    <Updated by>		<Updated On>		<Remarks>
    
    
    Class Used		: clsTender
    Functions Used	: checkPrivilege(),manageTender(),deleteTender()
    ==================================================*/
    include_once(CLASS_PATH.'clsTender.php'); 
    $objTender      = new clsTender;	
    $isPaging       = 0;
    $pgFlag	   		= 0;
    $intPgno	   	= 1;
    $intRecno	   	= 0;
    $ctr	   		= 0;
    $chk_Privilege      = ADMIN_PRIVILEGE;
    
    $disabled           = (isset($chk_Privilege) && $chk_Privilege!=1 )? 'disabled="disabled"' : '';
    $strStyle           = (isset($chk_Privilege) && $chk_Privilege!=1 )?'style="display:none;"':'';
    $strStyleCol        = (isset($chk_Privilege) && $chk_Privilege!=1 )?'col-sm-2':'col-sm-3';
    //======================= Permission ===========================*/
    $glId          	= $_REQUEST['GL'];
    $plId          	= $_REQUEST['PL'];
    $pageName      	= $_REQUEST['PAGE'].'.php';   
    $explPriv       = $objTender->checkPrivilege(USER_ID, $glId, $plId, $pageName, 'V');
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
        
        $intTenderType     = (isset($_REQUEST['intTenderType'])&& $_REQUEST['intTenderType']!='')?htmlspecialchars(addslashes($_REQUEST['intTenderType']), ENT_QUOTES):0;
        $strStartDt         = (isset($_REQUEST['txtStartDt'])&& $_REQUEST['txtStartDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):BLANK_DATE;
        $strEndDate         = (isset($_REQUEST['txtEndDt'])&& $_REQUEST['txtEndDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):BLANK_DATE;
       
    //============= search function =================
    if(isset($_REQUEST['btnSearch']))
	{
		$intPgno	= 1;
		$intRecno	= 0;
	}
    //============= Delete/Active/Inactive function =================
	/*if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
	{
        $qs	= $_REQUEST['hdn_qs'];
        $ids	= $_REQUEST['hdn_ids'];
        $outMsg	= $objTender->deleteTender($qs,$ids);
	}*/
    if($isPaging==0)	
        $result		= $objTender->manageTender('TPG',$intRecno,$intTenderType,'','','','','',$strStartDt,$strEndDate,'','',0,0,0,0,BLANK_DATE,BLANK_DATE,BLANK_DATE,'','',0,0,'','');
	else
	{
        $intPgno	= 1;
        $intRecno	= 0;
        $result     = $objTender->manageTender('TR',0,$intTenderType,'','','','','',$strStartDt,$strEndDate,'','',0,0,0,0,BLANK_DATE,BLANK_DATE,BLANK_DATE,'','',0,0,'','');
	}
       $totalResult = $objTender->manageTender('TR',0,$intTenderType,'','','','','',$strStartDt,$strEndDate,'','',0,0,0,0,BLANK_DATE,BLANK_DATE,BLANK_DATE,'','',0,0,'','');
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $intPgSize                   = 10;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>