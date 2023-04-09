<?php
    /* ================================================
    File Name         	: viewSkillBannerInner.php
    Description		: This page is used to view SkillBanner Details.
    Author Name		: Rahul Kumar Saw
    Date Created	: 27-July-2022
    Update History	:
    <Updated by>		<Updated On>		<Remarks>
      
    Class Used		: clsSkillBanner
    Functions Used	: manageSkillBanner,deleteSkillBanner
    ==================================================*/
    include_once( CLASS_PATH.'clsSkillBanner.php');
    $objSkillBanner      = new clsSkillBanner;	
    $isPaging      = 0;
    $pgFlag	   = 0;
    $intPgno	   = 1;
    $intRecno	   = 0;
    $ctr	   = 0;
    $intCategory   = 0;
    $intCattype    = 0;
    //======================= Permission ===========================*/
    $glId           = $_REQUEST['GL'];
    $plId           = $_REQUEST['PL'];
    $pageName       = $_REQUEST['PAGE'].'.php';
    $userId         = $_SESSION['adminConsole_userID'];
    $explPriv       = $objSkillBanner->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
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
        
        $intModule    = (isset($_REQUEST['selModule'])&& $_REQUEST['selModule']!='')?$_REQUEST['selModule']:'0';
        $intCategory	= (isset($_REQUEST['selCategory'])&& $_REQUEST['selCategory']!='')?$_REQUEST['selCategory']:'0';
        $intCattype    = (isset($_REQUEST['selType'])&& $_REQUEST['selType']!='')?$_REQUEST['selType']:'0';
        //============= search function =================
         if(isset($_REQUEST['btnSearch']))
	{
            $intCategory = $_REQUEST['selCategory'];
            $intCattype	= $_REQUEST['selType'];
            $intPgno	= 1;
            $intRecno	= 0;
	}
         //============= Delete/Active/Inactive function =================
	if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
	{
		$qs	= $_REQUEST['hdn_qs'];
		$ids	= $_REQUEST['hdn_ids'];
		$outMsg	= $objSkillBanner->deleteSkillBanner($qs,$ids);
	}
        if($isPaging==0)	
            $result		= $objSkillBanner->manageSkillBanner('PG',$intRecno,$intCategory,$intCattype,0,'','','','','','','',0,0,$intModule,'');              
	else
	{
            $intPgno	= 1;
            $intRecno	= 0;
            $result                 = $objSkillBanner->manageSkillBanner('V',0,$intCategory,$intCattype,0,'','','','','','','',0,0,$intModule,'');      
	}
       $totalResult                 = $objSkillBanner->manageSkillBanner('V',0,$intCategory,$intCattype,0,'','','','','','','',0,0,$intModule,'');      
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $intPgSize                   = 20;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>