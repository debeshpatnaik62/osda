<?php
 /* ================================================
    File Name       : archiveInstGalleryInner.php
    Description		: This page is used to  Archive Institute Gallery.
    Author Name		: Arpita Rath
    Date Created	: 28-March-2017
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

   Class Used		:  clsInstituteCourse
    Functions Used	:   
     
    ==================================================*/
      include_once(CLASS_PATH.'clsInstGallery.php');

 //======== create object =================//
	     $objInstGal  = new   clsInstGallery;
	     $isPaging    = 0;
	     $pgFlag	  = 0;
	     $intPgno	  = 1;
	     $intRecno	  = 0;
	     $ctr	      = 0;   
 //======================= Permission ===========================*/
	    $glId          = $_REQUEST['GL'];
	    $plId          = $_REQUEST['PL'];
	    $pageName      = $_REQUEST['PAGE'].'.php';
	    $userId        = $_SESSION['adminConsole_userID'];
	    $explPriv       = $objInstGal->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
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
            $intDist  = (isset($_REQUEST['ddlDist']) && $_REQUEST['ddlDist'] != '')?$_REQUEST['ddlDist']:'0';
	    $intInst  = (isset($_REQUEST['ddlInst']) && $_REQUEST['ddlInst'] != '')?$_REQUEST['ddlInst']:'0';
            
   //============ Search Function ========================//
             if(isset($_REQUEST['btnSearch']))
             {
                 $intPgno        = 1;
                 $intRecno       = 0;
                 $intDist        = $_REQUEST['ddlDist'];
                 $intInst        = $_REQUEST['ddlInst'];                 
             }      

  //============= Delete/Active/Inactive function =================
		if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
		{
			$qs	= $_REQUEST['hdn_qs'];
			$ids	= $_REQUEST['hdn_ids'];
			$outMsg	= $objInstGal->deleteInstGal($qs,$ids);
		}
	        if($isPaging==0)	
	            $result		= $objInstGal->manageInstGal('PG',$intRecno,$intDist,$intInst,'','','','','',0,1,0);
		else                                    
		{
	            $intPgno	= 1;
	            $intRecno	= 0;
	            $result                 = $objInstGal->manageInstGal('V',0,$intDist,$intInst,'','','','','',0,1,0);
		}
	       $totalResult                 = $objInstGal->manageInstGal('V',0,$intDist,$intInst,'','','','','',0,1,0);
	       $intTotalRec                 = mysqli_num_rows($totalResult); 
	       $intCurrPage                 = $intPgno;
	       $intPgSize                   = 20;
	       $_SESSION['paging']['recNo'] = $intRecno;
	       $_SESSION['paging']['pageNo']= $intPgno;

?>