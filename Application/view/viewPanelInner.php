<?php
    /* ================================================
    File Name       : viewPanelInner.php
    Description		: This page is used to view panel Details.
    Author Name		: Rahul Kumar Saw
    Date Created	: 04-Aug-2021
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsPanel
    Functions Used	: 
    ==================================================*/
    include(CLASS_PATH."clsPanel.php");
    $objPanel           = new clsPanel;
    $isPaging           = 0;
    $pgFlag             = 0;
    $intPgno            = 1;
    $intRecno           = 0;
    $ctr                = 0;
    //======================= Permission ===========================*/
    $glId               = $_REQUEST['GL'];
    $plId               = $_REQUEST['PL'];
    $pageName           = $_REQUEST['PAGE'].'.php';
    $userId             = $_SESSION['adminConsole_userID'];
    $explPriv           = $objPanel->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
    $editPriv           = $explPriv['edit'];
    $deletePriv         = $explPriv['delete'];
    $noAdd              = $explPriv['add'];
    $noActive           = $explPriv['active'];
    $noPublish          = $explPriv['publish'];
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
        
       $level             = (isset($_REQUEST['selLevel']) && $_REQUEST['selLevel'] != '')?$_REQUEST['selLevel']:0;
       $venueId           = (isset($_REQUEST['selVenue']) && $_REQUEST['selVenue'] != '')?$_REQUEST['selVenue']:0;
       $strPaneleName     = (isset($_REQUEST['txtEmployeeName']) && $_REQUEST['txtEmployeeName'] != '')?htmlspecialchars(addslashes(trim($_REQUEST['txtEmployeeName'])),ENT_QUOTES):'';
         //============= Delete/Active/Inactive function =================
	if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
	{
		$qs	= $_REQUEST['hdn_qs'];
		$ids	= $_REQUEST['hdn_ids'];
		$outMsg	= $objPanel->deletePanelName($qs,$ids);
	}
    if($isPaging==0)	
            $result		= $objPanel->managePanel('PGI',$intRecno,$level,$venueId,$strPaneleName,'','','','','','','',0,0,$userId,0,'','',0,0);		  
	else                                    
	{
            $intPgno	= 1;
            $intRecno	= 0;
            $result                 = $objPanel->managePanel('VI',0,$level,$venueId,$strPaneleName,'','','','','','','',0,0,$userId,0,'','',0,0);
	}
       $totalResult                 = $objPanel->managePanel('VI',0,$level,$venueId,$strPaneleName,'','','','','','','',0,0,$userId,0,'','',0,0);
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $intPgSize                   = 20;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>