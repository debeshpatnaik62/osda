<?php
    /* ================================================
    File Name       : viewGrevCategoryInner.php
    Description		: This page is used to view category Details.
    Author Name		: Rahul Kumar Saw
    Date Created	: 03-Apr-2023
    Update History	:
    <Updated by>		<Updated On>		<Remarks>
   
    Class Used		: clsGrevCategory
    Functions Used	: checkPrivilege()
    ==================================================*/
    include_once( CLASS_PATH.'clsGrevCategory.php');
    $objGrev      = new clsGrevCategory;	
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
    $explPriv       = $objGrev->checkPrivilege(USER_ID, $glId, $plId, $pageName, 'V');
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
        
    //============= search function =================
    if(isset($_REQUEST['btnSearch']))
	{
		$intPgno	= 1;
		$intRecno	= 0;
	}
    //============= Delete/Active/Inactive function =================
        if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )//echo "$_REQUEST";exit;
        {
            $qs = $_REQUEST['hdn_qs'];
            $ids    = $_REQUEST['hdn_ids'];
            $outMsg = $objGrev->deleteGrevCategory($qs,$ids);
        }
            
            if($isPaging==0)    
                $result     = $objGrev->manageGrevCategory('PG', $intRecno,0, '', '','', '',0 ,$userId);
              
        else                                    
        {
                $intPgno    = 1;
                $intRecno   = 0;
                $result                 = $objGrev->manageGrevCategory('V', 0,0, '', '','', '',0 ,$userId);
        }
           $totalResult                 = $objGrev->manageGrevCategory('V', 0,0, '', '','', '',0 ,$userId);
           $intTotalRec                 = mysqli_num_rows($totalResult); 
           $intCurrPage                 = $intPgno;
           $intPgSize                   = 20;
           $_SESSION['paging']['recNo'] = $intRecno;
           $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>