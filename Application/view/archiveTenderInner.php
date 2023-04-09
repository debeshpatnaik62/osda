<?php
    /* ================================================
    File Name       : viewTenderInner.php
    Description		: This page is used to view News Details.
    Author Name		: Rasmi Ranjan Swain
    Date Created	: 11-Sept-2015
    Update History	:
    <Updated by>		<Updated On>		<Remarks>
    Ashok kumar Samal    22-06-2016       Department Wise User previllege
    
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
        
         $strTenderTitle	= (isset($_REQUEST['txtTenderTitle'])&& $_REQUEST['txtTenderTitle']!='')?htmlspecialchars(addslashes($_REQUEST['txtTenderTitle']), ENT_QUOTES):'';
       // $strTenderNo     = (isset($_REQUEST['txtTenderno'])&& $_REQUEST['txtTenderno']!='')?htmlspecialchars(addslashes($_REQUEST['txtTenderno']), ENT_QUOTES):'';
       
    //============= search function =================
    if(isset($_REQUEST['btnSearch']))
	{
		$intPgno	= 1;
		$intRecno	= 0;
	}
    //============= Delete/Active/Inactive function =================
	if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
	{
        $qs	= $_REQUEST['hdn_qs'];
        $ids	= $_REQUEST['hdn_ids'];
        $outMsg	= $objTender->deleteTender($qs,$ids);
	}
        if($isPaging==0)	
        $result		= $objTender->manageTender('PG',$intRecno,0,'',$strTenderTitle,'','','',BLANK_DATE,BLANK_DATE,'','',0,1,0,0,BLANK_DATE,BLANK_DATE,BLANK_DATE,'','',0,0,'','');
	else
	{
        $intPgno	= 1;
        $intRecno	= 0;
        $result     = $objTender->manageTender('V',0,0,'',$strTenderTitle,'','','',BLANK_DATE,BLANK_DATE,'','',0,1,0,0,BLANK_DATE,BLANK_DATE,BLANK_DATE,'','',0,0,'','');
	}
       $totalResult     = $objTender->manageTender('V',0,0,'',$strTenderTitle,'','','',BLANK_DATE,BLANK_DATE,'','',0,1,0,0,BLANK_DATE,BLANK_DATE,BLANK_DATE,'','',0,0,'','');
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $intPgSize                   = 10;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>