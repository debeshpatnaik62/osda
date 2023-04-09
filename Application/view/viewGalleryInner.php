<?php
    /* ================================================
    File Name         	: viewGalleryInner.php
    Description		: This page is used to view Gallery Details.
    Author Name		: T Ketaki Debadarshini
    Date Created	: 19-Feb-2016
    Update History	:
    <Updated by>		<Updated On>		<Remarks>
      
    Class Used		: clsGallery
    Functions Used	: manageGallery,deleteGallery
    ==================================================*/
    include_once( CLASS_PATH.'clsGallery.php');
    $objGallery      = new clsGallery;	
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
    $explPriv       = $objGallery->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
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
		$outMsg	= $objGallery->deleteGallery($qs,$ids);
	}
        if($isPaging==0)	
            $result		= $objGallery->manageGallery('PG',$intRecno,$intCategory,$intCattype,0,'','','','','','','',0,0,0,'');              
	else
	{
            $intPgno	= 1;
            $intRecno	= 0;
            $result                 = $objGallery->manageGallery('V',0,$intCategory,$intCattype,0,'','','','','','','',0,0,0,'');      
	}
       $totalResult                 = $objGallery->manageGallery('V',0,$intCategory,$intCattype,0,'','','','','','','',0,0,0,'');      
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $intPgSize                   = 20;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>