<?php
    /* ================================================
    File Name       : viewSLAConfigurationInner.php
    Description		: This page is used to view SLA Configuration.
    Author Name		: Rahul Kumar Saw
    Date Created	: 06-Apr-2023
    Update History	:
    <Updated by>		<Updated On>		<Remarks>
   
    Class Used		: clsSLAConfig
    Functions Used	: checkPrivilege()
    ==================================================*/
    include_once( CLASS_PATH.'clsSLAConfig.php');
    $objConfig      = new clsSLAConfig;	
    $isPaging       = 0;
    $pgFlag	   		= 0;
    $intPgno	   	= 1;
    $intRecno	   	= 0;
    $ctr	   		= 0;
    $intPgSize      = 10;
    $chk_Privilege      = ADMIN_PRIVILEGE;
    
    $disabled           = (isset($chk_Privilege) && $chk_Privilege!=1 )? 'disabled="disabled"' : '';
    $strStyle           = (isset($chk_Privilege) && $chk_Privilege!=1 )?'style="display:none;"':'';
    $strStyleCol        = (isset($chk_Privilege) && $chk_Privilege!=1 )?'col-sm-2':'col-sm-3';
    //======================= Permission ===========================*/
    $glId          	= $_REQUEST['GL'];
    $plId          	= $_REQUEST['PL'];
    $pageName      	= $_REQUEST['PAGE'].'.php';   
    $explPriv       = $objConfig->checkPrivilege(USER_ID, $glId, $plId, $pageName, 'V');
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

    $strCatId   = (isset($_REQUEST['selectCategory'])&& $_REQUEST['selectCategory']!='')?($_REQUEST['selectCategory']):0;
    $ddlPriorty   = (isset($_REQUEST['slaPriority'])&& $_REQUEST['slaPriority']!='')?($_REQUEST['slaPriority']):0;
   

    //============= search function =================
    if(isset($_REQUEST['btnSearch']))
	{
		$intPgno	= 1;
		$intRecno	= 0;
	}
    //============= Delete/Active/Inactive function =================
        /*if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )//echo "$_REQUEST";exit;
        {
            $qs = $_REQUEST['hdn_qs'];
            $ids    = $_REQUEST['hdn_ids'];
            $outMsg = $objConfig->deleteGrevCategory($qs,$ids);
        }*/

        if($isPaging==0)    
            $result     = $objConfig->manageSLAConfig('PG', $intRecno,$strCatId,0,$ddlPriorty,0,0,0,0,'');
              
        else                                    
        {
                $intPgno    = 1;
                $intRecno   = 0;
                $result                 = $objConfig->manageSLAConfig('V', 0,$strCatId,0,$ddlPriorty,0,0,0,0,'');
        }
           $totalResult                 = $objConfig->manageSLAConfig('V', 0,$strCatId,0,$ddlPriorty,0,0,0,0,'');
           $intTotalRec                 = mysqli_num_rows($totalResult); 
           $intCurrPage                 = $intPgno;
           $intPgSize                   = 20;
           $_SESSION['paging']['recNo'] = $intRecno;
           $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>