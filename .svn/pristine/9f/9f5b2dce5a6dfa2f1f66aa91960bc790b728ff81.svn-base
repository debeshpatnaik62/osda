<?php
 /* ================================================
    File Name           : viewEventGalleryInner.php
    Description		: This page is used to  view Event Gallery.
    Author Name		: Ashis kumar Patra
    Date Created	: 24-April-2018
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		:  clsEventVideoGallery
    Functions Used	:   
     
    ==================================================*/
      include_once(CLASS_PATH.'clsEventVideoGallery.php');

 //======== create object =================//
        $objInstGal     = new   clsEventGallery;
        $isPaging       = 0;
        $pgFlag         = 0;
        $intPgno	= 1;
        $intRecno	= 0;
        $ctr            = 0;   
        $intDist        = 0;
        $intInst        = 0;
//======================= Permission ===========================*/
        $glId           = $_REQUEST['GL'];
        $plId           = $_REQUEST['PL'];
        $pageName       = $_REQUEST['PAGE'].'.php';
        $userId         = $_SESSION['adminConsole_userID'];
        $explPriv       = $objInstGal->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
        $editPriv       = $explPriv['edit'];
        $deletePriv     = $explPriv['delete'];
        $noAdd          = $explPriv['add'];
        $noActive       = $explPriv['active'];
        $noPublish      = $explPriv['publish'];   
	    
 //======================= Pagination ===========================*/
	
        if($_REQUEST['hdn_IsPaging']!="" && $_REQUEST['hdn_IsPaging'] >0)
                $isPaging   =   1;
        if($_REQUEST['hdn_PageNo']!=""  && $_REQUEST['hdn_PageNo'] >0)
        {
                $intPgno    = $_REQUEST['hdn_PageNo'];
                $pgFlag     = 1;
        }
        if($_REQUEST['hdn_RecNo']!=""  && $_REQUEST['hdn_RecNo'] >0)
        {	
                $intRecno   = $_REQUEST['hdn_RecNo'];
                $pgFlag     = 1;
        }
        if($isPaging==0 && $_REQUEST['hdn_PageNo']=='' && $_REQUEST['ID']>0)
        {
                $intRecno	= (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
                $intPgno	= (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;		
        }
        else	
                unset($_SESSION['paging']);	     

      

        //============ Search Function ========================//
         if(isset($_REQUEST['btnSearch']))
         {
             $intPgno        = 1;
             $intRecno       = 0;
             $strCaption        = htmlspecialchars($_REQUEST['txtSearch']);             
         }            

  //============= Delete/Active/Inactive function =================
        if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
        {
            
            
                $qs         = $_REQUEST['hdn_qs'];
                $ids        = $_REQUEST['hdn_ids'];
                $outMsg     = $objInstGal->deleteEventGal($qs,$ids);
        }
        if($isPaging==0)	
                                         
            $result         = $objInstGal->manageEventGal('PG',$intRecno,0,$strCaption,$strCaption,'','','',0,0,0);
        else                                    
        {
            $intPgno        = 1;
            $intRecno       = 0;
            $result                 = $objInstGal->manageEventGal('V',0,0,$strCaption,$strCaption,'','','',0,0,0);
        }
       $totalResult                 = $objInstGal->manageEventGal('V',0,0,$strCaption,$strCaption,'','','',0,0,0);
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $intPgSize                   = 20;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;

?>